<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "classify".
 *
 * @property integer $classify_id
 * @property string $classify_name
 * @property integer $classify_pid
 * @property string $path
 */
class classify extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classify';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['classify_pid'], 'integer'],
            [['classify_name'], 'string', 'max' => 15],
            [['path'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'classify_id' => 'Classify ID',
            'classify_name' => 'Classify Name',
            'classify_pid' => 'Classify Pid',
            'path' => 'Path',
        ];
    }
}
