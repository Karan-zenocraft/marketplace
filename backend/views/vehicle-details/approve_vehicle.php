<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Approve Product: ' . $vehicleModel->name);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-format-index">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left users_permission_title"><?=Html::encode($this->title)?></div>
    </div>

    <div class="portlet-body form block-content collapse in">
        <div class="users-form span12 hours_form">
            <?php $form = ActiveForm::begin(['id' => 'approve_driver_form']);?>
            <?php //Html::checkBox('select_all', false, array('label' => 'Select All', 'class' => 'select_all')) ?>
                            <?=$form->field($vehicleModel, "is_approve")->dropDownList(Yii::$app->params['is_approve_vehicle']); ?>

                             <?=$form->field($vehicleModel, "admin_message")->textArea(['required' => "required"]); ?>
                       </div>
                   </div>

                   </div>

            <div class="form-group form-actions">
                <?=Html::submitButton('Save', ['class' => 'btn btn-success submitButton' /* , 'onClick' => 'javascript:console.log($(".users-form .userfieldsShow"));return false;' */])?>
                <?=Html::a(Yii::t('app', 'Cancel'), 'javascript:void(0)', ['class' => 'btn default btn-success', 'onClick' => 'parent.jQuery.colorbox.close();'])?>
            </div>
            <?php ActiveForm::end();?>

<script type="text/javascript">

</script>

