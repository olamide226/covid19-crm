<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KwikcashSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kwikcashes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kwikcash-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kwikcash', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'customer_name',
            'cust_phone_number',
            'complaints',
            'response:ntext',
            //'created_by',
            //'date_created',
            //'action',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
