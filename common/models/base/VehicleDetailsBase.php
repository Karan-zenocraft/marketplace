<?php

namespace common\models\base;

use Yii;
use common\models\Users;
use common\models\VehicleTypes;

/**
 * This is the model class for table "vehicle_details".
*
    * @property integer $id
    * @property integer $user_id
    * @property string $name
    * @property integer $vehicle_type_id
    * @property integer $seat_capacity
    * @property string $vehicle_registration_no
    * @property string $vehicle_image_front
    * @property string $vehicle_image_back
    * @property string $driver_license_image_front
    * @property string $driver_license_image_back
    * @property string $vehicle_registration_image_front
    * @property string $vehicle_registration_image_back
    * @property integer $status
    * @property string $created_at
    * @property string $updated_at
    *
            * @property Users $user
            * @property VehicleTypes $vehicleType
    */
class VehicleDetailsBase extends \yii\db\ActiveRecord
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'vehicle_details';
}

/**
* @inheritdoc
*/
public function rules()
{
        return [
            [['user_id', 'name', 'vehicle_type_id', 'seat_capacity', 'vehicle_registration_no', 'vehicle_image_front', 'vehicle_image_back', 'driver_license_image_front', 'driver_license_image_back', 'vehicle_registration_image_front', 'vehicle_registration_image_back', 'status', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'vehicle_type_id', 'seat_capacity', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'vehicle_registration_no', 'vehicle_image_front', 'vehicle_image_back', 'driver_license_image_front', 'driver_license_image_back', 'vehicle_registration_image_front', 'vehicle_registration_image_back'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
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
    'user_id' => 'User ID',
    'name' => 'Name',
    'vehicle_type_id' => 'Vehicle Type ID',
    'seat_capacity' => 'Seat Capacity',
    'vehicle_registration_no' => 'Vehicle Registration No',
    'vehicle_image_front' => 'Vehicle Image Front',
    'vehicle_image_back' => 'Vehicle Image Back',
    'driver_license_image_front' => 'Driver License Image Front',
    'driver_license_image_back' => 'Driver License Image Back',
    'vehicle_registration_image_front' => 'Vehicle Registration Image Front',
    'vehicle_registration_image_back' => 'Vehicle Registration Image Back',
    'status' => 'Status',
    'created_at' => 'Created At',
    'updated_at' => 'Updated At',
];
}

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getUser()
    {
    return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getVehicleType()
    {
    return $this->hasOne(VehicleTypes::className(), ['id' => 'vehicle_type_id']);
    }
}