<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VehicleTypes */

$this->title = 'Create Vehicle Type';
$this->params['breadcrumbs'][] = ['label' => 'Manage Vehicle Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-types-create email-format-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
