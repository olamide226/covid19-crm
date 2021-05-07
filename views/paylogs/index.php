<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ConversationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Call Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conversations-index">

    <h1><!--?= Html::encode($this->title) ?--></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'comment.comments',
            // 'other_comment',

            'ticket_number',
            'ticket_status',
            'member_id',
            'phone_no',
            // 'user.username',
            [
            'attribute' => 'user_id',
            'label' => 'Username',
            'value' => function($model, $index, $dataColumn) {
                return $model->user->username;
            }
        ],
            
            'entry_date:datetime',
            
            //'amount',
            //'source',
            //'categories',
            //'agent_name',
            //'date_paid',
            //'fraud_suspected',
            //'action:ntext',

            ['class' => 'yii\grid\ActionColumn','template' => '{view}',
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
    <?php Pjax::end(); ?>

</div>
