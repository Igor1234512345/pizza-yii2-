<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 03.09.2018
 * Time: 12:10
 */

namespace app\models;
use Yii;
use yii\base\Model;
use \yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


class Order extends ActiveRecord
{
    public static function tableName()
    {
        return 'order';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                 'value' => new Expression('NOW()'),
            ],
        ];
    }


    public  function  getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['order_id' =>'id']);
    }

    public  function rules()
    {
        return [
          [['name', 'phone', 'address'], 'required'],
          [['created_at', 'updated_at'], 'safe'],
          [['qty'], 'integer'],
          [['sum'], 'number'],
          [['status'],'boolean'],
          [['name', 'email', 'phone', 'address'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels() //Поля для формы
    {
        return [
            'name' => 'Имя *',
            'email' => 'Почта',
            'phone' => 'Телефон *',
            'address' => 'Адрес *',
        ];
    }
}