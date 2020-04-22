<?php

namespace common\models\base;

use Yii;
use common\models\VehicleTypeRates;

/**
 * This is the model class for table "vehicle_charges".
*
    * @property integer $id
    * @property string $label
    * @property string $created_at
    * @property string $updated_at
    *
            * @property VehicleTypeRates[] $vehicleTypeRates
    */
class VehicleChargesBase extends \yii\db\ActiveRecord
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'vehicle_charges';
}

/**
* @inheritdoc
*/
public function rules()
{
        return [
            [['label', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['label'], 'string', 'max' => 255],
        ];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'id' => 'ID',
    'label' => 'Label',
    'created_at' => 'Created At',
    'updated_at' => 'Updated At',
];
}

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getVehicleTypeRates()
    {
    return $this->hasMany(VehicleTypeRates::className(), ['vehicle_charge_id' => 'id']);
    }
}