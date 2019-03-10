<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 25.08.2018
 * Time: 15:37
 */

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use app\models\ProductGallery;
use Yii;
use yii\debug\models\search\Debug;

class ProductController extends AppController
{

   public function actionView($id)
   {   $galerry = ProductGallery::find()->where(['product_id'=> $id])->all();
       //debug($galerry);


       $id = Yii::$app->request->get('id');
       $product = Product::findOne($id);
       if (empty($product))
       {
           throw new \yii\web\HttpException(404, 'Такого товара нет');
       }


       $this->setMeta('E-SHOPPER | ' . $product->name, $product->keywords, $product->description);
       return $this->render('view', compact('galerry', 'product' ));
   }

}