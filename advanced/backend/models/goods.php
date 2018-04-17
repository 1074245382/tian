<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property integer $goods_id
 * @property string $goods_name
 * @property string $goods_price
 * @property integer $classify_id
 * @property integer $brand_id
 * @property integer $is_hot
 * @property string $time
 */
class goods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_price'], 'number'],
            [['classify_id', 'brand_id', 'is_hot'], 'integer'],
            [['goods_name'], 'string', 'max' => 20],
            [['time'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'goods_id' => 'Goods ID',
            'goods_name' => 'Goods Name',
            'goods_price' => 'Goods Price',
            'classify_id' => 'Classify ID',
            'brand_id' => 'Brand ID',
            'is_hot' => 'Is Hot',
            'time' => 'Time',
        ];
    }
}
