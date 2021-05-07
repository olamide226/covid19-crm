<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Conversations */

$this->title = $model->ticket_number;
$this->params['breadcrumbs'][] = ['label' => 'Conversations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conversations-view">

    <div class="row">
      <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="panel panel-success">
            <div class="panel-heading"><h3>Ticket #<?= Html::encode($this->title) ?></h3></div>
            <div class="panel-body">

            <p>
              <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn-save']) ?>
            </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'comment.comments',
            'other_comment',
            'user.username',
            'created_date:date',
            'entry_date:datetime',
            'phone_no',
            'amount_paid',
            'entrySource.source_name',
            'entry_category',
            'agent_name',
            'date_paid:date',
            'member_id',
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
            }
        ],
            'cc_agent_action:ntext',
            'ticket_number',
            'ticket_status',
            'category.category_name',
            'product.product_name',
            'sla_due_time',
        ],
    ]) ?>

            </div>
          </div>
      </div>
  </div>
</div>
