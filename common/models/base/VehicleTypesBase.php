<?php

namespace common\models\base;

use Yii;
use common\models\VehicleTypeRates;

/**
 * This is the model class for table "vehicle_types".
*
    * @property integer $id
    * @property string $title
    * @property string $description
    * @property integer $seat_count
    * @property string $status
    * @property string $created_at
    * @property string $updated_at
*/
class VehicleTypesBase extends \yii\db\ActiveRecord
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'vehicle_types';
}

/**
* @inheritdoc
*/
public function rules()
{
        return [
            [['title', 'description', 'seat_count'], 'required'],
            [['seat_count'], 'integer'],
          //  [['status'], 'string'],
            [['created_at', 'updated_at','status'], 'safe'],
            [['title', 'description'], 'string', 'max' => 255],
        ];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'id' => 'ID',
    'title' => 'Title',
    'description' => 'Description',
    'seat_count' => 'Seat Count',
    'status' => 'Status',
    'created_at' => 'Created At',
    'updated_at' => 'Updated At',
];
}
public function getVehicleTypeRates() 
   { 
   return $this->hasMany(VehicleTypeRates::className(), ['vehicle_type_id' => 'id']); 
   } 
   
}

