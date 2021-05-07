<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\WhitelistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Whitelists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="whitelist-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Whitelist', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'firstname',
            'lastname',
            'middlename',
            'gender',
            //'dob',
            'phone',
            //'bvn',
            //'tradetype',
            //'trade_subtype_name',
            //'home_address',
            //'date_enumerated',
            //'current_bank',
            //'account_number',
            //'state',
            //'lga',
            //'cluster_location',
            //'trademoni_id',
            //'batch_id',
            //'agent_firstname',
            //'agent_lastname',
            //'agent_middlename',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
