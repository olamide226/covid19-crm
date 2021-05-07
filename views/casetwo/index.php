<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
// https://github.com/2amigos/yii2-date-picker-widget
use dosamigos\datepicker\DatePicker;
use webvimark\modules\UserManagement\models\User;


/* @var $this yii\web\View */
/* @var $searchModel app\models\CasetwoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dta/Aggregator';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="casetwo-index">

    <h1><!--?= Html::encode($this->title) ?--></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



     <p>
        <?= Html::a('Create Loan Processing Ticket', ['create'], ['class' => 'btty']) ?>
    </p>
    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ticket_number',
            'ticket_status',
            'customer_name',
            'phone_no',
            // 'association',
            // 'category_name',
            [
            'attribute' => 'category_name',
            'label' => 'Category',
            'value' => function($model, $index, $dataColumn) {
                return $model->category->category_name;
            }
        ],
            'entry_date:datetime',
            //'complaints',
            //'other_comments',
            //'response',
            //'action:ntext',
            // 'user_id',
            [
            'attribute' => 'username',
            'label' => 'Created By',
            'value' => function($model, $index, $dataColumn) {
                return $model->user->first_name;
            }
        ],
            //'entry_source_id',
            // 'category_id',
            //'agent_phn_number',
            //'agent_name',

            ['class' => 'yii\grid\ActionColumn','template'=>'{view}',
            'buttons' => [
                'view' => function ($url, $model) {
                  return Html::a('<button class=" btty" ><i class="fa fa-eye"></i></button>', $url, [
                              'title' => Yii::t('app', 'view'),
                  ]);
                }
              ],
            ],
        ],
    ]); ?>
</div>

<?php if ((User::hasRole('supervisor') || User::hasRole('admin') || User::hasRole('boiBackendTeam')) && !isset($_GET['CasetwoSearch'])) :
?>
  <?php $form = ActiveForm::begin(['action'=>'index.php?r=casetwo/excel']); ?>
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

    <div class="col-md-2">
        <?= Html::dropDownList('app_source',null,
        ['dta'=>'dta','aggregator'=>'aggregator','tm'=>'Tradermoni Applicants'],
        ['class' => 'form-control'])  ?>
    </div>

    <div class='col-md-3'>
        <div class="row">
            <div class="col-md-12">
            <?= Html::submitButton('Generate Report', ['class' => 'btty','name'=>'submit']) ?>
            </div>
        </div>

        <div class='row' style="margin-top:5px;">
            <div class="col-md-12">
            <?= Html::submitButton('Export Today\'s Report', ['class' => 'btty','name'=>'today_report']) ?>
            </div>
        </div>
    </div>

</div>
  <?php ActiveForm::end(); ?>
<?php else: echo ""; endif; ?>
  <?php Pjax::end();?>
