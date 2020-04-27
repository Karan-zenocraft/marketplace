<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VehicleDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vehicle_type_id')->textInput() ?>

    <?= $form->field($model, 'seat_capacity')->textInput() ?>

    <?= $form->field($model, 'vehicle_registration_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vehicle_image_front')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vehicle_image_back')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'driver_license_image_front')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'driver_license_image_back')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vehicle_registration_image_front')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vehicle_registration_image_back')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
