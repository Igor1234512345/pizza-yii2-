<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 06.09.2018
 * Time: 11:47
 */
namespace app\modules\admin\controllers;

use yii\web\Controller;


class DefaultController extends AppAdminController
{
 public function  actionIndex()
 {
     return $this->render('index');
 }
}