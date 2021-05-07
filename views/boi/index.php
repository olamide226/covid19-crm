<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
// use kartik\export\ExportMenu;
// https://github.com/2amigos/yii2-date-picker-widget
use dosamigos\datepicker\DatePicker;
use yii\widgets\ActiveForm;
use webvimark\modules\UserManagement\models\User;
// use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BoiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'BOI';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="boi-index">

    <!--h1><?= Html::encode($this->title) ?></h1-->
    <!--?php echo $this->render('_search', ['model' => $searchModel]); ?-->

    <p>
        <!-- <?= Html::a('Create Boi', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>
<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions'=>['class'=>'table table-striped table-bordered table-condensed'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'customer_name',
            'phone_number',
            // 'association',
            'member_id',
            // 'state',
            'amount',
            //'tenure',
            //'bvn',
            //'mou_status',
            //'first_due_date',
            //'amount_due',
            //'amount_re_paid',
            //'amount_in_default',
            //'sub_aggregator',
            //'aggregator',
            //'beneficiary_institution',
            //'nuban',
            //'date_requested',
            //'status',
            //'reason_for_rejection',
            //'last_change_date',
            ['class' => 'yii\grid\ActionColumn','template' => '{view}',
              'buttons' => [
                'view' => function ($url, $model) {
                  return Html::a('<button class=" btty" ><i class="fa fa-eye"></i></button>', $url, [
                              'title' => Yii::t('app', 'View Record'),
                  ]);
                }
              ],
            ],
        ],
    ]); ?>
</div>


 <?php if ((User::hasRole('supervisor') || User::hasRole('admin') || User::hasRole('boiBackendTeam') ) && !isset($_GET['BoiSearch'])) :
 ?>
  <?php $form = ActiveForm::begin(['action'=>'index.php?r=boi/excel']); ?>
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

  <?php Pjax::end()?>
