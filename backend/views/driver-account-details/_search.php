<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DriverAccountDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="driver-account-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'stripe_bank_account_holder_name') ?>

    <?= $form->field($model, 'stripe_bank_account_holder_type') ?>

    <?= $form->field($model, 'stripe_bank_routing_number') ?>

    <?php // echo $form->field($model, 'stripe_bank_account_number') ?>

    <?php // echo $form->field($model, 'stripe_bank_token') ?>

    <?php // echo $form->field($model, 'stripe_connect_account_id') ?>

    <?php // echo $form->field($model, 'stripe_bank_accout_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
