<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 29.08.2018
 * Time: 12:09
 */

namespace app\models;
use yii\db\ActiveRecord;


class ProductGallery extends ActiveRecord
{
    public static function tableName()
    {
        return 'uploads_images';
    }
    public function getProductGallery(){
        return $this->hasOne(Product::className(),['id' => 'product_id']);
    }
}