<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PeakTimes */

$this->title = 'Create Peak Times';
$this->params['breadcrumbs'][] = ['label' => 'Manage Peak Times', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peak-times-create email-format-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
