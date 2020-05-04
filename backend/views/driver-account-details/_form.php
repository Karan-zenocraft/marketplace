<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DriverAccountDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="driver-account-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'stripe_bank_account_holder_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stripe_bank_account_holder_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stripe_bank_routing_number')->textInput() ?>

    <?= $form->field($model, 'stripe_bank_account_number')->textInput() ?>

    <?= $form->field($model, 'stripe_bank_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stripe_connect_account_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stripe_bank_accout_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
