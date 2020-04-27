<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VehicleDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vehicle Details';
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
            ['class' => 'yii\grid\SerialColumn'],

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
            //'vehicle_registration_no',
            //'vehicle_image_front',
            //'vehicle_image_back',
            //'driver_license_image_front',
            //'driver_license_image_back',
            //'vehicle_registration_image_front',
            //'vehicle_registration_image_back',
            //'status',
            //'created_at',
            //'updated_at',

          //  ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
        </div>
    </div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>