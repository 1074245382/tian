<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $order_id
 * @property integer $user_id
 * @property string $order_number
 * @property integer $order_status
 * @property string $order_time
 * @property string $receipt_tel
 * @property string $receipt_address
 * @property string $user_name
 * @property string $payment_time
 * @property string $payment_type
 * @property integer $payment_status
 * @property string $goods_price
 * @property string $price_total
 */
class order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'order_status', 'receipt_tel', 'payment_status'], 'integer'],
            [['goods_price', 'price_total'], 'number'],
            [['order_number', 'receipt_address'], 'string', 'max' => 30],
            [['order_time', 'payment_time'], 'string', 'max' => 15],
            [['user_name'], 'string', 'max' => 10],
            [['payment_type'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'user_id' => 'User ID',
            'order_number' => 'Order Number',
            'order_status' => 'Order Status',
            'order_time' => 'Order Time',
            'receipt_tel' => 'Receipt Tel',
            'receipt_address' => 'Receipt Address',
            'user_name' => 'User Name',
            'payment_time' => 'Payment Time',
            'payment_type' => 'Payment Type',
            'payment_status' => 'Payment Status',
            'goods_price' => 'Goods Price',
            'price_total' => 'Price Total',
        ];
    }
}
