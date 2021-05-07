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

$this->title = 'Existing Caterers';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="hgsf-index">

    <!-- <h3><?= Html::encode($this->title) ?></h3> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php Pjax::begin()?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        // 'tableOptions'=>['class'=>'table table-striped table-bordered table-condensed'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'customer_name',
            'phone_number',
            'state',
            'lga',
            //'designation',
            //'last_pay_date',
            //'amount_paid',
            //'amount_due',
            //'status',

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
  <?php $form = ActiveForm::begin(['action'=>'index.php?r=hgsf/excel']); ?>
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
