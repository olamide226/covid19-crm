<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WlistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Whitelist';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wlist-index">

    <h3><!--?= Html::encode($this->title) ?--></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<!--
    <p>
        <?= Html::a('Create Wlist', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'enumerator',
            // 'agentname',
            // 'batch_id',
            // 'rejection_reason:ntext',
            [
              'attribute' => 'firstname',
              'label' => 'Name',
              'value' => function ($model)
              {
                return $model->firstname . " " .$model->lastname . " " . $model->middlename;
              }
            ],
            //'lastname',
            //'middlename',
            //'gender',
            //'dob',
            'phone',
            //'bvn',
            //'tradetype',
            //'tradesubtype',
            //'state',
            //'lga',
            //'home_address',
            //'current_bank',
            //'account_number',
            //'gps',
            //'cluster_location',
            //'picture',
            //'facial_picture',
            //'certificate_picture',
            //'current_status',
            //'date_submission',
            //'disbursement',
            //'date_disbursement',
            // 'amount_due',
            [
              'attribute' => 'amount_due',
              // 'label' => 'Name',
              'value' => function ($model)
              {
                return number_format($model->amount_due,2) ;
              }
            ],
            [
              'attribute' => 'amount_repaid',
              // 'label' => 'Name',
              'value' => function ($model)
              {
                return number_format($model->amount_repaid,2) ;
              }
            ],
            [
              'attribute' => 'amount_default',
              // 'label' => 'Name',
              'value' => function ($model)
              {
                return number_format($model->amount_default,2) ;
              }
            ],
            // 'amount_repaid',
            // 'amount_default',
            //'createdon',
            //'is_callable',
            //'date_called',
            //'call_description:ntext',
            //'call_not_reachable',
            //'is_applied',
            //'date_applied',
            //'is_disbursed',
            //'trademoni_id',
            //'smile_reference',
            //'date_enumerated',
            //'date_batch_verify',
            //'wallet_map_id',
            //'wallet_name',
            //'senatorial_id',
            //'geopolitical_id',
            //'agent_id',
            //'is_cashedout',
            //'date_cashout',
            //'region',

            ['class' => 'yii\grid\ActionColumn','template'=>'{view}',
            'buttons' => [
              'view' => function ($url, $model) {
                return Html::a('<button class="btty"><i class="fa fa-eye"></i></button>', $url, [
                            'title' => Yii::t('app', 'View Records'),
                ]);
              }
            ],
          ],
        ],
    ]); ?>
</div>
