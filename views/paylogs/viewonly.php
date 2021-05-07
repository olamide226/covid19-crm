<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Conversations */

$this->title = $model->ticket_number;
$this->params['breadcrumbs'][] = ['label' => 'Conversations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paylogs-view">

    <h3>Ticket #<?= Html::encode($this->title) ?></h3>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'ticket_number',
            'ticket_status',
            
            'comment.comments',
            'other_comment',
            'user.username',
            'entry_date:datetime',
            'phone_no',
            'amount_paid',
            'entrySource.source_name',
            'entry_category',
            // 'agent_name',
            'date_paid:date',
            'member_id',
            'bank.bank',
            'account_no',
            // 'fraud_status',
            [
            'attribute' => 'fraud_status',
            'label' => 'Fraud?',
            'value' => function($model) {
                    if ($model->fraud_status == 1) {
                      return "Yes";
                    }else {
                      return "No";
                    }
            },
        ],
            // 'cc_agent_action:ntext',
            // 'category.category_name',
            // 'product.product_name',
            // 'sla_due_time',
        ],
    ]) ?>

</div>
<!-- below are logs of all current ticket -->
<div class="row">
    <div class="col-md-12 col-sm-6">
        <?=
        $this->render('call-logs', ['model'=>$model]);
        ?>
    </div>
</div>
