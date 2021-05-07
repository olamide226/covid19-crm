<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use dosamigos\datepicker\DatePicker;
use webvimark\modules\UserManagement\models\User;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TmverificationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Verification List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tmverification-index">

    <h1><!--?= Html::encode($this->title) ?--></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       <!--  <?= Html::a('Create Tmverification', ['create'], ['class' => 'btty']) ?> -->
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'candidateid',
            'firstname',
            'lastname',
            //'middlename',
            'gender',
            //'dob',
            'phone',
            //'bvn',
            //'tradetype',
            //'trade_subtype_name',
            //'home_address',
            //'date_enumerated',
            //'current_bank',
            //'account_number',
            //'state',
            //'lga',
            //'cluster_location',
            //'trademoni_id',
            'batch_id',
            //'agent_firstname',
            //'agent_lastname',
            //'agent_middlename',
            //'status',
            //'reason',
            //'valid_rating',
            //'user_id',
            //'created_on',

            ['class' => 'yii\grid\ActionColumn','template' => '{view}{update}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<button class=" btty-sm" ><i class="fa fa-eye"></i></button>', $url, [
                                    'title' => Yii::t('app', 'View Record'),
                        ]);
                    },
                    'update' => function ($url, $model){
                        return Html::a('<button class=" btty-sm" style="margin-top:5px;"><i class="fa fa-pen"></i></button>', $url, [
                          'title' => Yii::t('app', 'Update Record')
                        ]);
                    },
                    // 'delete' => function ($url, $model){
                    //     return Html::a('<button class=" btty-sm"><i class="fa fa-trash"></i></button>', $url, [
                    //       'title' => Yii::t('app', 'Delete Record')
                    //     ]);
                    // }
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

    <!-- <?php if (User::hasRole('supervisor') || User::hasRole('admin')) :
     ?>
      <?php $form = ActiveForm::begin(['action'=>'index.php?r=tmverification/excel']); ?>
      <div class='row' style="margin-top:30px">
        <div class='col-md-3'>

          <?= DatePicker::widget([
              'name' => 'start_date',
              'value' => date('Y-m-d'),
              'template' => '{addon}{input}',
                  'clientOptions' => [
                      'autoclose' => true,
                      'format' => 'yyyy-mm-dd'
                  ]
          ]);?>

        </div>
        <div class="col-md-1">
            <b>To</b>
        </div>
        <div class='col-md-3'>

          <?= DatePicker::widget([
              'name' => 'end_date',
              'value' => date('Y-m-d'),
              'template' => '{addon}{input}',
                  'clientOptions' => [
                      'autoclose' => true,
                      'format' => 'yyyy-mm-dd'
                  ]
          ]);?>
        </div>
        <div class='col-md-5'> 
            <div class="row">
                <div class="col-md-6">
                    <?= Html::submitButton('Generate Report', ['class' => 'btn btn-success','name'=>'submit']) ?>
                </div>
                <div class='col-md-6'>
                    <?= Html::submitButton('Generate Today\'s Report', ['class' => 'btn btn-success','name'=>'today_report']) ?>
                </div>
            </div>
      </div>

      
      <?php ActiveForm::end(); ?>
    <?php endif; ?> -->
</div>
