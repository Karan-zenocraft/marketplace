<?php

namespace common\models\base;

use Yii;
use common\models\Users;

/**
 * This is the model class for table "driver_account_details".
*
    * @property integer $id
    * @property integer $user_id
    * @property string $stripe_bank_account_holder_name
    * @property string $stripe_bank_account_holder_type
    * @property integer $stripe_bank_routing_number
    * @property integer $stripe_bank_account_number
    * @property string $stripe_bank_token
    * @property string $stripe_connect_account_id
    * @property string $stripe_bank_accout_id
    * @property string $created_at
    * @property string $updated_at
    *
            * @property Users $user
    */
class DriverAccountDetailsBase extends \yii\db\ActiveRecord
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'driver_account_details';
}

/**
* @inheritdoc
*/
public function rules()
{
        return [
            [['user_id', 'stripe_bank_account_holder_name', 'stripe_bank_account_holder_type', 'stripe_bank_routing_number', 'stripe_bank_account_number', 'stripe_bank_token', 'stripe_connect_account_id', 'stripe_bank_accout_id', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'stripe_bank_routing_number', 'stripe_bank_account_number'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['stripe_bank_account_holder_name', 'stripe_bank_account_holder_type', 'stripe_bank_token', 'stripe_connect_account_id', 'stripe_bank_accout_id'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
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
    'stripe_bank_account_holder_name' => 'Stripe Bank Account Holder Name',
    'stripe_bank_account_holder_type' => 'Stripe Bank Account Holder Type',
    'stripe_bank_routing_number' => 'Stripe Bank Routing Number',
    'stripe_bank_account_number' => 'Stripe Bank Account Number',
    'stripe_bank_token' => 'Stripe Bank Token',
    'stripe_connect_account_id' => 'Stripe Connect Account ID',
    'stripe_bank_accout_id' => 'Stripe Bank Accout ID',
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
}