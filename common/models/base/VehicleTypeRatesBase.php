<?php

namespace common\models\base;

use Yii;
use common\models\VehicleCharges;
use common\models\VehicleTypes;

/**
 * This is the model class for table "vehicle_type_rates".
*
    * @property integer $id
    * @property integer $vehicle_type_id
    * @property integer $vehicle_charge_id
    * @property integer $normal_charge
    * @property integer $peak_time_charge
    * @property string $created_at
    * @property string $updated_at
    *
            * @property VehicleCharges $vehicleCharge
            * @property VehicleTypes $vehicleType
    */
class VehicleTypeRatesBase extends \yii\db\ActiveRecord
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'vehicle_type_rates';
}

/**
* @inheritdoc
*/
public function rules()
{
        return [
            [['vehicle_type_id', 'vehicle_charge_id', 'normal_charge', 'peak_time_charge', 'created_at', 'updated_at'], 'required'],
            [['vehicle_type_id', 'vehicle_charge_id', 'normal_charge', 'peak_time_charge'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['vehicle_charge_id'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleCharges::className(), 'targetAttribute' => ['vehicle_charge_id' => 'id']],
            [['vehicle_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleTypes::className(), 'targetAttribute' => ['vehicle_type_id' => 'id']],
        ];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'id' => 'ID',
    'vehicle_type_id' => 'Vehicle Type',
    'vehicle_charge_id' => 'Vehicle Charge',
    'normal_charge' => 'Normal Charge',
    'peak_time_charge' => 'Peak Time Charge',
    'created_at' => 'Created At',
    'updated_at' => 'Updated At',
];
}

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getVehicleCharge()
    {
    return $this->hasOne(VehicleCharges::className(), ['id' => 'vehicle_charge_id']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getVehicleType()
    {
    return $this->hasOne(VehicleTypes::className(), ['id' => 'vehicle_type_id']);
    }
}