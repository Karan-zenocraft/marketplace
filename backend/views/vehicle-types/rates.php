<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\web\js\common;
use yii\jui\DatePicker;

$this->title = Yii::t('app', 'Edit Restaurant Working Hours: ' . $snVehicleTypeName);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-format-index">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left users_permission_title"><?= Html::encode($this->title) ?></div>
    </div>

    <div class="portlet-body form block-content collapse in">
        <div class="users-form span12 hours_form">

            <?php $form = ActiveForm::begin(['id' => 'workinghours_form']); ?>
            <?php //Html::checkBox('select_all', false, array('label' => 'Select All', 'class' => 'select_all')) ?>
          
            <?php 
            foreach ($vehicle_type_rates as $key => $weekday) { 

                ?>
           <?php  //$user['support_only']=='1'); ?>            
                <?php //  Html::checkBox("user_permissions[user_id][$snUserId]",false,array('label'=>$user['first_name'].' '.$user['last_name']));  ?>
             
                    
                     <div class="row">
                        <div class="span3">
                            <?= $form->field($weekday, "[$key]vehicle_charge_id")->textInput(['value'=>$arrVehicleCharges[$key],'disabled'=>true]) ?>
                       </div>

                        <div class="span3">
                              <?= $form->field($weekday, "[$key]normal_charge")->textInput(['class'=>"form-control normal_charge_$key normal_charge_common",'id'=>'normal_charge','required'=>"required"]) ?>   
                       </div>
                        <div class="span3">
                            <?php echo $form->field($weekday, "[$key]peak_time_charge")->textInput(['class'=>"form-control peak_time_charge_$key peak_time_charge_common",'id'=>'peak_time_charge',"required"=>"required"]) ?>  
                       </div>
                   </div>       
            <?php } ?>
        

            <div class="form-group form-actions">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success submitButton'/* , 'onClick' => 'javascript:console.log($(".users-form .userfieldsShow"));return false;' */]) ?>
                <?= Html::a(Yii::t('app', 'Cancel'), 'javascript:void(0)', ['class' => 'btn default btn-success', 'onClick' => 'parent.jQuery.colorbox.close();']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
  
    
</script>

