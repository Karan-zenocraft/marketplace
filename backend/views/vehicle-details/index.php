<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\components\Common;
/* @var $this yii\web\View */
/* @var $searchModel common\models\VehicleDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manage Vehicle Details';
$this->params['breadcrumbs'][] = ['label' => 'Manage Users', 'url' => ['users/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-details-index email-format-index">

    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?=Html::encode($this->title)?></div>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>
    <div class="block-content">
        <div class="goodtable">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
         'filterModel' => null,
    'layout' => "<div class='table-scrollable'>{items}</div>\n<div class='margin-top-10'>{summary}</div>\n<div class='dataTables_paginate paging_bootstrap pagination'>{pager}</div>",
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

          //  'id',
          //  'user_id',
              [
            'attribute' => 'user_id',
            'value' => function ($data){
                return !empty($data->user_id) ? $data->user->first_name." ".$data->user->last_name : '-';
            },
        ],
            'name',
           // 'vehicle_type_id',
            [
            'attribute' => 'vehicle_type_id',
            'value' => function ($data){
                return !empty($data->vehicle_type_id) ? $data->vehicleType->title : '-';
            },
        ],
            'seat_capacity',
            'vehicle_registration_no',
        [
            'attribute' => 'vehicle_image_front',
            'format' => 'image',
            'value' => function ($data) {
                if (!empty($data->vehicle_image_front)) {
                    $vehicle_image_front = Yii::$app->params['root_url'] . '/' . "uploads/driver_images/" . $data->vehicle_image_front;
                } else {
                    $vehicle_image_front = "-";
                }
                return $vehicle_image_front;
            },
        ],
        [
            'attribute' => 'vehicle_image_back',
            'format' => 'image',
            'value' => function ($data) {
                if (!empty($data->vehicle_image_back)) {
                    $vehicle_image_back = Yii::$app->params['root_url'] . '/' . "uploads/driver_images/" . $data->vehicle_image_back;
                } else {
                    $vehicle_image_back = "-";
                }
                return $vehicle_image_back;
            },
        ],
            [
            'attribute' => 'driver_license_image_front',
            'format' => 'image',
            'value' => function ($data) {
                if (!empty($data->driver_license_image_front)) {
                    $driver_license_image_front = Yii::$app->params['root_url'] . '/' . "uploads/driver_images/" . $data->driver_license_image_front;
                } else {
                    $driver_license_image_front = "-";
                }
                return $driver_license_image_front;
            },
        ],
         [
            'attribute' => 'driver_license_image_back',
            'format' => 'image',
            'value' => function ($data) {
                if (!empty($data->driver_license_image_back)) {
                    $driver_license_image_back = Yii::$app->params['root_url'] . '/' . "uploads/driver_images/" . $data->driver_license_image_back;
                } else {
                    $driver_license_image_back = "-";
                }
                return $driver_license_image_back;
            },
        ],
             [
            'attribute' => 'vehicle_registration_image_front',
            'format' => 'image',
            'value' => function ($data) {
                if (!empty($data->vehicle_registration_image_front)) {
                    $vehicle_registration_image_front = Yii::$app->params['root_url'] . '/' . "uploads/driver_images/" . $data->vehicle_registration_image_front;
                } else {
                    $vehicle_registration_image_front = "-";
                }
                return $vehicle_registration_image_front;
            },
        ],
             [
            'attribute' => 'vehicle_registration_image_back',
            'format' => 'image',
            'value' => function ($data) {
                if (!empty($data->vehicle_registration_image_back)) {
                    $vehicle_registration_image_back = Yii::$app->params['root_url'] . '/' . "uploads/driver_images/" . $data->vehicle_registration_image_back;
                } else {
                    $vehicle_registration_image_back = "-";
                }
                return $vehicle_registration_image_back;
            },
        ],
            //'status',
            //'created_at',
            //'updated_at',

         [
            'header' => 'Actions',
            'class' => 'yii\grid\ActionColumn',
            'headerOptions' => ["style" => "width:40%;"],
            'contentOptions' => ["style" => "width:40%;"],
            'template' => '{approve_vehicle}',
            'buttons' => [
           'approve_vehicle' => function ($url, $model) {
                    $title = "Approve Vehicle";
                    $flag = 5;
                    $url = Yii::$app->urlManager->createUrl(['vehicle-details/approve-vehicle', 'vehicle_id' => $model->id]);
                    return Common::template_approve_driver($url, $model, $title, $flag);

                },

            ],
        ],
        ],
    ]); ?>
        </div>
    </div>
</div>

