<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "peak_times".
*
    * @property integer $id
    * @property string $name
    * @property string $start_time
    * @property string $end_time
    * @property string $created_at
    * @property string $updated_at
*/
class PeakTimesBase extends \yii\db\ActiveRecord
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'peak_times';
}

/**
* @inheritdoc
*/
public function rules()
{
        return [
            [['name', 'start_time', 'end_time'], 'required'],
            [['start_time', 'end_time', 'created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'id' => 'ID',
    'name' => 'Name',
    'start_time' => 'Start Time',
    'end_time' => 'End Time',
    'created_at' => 'Created At',
    'updated_at' => 'Updated At',
];
}
}