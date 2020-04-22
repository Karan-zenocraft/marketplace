<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PeakTimes */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="email-format-index">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?=Html::encode($this->title)?></div>
    </div>
    <div class="block-content collapse in">
<div class="peak-times-form span12 common_search">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
                
     <div class="span3 style_input_width">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
</div>
</div>

<div class="row">
     <div class="span3 style_input_width">
    <?php // $form->field($model, 'start_time')->textInput() ?>
    
   <?= $form->field($model, 'start_time')->textInput(['class'=>'form-control end_time','value'=>$model->start_time]); ?>
               
      </div></div>
      <div class="row">
     <div class="span3 style_input_width">       
   <?= $form->field($model, 'end_time')->textInput(['class'=>'form-control end_time','value'=>$model->end_time]); ?>
</div>
</div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript">
  
$(document).ready(function(){
    $('.start_time').timepicker();
    $('.end_time').timepicker();
});
</script>

