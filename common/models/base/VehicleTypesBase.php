<?php

namespace common\models\base;

use Yii;
use common\models\VehicleDetails;
use common\models\VehicleTypeRates;

/**
 * This is the model class for table "vehicle_types".
*
    * @property integer $id
    * @property string $title
    * @property string $description
    * @property string $status
    * @property string $created_at
    * @property string $updated_at
    *
            * @property VehicleDetails[] $vehicleDetails
            * @property VehicleTypeRates[] $vehicleTypeRates
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
            [['title', 'description', 'created_at', 'updated_at'], 'required'],
            [['status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
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
    'status' => 'Status',
    'created_at' => 'Created At',
    'updated_at' => 'Updated At',
];
}

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getVehicleDetails()
    {
    return $this->hasMany(VehicleDetails::className(), ['vehicle_type_id' => 'id']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getVehicleTypeRates()
    {
    return $this->hasMany(VehicleTypeRates::className(), ['vehicle_type_id' => 'id']);
    }
}