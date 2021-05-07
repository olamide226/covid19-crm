<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EcrmConversations */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ecrm Conversations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ecrm-conversations-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ticket_number',
            'ticket_status',
            'customer_name',
            'phone_no',
            'member_id',
            'entry_category',
            'association',
            'amount_paid',
            'date_paid',
            'comment',
            'other_comment',
            'cc_agent_response',
            'fraud_status',
            'cc_agent_action',
            'user_id',
            'entry_source',
            'ecrm_category_id',
            'agent_phone_no',
            'agent_name',
            'payment_medium',
            'entry_date',
            'created_date',
        ],
    ]) ?>

</div>
