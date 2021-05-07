<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TmConversationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tm Conversations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tm-conversations-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tm Conversations', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'phone',
            'amount_default',
            'amount_paid',
            //'amount_due',
            //'address',
            //'cluster_location',
            //'gender',
            //'state',
            //'region',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
