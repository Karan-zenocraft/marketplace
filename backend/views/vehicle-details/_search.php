<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VehicleDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'vehicle_type_id') ?>

    <?= $form->field($model, 'seat_capacity') ?>

    <?php // echo $form->field($model, 'vehicle_registration_no') ?>

    <?php // echo $form->field($model, 'vehicle_image_front') ?>

    <?php // echo $form->field($model, 'vehicle_image_back') ?>

    <?php // echo $form->field($model, 'driver_license_image_front') ?>

    <?php // echo $form->field($model, 'driver_license_image_back') ?>

    <?php // echo $form->field($model, 'vehicle_registration_image_front') ?>

    <?php // echo $form->field($model, 'vehicle_registration_image_back') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
