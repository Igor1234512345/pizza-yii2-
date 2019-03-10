<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 29.08.2018
 * Time: 16:24
 */

namespace app\controllers;
use app\models\Product;
use app\models\Cart;
use app\models\OrderItems;
use app\models\Order;
use Yii;
use yii\debug\models\search\Debug;


class CartController extends AppController
{
 public function  actionAdd()
  {
       $id = Yii::$app->request->get('id');
       $qty = (int)Yii::$app->request->get('qty');

       $qty = !$qty ? 1 : $qty;
       $product = Product::findOne($id);
       if(empty($product)) return false;
       $session = Yii::$app->session;
       $session->open();
       $cart =  new Cart();
       $cart->addToCart($product, $qty);
       if(!Yii::$app->request->isAjax)
        {
            return $this->redirect(Yii::$app->request->referrer);
        }
       $this->layout = false;
       return $this->render('cart-modal', compact('session'));
  }
  public function actionClear()
  {
       $session =   $id = Yii::$app->session;
       $session->open();
       $session->remove('cart');
       $session->remove('cart.qty');
       $session->remove('cart.sum');
       $this->layout = false;
       return $this->render('cart-modal', compact('session'));
  }

  public function actionDelItem()
  {
      $id = Yii::$app->request->get('id');
      $session = Yii::$app->session;
      $session->open();
      $cart = new Cart();
      $cart->recalc($id);
      $this->layout = false;
      return $this->render('cart-modal', compact('session'));
  }

  public function  actionShow()
  {
      $session = Yii::$app->session;
      $session->open();
      $this->layout = false;
      return $this->render('cart-modal', compact('session'));
  }

  public function actionView()
   {  //debug(Yii::$app->params['adminEmail']);
      $session = Yii::$app->session;
      $session->open();
      $this->setMeta('Корзина');
      $order =  new Order();
      if($order->load(Yii::$app->request->post()) )
       {
          $order->qty = $session['cart.qty'];
          $order->sum = $session['cart.sum'];
          if($order->save())
            {
               $this->saveOrderItems($session['cart'], $order->id);
               Yii::$app->session->setFlash('success', 'Ваш заказ принят. Менеджер вскоре свяжется с Вами.');
               /*Yii::$app->mailer->compose('order', ['session' => $session])
                   ->setFrom(['rafkat-karimov@mail.ru' => 'yy2.loc'])
                   ->setTo($order->email)
                   ->setSubject('Заказ')           //Тема сообщения
                   ->send();
              */

               $session->remove('cart');             ////////////////////////////////
               $session->remove('cart.qty');        ///    Очищаем корзину       ///
               $session->remove('cart.sum');       ////////////////////////////////

               return $this->refresh();//перезагрузка страницы
            }
          else
            {
                Yii::$app->session->setFlash('error', 'Ошибка оформления заказа');
            }

       }
       return $this->render('view', compact('session','order'));
   }
   protected function saveOrderItems($items, $order_id) //если мы успешно сохранили заказ
   {
      foreach ($items as $id => $item)  //пройдемся в цикле foreach по нашему масиву корзины будем получать id
      {
          $order_items = new OrderItems(); //для каждой записи товара сохраняем свой объект
          $order_items->order_id = $order_id;
          $order_items->product_id = $id;
          $order_items->name = $item['name'];
          $order_items->price = $item['price'];
          $order_items->qty_item = $item['qty'];
          $order_items->sum_item = $item['qty'] * $item['price'];
          $order_items->save();
      }
   }
}