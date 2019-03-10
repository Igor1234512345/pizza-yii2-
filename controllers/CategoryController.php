<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 15.08.2018
 * Time: 17:00
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;
use yii\debug\models\search\Debug;
use app\models\ProductGallery;

class CategoryController extends AppController
{
   public function actionIndex()  // продукт Hits досупен в шаблоне
   {
       $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
       $query2  = Product::find()->where(['category_id' => '9'])->all();
       $this->setMeta('E-SHOPPER');
       return $this->render('index', compact('hits','query2'));
   }
   public function actionView($id)
   {
       $category = Category::findOne($id);
       if (empty($category))
       {
           throw new \yii\web\HttpException(404, 'The requested item could not be found.');
       }

    // $products = Product::find()->where(['category_id' => $id])->all();
     $query = Product::find()->where(['category_id' => $id]);
     $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 9, 'forcePageParam' => false, 'pageSizeParam' => false]); //вывод пагинации в категориях
     $products = $query->offset($pages->offset)->limit($pages->limit)->all();

     $this->setMeta('E-SHOPPER | ' . $category->name, $category->keywords, $category->description);
     return $this->render('view', compact('products', 'pages',  'category'));

   }

   public function  actionSearch()
   {
       $q = trim(Yii::$app->request->get('q'));
       if (!$q)
           return $this->render('search');
       $query = Product::find()->where(['like', 'name', $q]);
       $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]); //вывод пагинации в категориях
       $products = $query->offset($pages->offset)->limit($pages->limit)->all();
       return $this->render('search', compact('products', 'pages', 'q'));
   }

}