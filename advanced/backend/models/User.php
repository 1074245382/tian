<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $user_id
 * @property string $user_account
 * @property string $user_password
 * @property string $user_tel
 * @property string $user_time
 * @property string $user_img
 * @property string $nickname
 * @property string $lasttime
 * @property string $lastip
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_tel'], 'integer'],
            [['user_account', 'user_img'], 'string', 'max' => 30],
            [['user_password'], 'string', 'max' => 32],
            [['user_time', 'nickname', 'lasttime', 'lastip'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_account' => 'User Account',
            'user_password' => 'User Password',
            'user_tel' => 'User Tel',
            'user_time' => 'User Time',
            'user_img' => 'User Img',
            'nickname' => 'Nickname',
            'lasttime' => 'Lasttime',
            'lastip' => 'Lastip',
        ];
    }
}
