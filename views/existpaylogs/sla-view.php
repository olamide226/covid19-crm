<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Conversations */

$this->title = $model->ticket_number;
$this->params['breadcrumbs'][] = ['label' => 'Existing Caterer', 'url' => ['sla']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conversations-view">

  <div class="row">
    <div class="col-sm-offset-1 col-sm-9">
      <div class="panel panel-success">
        <div class="panel-heading"><h3>Ticket #<?= Html::encode($this->title) ?></h3></div>
        <div class="panel-body">

          <div class="row">
              <p class="pull-left">
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn-save','style'=>'margin:10px;']) ?>
              </p>
              <p class="pull-right"> <?= Html::a('Escalate', ['escalate', 'id' => $model->id], ['class' => 'btty','style'=>'margin:10px;']) ?> </p>
          </div>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    'product.product_name',
                    'category.category_name',
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
                      // 'label' => 'Priority',
                      'attribute'=>'fraud_status',
                      'filter' => ArrayHelper::map([['id'=>'1','name'=>'Fraud'],['id'=>'0','name'=>'Not Fraud']],'id','name'),
                      'value' => function ($model)
                      {
                        if ($model->fraud_status == 1) {
                          return 'Fraud';
                        } else {
                          return 'Not Fraud';
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
