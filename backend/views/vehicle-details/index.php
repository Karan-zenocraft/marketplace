<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\components\Common;
/* @var $this yii\web\View */
/* @var $searchModel common\models\VehicleDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manage Vehicle Details : '.Common::get_user_name($_GET['user_id']);
$this->params['breadcrumbs'][] = ['label' => 'Manage Users', 'url' => ['users/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">


    
.nav-list li:nth-child(2), .nav-list li:nth-child(2) a:hover{background: #006dcc;}
.nav-list li:nth-child(2) span, .nav-list li:nth-child(2) span:hover{color: #fff!important;}





  /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

  .modal-body {
    position:relative; /* This avoids whatever it's absolute inside of it to go off the container */
    height: 250px; /* let's imagine that your login box height is 250px . This height needs to be added, otherwise .img-responsive will be like "Oh no, I need to be vertically aligned?! but from which value I need to be aligned??" */
}
.img-responsive {
   
    left:50%;
    top:50%;
    margin-top:-25px; /* This needs to be half of the height */
    margin-left:-25px; /* This needs to be half of the width */
}
</style>
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
                 'format' => 'html',
             'value' => function ($data) {
                if (!empty($data->vehicle_image_front)) {
                $vehicle_image_front = Yii::$app->params['root_url'] . '/' . "uploads/driver_images/" . $data->vehicle_image_front;
                return Html::img($vehicle_image_front, ['alt'=>'Vehicle Image Front','width'=>'250','height'=>'100','class'=>"myImg"]);
                } else {
                    return "-";
                }
            },
        ],
        [
            'attribute' => 'vehicle_image_back',
                 'format' => 'html',
             'value' => function ($data) {
                if (!empty($data->vehicle_image_back)) {
                $vehicle_image_back = Yii::$app->params['root_url'] . '/' . "uploads/driver_images/" . $data->vehicle_image_back;
                return Html::img($vehicle_image_back, ['alt'=>'Vehicle Image Back','width'=>'250','height'=>'100','class'=>"myImg"]);
                } else {
                    return "-";
                }
            },
        ],
            [
            'attribute' => 'driver_license_image_front',
            'format' => 'html',
            'value' => function ($data) {
                if (!empty($data->driver_license_image_front)) {
                $driver_license_image_front = Yii::$app->params['root_url'] . '/' . "uploads/driver_images/" . $data->driver_license_image_front;
                return Html::img($driver_license_image_front, ['alt'=>'Driver Licence Image Front','width'=>'250','height'=>'100','class'=>"myImg"]);
                } else {
                    return "-";
                }
            },
        ],
         [
            'attribute' => 'driver_license_image_back',
            'format' => 'html',
             'value' => function ($data) {
                if (!empty($data->driver_license_image_back)) {
                $driver_license_image_back = Yii::$app->params['root_url'] . '/' . "uploads/driver_images/" . $data->driver_license_image_back;
                return Html::img($driver_license_image_back, ['alt'=>'Driver Licence Image Back','width'=>'250','height'=>'100','class'=>"myImg"]);
                } else {
                    return "-";
                }
            },
        ],
             [
            'attribute' => 'vehicle_registration_image_front',
              'format' => 'html',
             'value' => function ($data) {
                if (!empty($data->vehicle_registration_image_front)) {
                $vehicle_registration_image_front = Yii::$app->params['root_url'] . '/' . "uploads/driver_images/" . $data->vehicle_registration_image_front;
                return Html::img($vehicle_registration_image_front, ['alt'=>'Vehicle Registration Image Front','width'=>'250','height'=>'100','class'=>"myImg"]);
                } else {
                    return "-";
                }
            },
        ],
             [
            'attribute' => 'vehicle_registration_image_back',
             'format' => 'html',
             'value' => function ($data) {
                if (!empty($data->vehicle_registration_image_back)) {
                $vehicle_registration_image_back = Yii::$app->params['root_url'] . '/' . "uploads/driver_images/" . $data->vehicle_registration_image_back;
                return Html::img($vehicle_registration_image_back, ['alt'=>'Vehicle Registration Image Back','width'=>'250','height'=>'100','class'=>"myImg"]);
                } else {
                    return "-";
                }
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

<!-- The Modal -->
  


<!-- 
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="img-fluid" id="img01">
  <div id="caption"></div>
</div> -->

<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="Model-Center">
          <img class="img-fluid" id="img01">
  <div id="caption"></div>
        </div>
        
        <!-- Modal footer -->
        
      </div>
    </div>
  </div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript">



$( document ).ready(function() {
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
$(".myImg").on('click', function(event){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
});

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}

    });
</script>

