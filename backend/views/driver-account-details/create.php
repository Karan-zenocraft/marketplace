<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DriverAccountDetails */

$this->title = 'Create Driver Account Details';
$this->params['breadcrumbs'][] = ['label' => 'Driver Account Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="driver-account-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
