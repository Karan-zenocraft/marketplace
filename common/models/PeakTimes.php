<?php

namespace common\models;

class PeakTimes extends \common\models\base\PeakTimesBase
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
            [['name', 'start_time', 'end_time'], 'required'],
            [['name', 'start_time', 'end_time'],'filter', 'filter' => 'trim'],
            [['start_time', 'end_time', 'created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
}
}