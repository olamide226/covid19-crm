<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Wlist */

$this->title = $model->phone;
$this->params['breadcrumbs'][] = ['label' => 'Whitelist', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">

  <div class="wlist-view col-md-offset-1 col-md-4" >

    <!-- <h4><?= Html::encode($this->title) ?></h4> -->

    <div class="panel panel-success">
      <div class="panel-heading"><b><?= $model->firstname . " " .$model->lastname . " " . $model->middlename; ?></b></div>
      <div class="panel-body">
        <center>
        <?= Html::img('http://whitelist.tradermoni.ng/api/images/candidate/picture/'.(string) $model->id . ".png", ['alt'=>$model->firstname.' '.$model->lastname.' '.$model->middlename,'class'=>'profile-user-img img-responsive ','style'=>'height:300px; width:300px;']); ?>
        </center>
      </div>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'enumerator',
            // 'agentname',
            // 'batch_id',
            // 'firstname',
            // 'lastname',
//             [
//     'attribute'=>'photo',
//     'value'=> 'http://whitelist.tradermoni.ng/api/images/candidate/picture/'.(string) $model->id . ".png",
//     'format' => ['image',['width'=>'300','height'=>'300', 'class'=>'img-thumbnail']],
// ],
            // [
            //   'attribute' => 'firstname',
            //   'label' => 'Name',
            //   'value' => function ($model)
            //   {
            //     return $model->firstname . " " .$model->lastname . " " . $model->middlename;
            //   }
            // ],
            // 'middlename',
            // 'dob',
            'phone',
            // 'bvn',
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
            'date_cashout:datetime',
            'tradetype',
            'tradesubtype',
            'home_address',
            'gender',
            'current_status',
            'cluster_location',
            'state',
            'lga',
            // 'current_bank',
            // 'account_number',
            // 'gps',
            // 'picture',
            // 'facial_picture',
            // 'certificate_picture',

            // 'region',
            // 'date_submission',
            // 'disbursement',
            // 'date_disbursement',
            // // 'createdon',
            // // 'is_callable',
            // // 'date_called',
            // // 'call_description:ntext',
            // // 'call_not_reachable',
            // // 'is_applied',
            // // 'date_applied',
            // // 'is_disbursed',
            // // 'trademoni_id',
            // // 'smile_reference',
            // // 'date_enumerated',
            // // 'date_batch_verify',
            // // 'wallet_map_id',
            // // 'wallet_name',
            // // 'senatorial_id',
            // // 'geopolitical_id',
            // // 'agent_id',
            // // 'is_cashedout',
            // 'date_cashout',

        ],
    ]) ?>

  </div>


  <div class="col-md-6">
    <div class="panel panel-success">
      <div class="panel-heading"><b>Questions</b></div>
      <div class="panel-body">
        <?= $this->render('conversations', ['conv' => $conv, 'model'=> $model]); ?>
      </div>
    </div>
  </div>
<!-- end of col md 7 -->
</div>

<div class="row">
  <div class=" col-sm-12">
    <?=
    $this->render('call-logs', ['model'=>$model]);
    ?>
  </div>
  <!-- <div  class="col-sm-1"></div> -->
</div>
