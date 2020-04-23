<?php

namespace common\models;

class VehicleTypeRates extends \common\models\base\VehicleTypeRatesBase
{
     public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->setAttribute('created_at', date('Y-m-d H:i:s'));
        }
        $this->setAttribute('updated_at', date('Y-m-d H:i:s'));

        return parent::beforeSave($insert);
    }

    public function rules()
{
        return [
            [['vehicle_type_id', 'vehicle_charge_id', 'normal_charge', 'peak_time_charge'], 'required'],
            [['vehicle_type_id', 'vehicle_charge_id', 'normal_charge', 'peak_time_charge'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['vehicle_charge_id'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleCharges::className(), 'targetAttribute' => ['vehicle_charge_id' => 'id']],
            [['vehicle_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleTypes::className(), 'targetAttribute' => ['vehicle_type_id' => 'id']],
        ];
}
}
