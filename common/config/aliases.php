<?php
if ($_SERVER['HTTP_HOST'] == "localhost") {

    Yii::setAlias('@common_base', '/marvelapp/common/');

} else {

    Yii::setAlias('@common_base', '/marvelapp/common/');
}
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('api', dirname(dirname(__DIR__)) . '/api'); // add api alias
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('@root', realpath(dirname(__FILE__) . '/../../'));

//START: site configuration
Yii::setAlias('site_title', 'Marvel APP');
Yii::setAlias('site_footer', 'Marvel APP');
//END: site configuration

//START: BACK-END message

//START: Admin users
Yii::setAlias('admin_user_change_password_msg', 'Your password has been changed successfully !');
Yii::setAlias('admin_user_forget_password_msg', 'E-Mail has been sent with new password successfully !');
//END: Admin user

//START: Email template message
Yii::setAlias('email_template_add_message', 'Template has been added successfully !');
Yii::setAlias('email_template_update_message', 'Template has been updated successfully !');
Yii::setAlias('email_template_delete_message', 'Template has been deleted successfully !');
//END: Email template message

//START: Restaurant message
Yii::setAlias('user_add_message', 'user has been added successfully !');
Yii::setAlias('user_update_message', 'user has been updated successfully !');
Yii::setAlias('user_delete_message', 'user has been deleted successfully !');
//END:  Restaurant message

Yii::setAlias('vehicle_type_create', 'Vehicle Type has been added successfully !');
Yii::setAlias('vehicle_type_update', 'Vehicle Type has been updated successfully !');
Yii::setAlias('vehicle_type_delete', 'Vehicle Type has been deleted successfully !');


Yii::setAlias('peak_times_create', 'Peak Times has been added successfully !');
Yii::setAlias('peak_times_update', 'Peak Times has been updated successfully !');
Yii::setAlias('peak_times_delete', 'Peak Times has been deleted successfully !');

Yii::setAlias('vehicle_type_rates_create', 'Rates has been added successfully !');
Yii::setAlias('vehicle_type_rates_update', 'Rates has been updated successfully !');
Yii::setAlias('vehicle_type_rates_delete', 'Rates has been deleted successfully !');