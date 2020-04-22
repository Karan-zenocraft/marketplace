<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PeakTimes */

$this->title = 'Update Peak Times: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Manage Peak Times', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="peak-times-update email-format-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
