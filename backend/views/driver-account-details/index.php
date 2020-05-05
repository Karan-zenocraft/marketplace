<style type="text/css">


    
.nav-list li:nth-child(2), .nav-list li:nth-child(2) a:hover{background: #006dcc;}
.nav-list li:nth-child(2) span, .nav-list li:nth-child(2) span:hover{color: #fff!important;}
</style>
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\components\Common;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DriverAccountDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Driver Account Details : '.Common::get_user_name($_GET['user_id']);
$this->params['breadcrumbs'][] = ['label' => 'Manage Users', 'url' => ['users/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="driver-account-details-index email-format-index">

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
          //  ['class' => 'yii\grid\SerialColumn'],

            //'id',
           // 'user_id',
            'stripe_bank_account_holder_name',
            'stripe_bank_account_holder_type',
            'stripe_bank_routing_number',
            'stripe_bank_account_number',
            'stripe_bank_token',
            'stripe_connect_account_id',
            'stripe_bank_accout_id',
            //'created_at',
            //'updated_at',
        ],
    ]); ?>
 </div>
    </div>
</div>
