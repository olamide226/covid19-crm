<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use webvimark\modules\UserManagement\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\TradermoniOutgoing */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tradermoni Outgoings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tradermoni-outgoing-view">

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <div class="panel panel-success">
      <div class="panel-heading"><h3><?= Html::encode($this->title) ?></h3></div>
      <div class="panel-body">

    <p> <?= Html::a('Create New Outgoing Call Record', ['create'], ['class' => 'btty']) ?>
      <?php
    echo
      Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn-save']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          'customer_name',
          'phone_no',
          'comment.comments',
          'other_comment',
          [
			'attribute' => 'user_id',
			'label' => 'Created By',
			'value' => function ($model) {
				return $model->user->first_name ." ". $model->user->last_name;
		}
  ],
        ],
    ]) ?>
  </div>
    </div>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>
