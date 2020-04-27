<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\VehicleDetails */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vehicle-details-view">

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
            'name',
            'vehicle_type_id',
            'seat_capacity',
            'vehicle_registration_no',
            'vehicle_image_front',
            'vehicle_image_back',
            'driver_license_image_front',
            'driver_license_image_back',
            'vehicle_registration_image_front',
            'vehicle_registration_image_back',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
