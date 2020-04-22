<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VehicleTypesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-types-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
    <div class="span3 style_input_width">

    <?= $form->field($model, 'title') ?>
</div>
    <div class="span3 style_input_width">
    <?= $form->field($model, 'description') ?>
</div>
</div>
<div class="row">
    <div class="span3 style_input_width">
    <?= $form->field($model, 'seat_count') ?>
</div>
    <div class="span3 style_input_width">

     <?=$form->field($model, 'status')->dropDownList(Yii::$app->params['user_status']);?></div>
 </div>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

   <div class="form-group">
        <?=Html::submitButton('Search', ['class' => 'btn btn-primary'])?>
        <?=Html::a(Yii::t('app', '<i class="icon-refresh"></i> clear'), Yii::$app->urlManager->createUrl(['vehicle-types/index', "temp" => "clear"]), ['class' => 'btn btn-default'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
