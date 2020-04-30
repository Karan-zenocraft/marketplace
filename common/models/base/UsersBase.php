<?php

namespace common\models;

use Yii;
use common\models\VehicleDetails;
use common\models\DeviceDetails;
use common\models\UserRoles;
use common\models\DriverAccountDetails;
use common\models\NotificationList;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property int|null $role_id
 * @property string|null $user_name
 * @property string|null $email
 * @property string|null $password
 * @property int|null $age
 * @property int|null $gender
 * @property string|null $photo
 * @property int|null $badge_count
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $restaurant_id
 *
 * @property UserRole $role
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_id','badge_count', 'status'], 'integer'],
            [['created_at', 'updated_at','first_name','last_name','phone','photo','email_verification_code','is_email_code_verified','is_phone_code_verified','user_status','wallet'], 'safe'],
            [['first_name', 'email', 'password', 'photo'], 'string', 'max' => 255],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserRole::className(), 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Role ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
            'age' => 'Age',
            'gender' => 'Gender',
            'photo' => 'Photo',
            'badge_count' => 'Badge Count',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
     public function getDriverAccountDetails()
    {
    return $this->hasOne(DriverAccountDetails::className(), ['id' => 'user_id']);
    }
      public function getNotificationLists()
    {
        return $this->hasMany(NotificationList::className(), ['user_id' => 'id']);
    }

    public function getRole()
    {
        return $this->hasOne(UserRoles::className(), ['id' => 'role_id']);
    }
      public function getVehicleDetails()
    {
    return $this->hasMany(VehicleDetails::className(), ['user_id' => 'id']);
    }
     public function getDeviceDetails()
    {
    return $this->hasMany(DeviceDetails::className(), ['user_id' => 'id']);
    }


    /**
     * {@inheritdoc}
     * @return UsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsersQuery(get_called_class());
    }
}
