<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Whitelist */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Whitelists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
  <div class="col-md-7">

<div class="whitelist-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'firstname',
            // 'lastname',
            [
              'attribute' => 'firstname',
              'label' => 'Fullname',
              'value' => function ($model)
              {
                return $model->firstname . ' ' . $model->lastname . ' ' . $model->middlename;
              }
            ],
            // 'middlename',
            'state',
            'lga',
            'phone',
            'gender',

            'dob',

            'bvn',
            'tradetype',
            'trade_subtype_name',
            'home_address',
            'date_enumerated',
            'current_bank',
            'account_number',
            'cluster_location',
            'trademoni_id',
            'batch_id',
            'agent_firstname',
            'agent_lastname',
            'agent_middlename',
        ],
    ]) ?>

</div>

</div>

<div class="col-md-5">
  <?= $this->render('verify', ['verifier' => $verifier, 'model'=> $model]); ?>
</div>
</div>
