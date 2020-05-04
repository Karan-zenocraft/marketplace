<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DriverAccountDetails */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Driver Account Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="driver-account-details-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'stripe_bank_account_holder_name',
            'stripe_bank_account_holder_type',
            'stripe_bank_routing_number',
            'stripe_bank_account_number',
            'stripe_bank_token',
            'stripe_connect_account_id',
            'stripe_bank_accout_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
