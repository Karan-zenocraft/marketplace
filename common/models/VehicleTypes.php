<?php

namespace common\models;

class VehicleTypes extends \common\models\base\VehicleTypesBase
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
            [['title', 'description', 'seat_count'], 'required'],
            [['title', 'description', 'seat_count'],'filter', 'filter' => 'trim'],
            [['seat_count'], 'integer'],
          //  [['status'], 'string'],
            [['created_at', 'updated_at','status'], 'safe'],
            [['title', 'description'], 'string', 'max' => 255],
        ];
}
}
