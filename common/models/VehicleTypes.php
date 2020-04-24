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
            [['title', 'description'], 'required'],
            [['title', 'description'],'filter', 'filter' => 'trim'],
             ['title', 'validateTitle'],
            [['created_at', 'updated_at','status'], 'safe'],
            [['title', 'description'], 'string', 'max' => 255],
        ];
}
 public function validateTitle()
    {
        $ASvalidateemail = VehicleTypes::find()->where('title = "' . $this->title . '" and id != "' . $this->id . '"')->all();
        if (!empty($ASvalidateemail)) {
            $this->addError('title', 'This title is already added.');
            return true;
        }
    }
}
