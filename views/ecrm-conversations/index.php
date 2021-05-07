<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EcrmConversationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ecrm Conversations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ecrm-conversations-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ecrm Conversations', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ticket_number',
            'ticket_status',
            'customer_name',
            'phone_no',
            //'member_id',
            //'entry_category',
            //'association',
            //'amount_paid',
            //'date_paid',
            //'comment',
            //'other_comment',
            //'cc_agent_response',
            //'fraud_status',
            //'cc_agent_action',
            //'user_id',
            //'entry_source',
            //'ecrm_category_id',
            //'agent_phone_no',
            //'agent_name',
            //'payment_medium',
            //'entry_date',
            //'created_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
