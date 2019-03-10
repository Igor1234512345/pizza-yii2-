<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 14.08.2018
 * Time: 11:15
 */

namespace app\models;
use yii\db\ActiveRecord;


class Product extends ActiveRecord
{
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public static function tableName()
    {
        return 'product';//Таблица продукт

    }
    public function getCategory(){
        return $this->hasOne(Category::className(),['id' => 'category_id']);
    }
}