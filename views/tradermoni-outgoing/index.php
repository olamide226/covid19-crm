<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use dosamigos\datepicker\DatePicker;
use webvimark\modules\UserManagement\models\User;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TradermoniOutgoingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tradermoni Outgoings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tradermoni-outgoing-index">

    <h1><!--?= Html::encode($this->title) ?--></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tradermoni Outgoing', ['create'], ['class' => 'btty']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'customer_name',
            'phone_no',
            'comment.comments',
            // 'other_comment',
            [
            'attribute' => 'user_id',
            'label' => 'Created By',
            'value' => function($model, $index, $dataColumn) {
                return $model->user->first_name . " " . $model->user->last_name;
            }
        ],
        'entry_date:datetime',

            ['class' => 'yii\grid\ActionColumn','template'=>'{view}',
                'buttons' => [
                    'view' => function ($url, $model) {
                    return Html::a('<button class="btty"><i class="fa fa-eye"></i></button>', $url, [
                                'title' => Yii::t('app', 'lead-view'),
                    ]);
                    }
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

     <?php if (User::hasRole('supervisor') || User::hasRole('admin')) :
     ?>
      <?php $form = ActiveForm::begin(['action'=>'index.php?r=tradermoni-outgoing/excel']); ?>
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

      <div class='col-md-4'>
        <div class="col-md-6">
        <?= Html::submitButton('Generate Report', ['class' => 'btty','name'=>'submit']) ?>
      </div>
      <div class='col-md-6'>
        <?= Html::submitButton('Generate Today\'s Report', ['class' => 'btty','name'=>'today_report']) ?>

        </div>
      </div>

      </div>
      <?php ActiveForm::end(); ?>
    <?php endif; ?>

</div>
