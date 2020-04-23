<?php

namespace common\models\base;

use Yii;
use common\models\VehicleTypeRates;

/**
 * This is the model class for table "vehicle_charges".
*
    * @property integer $id
    * @property string $slug
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
            [['label'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['slug', 'label'], 'string', 'max' => 255],
        ];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'id' => 'ID',
    'slug' => 'Slug',
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