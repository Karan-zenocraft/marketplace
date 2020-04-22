<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PeakTimesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peak-times-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
 <div class="row">
    <div class="span3 style_input_width">

    <?= $form->field($model, 'name') ?>
</div>
</div>
<div class="row">
    <div class="span3 style_input_width">
      <?= $form->field($model, 'start_time')->textInput(['class'=>'form-control end_time','value'=>$model->start_time]); ?>
</div>
</div>
<div class="row">
    <div class="span3 style_input_width">
   <?= $form->field($model, 'end_time')->textInput(['class'=>'form-control end_time','value'=>$model->end_time]); ?>
</div>
</div>

    <?php // echo $form->field($model, 'updated_at') ?>

 <div class="form-group">
        <?=Html::submitButton('Search', ['class' => 'btn btn-primary'])?>
        <?=Html::a(Yii::t('app', '<i class="icon-refresh"></i> clear'), Yii::$app->urlManager->createUrl(['peak-times/index', "temp" => "clear"]), ['class' => 'btn btn-default'])?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript">
  
$(document).ready(function(){
    $('.start_time').timepicker();
    $('.end_time').timepicker();
});
</script>
