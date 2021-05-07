<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use webvimark\modules\UserManagement\models\User;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EnquirySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Enquiries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enquiry-index">
    <?php Pjax::begin() ?>
    <h1><!--?= Html::encode($this->title) ?--></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!--?= Html::button('Create Enquiry', [ 'value'=>Url::to('index.php?r=enquiry/create'),'class' => 'btty', 'id'=>'enquiryModal']) ?-->
    </p>
    <?php //modal code for Enquiries
    Modal::begin([
      'header'=>'<h4>Enquiry</h4>',
      'id'=>'modal',
      'size'=>'modal-md',
    ]);
    echo "<div id='modalContent'></div>";
    Modal::end(); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'customer_name',
            'phone_no',
            'entry_date:datetime',
            // 'association',
            //'complaints',
            //'other_comments',
            //'response',
            [
            'attribute' => 'username',
            'label' => 'Created By',
            'value' => function($model, $index, $dataColumn) {
                return $model->user->username;
            }
        ],
            //'source',
            //'action:ntext',

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
<?php Pjax::end() ?>


 <?php if ((User::hasRole('supervisor') || User::hasRole('admin')) &&  !isset($_GET['EnquirySearch'])) :
 ?>
  <?php $form = ActiveForm::begin(['action'=>'index.php?r=enquiry/excel']); ?>
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
  <div class="col-md-5">
    <?= Html::submitButton('Generate Report', ['class' => 'btty','name'=>'submit']) ?>
  </div>


  </div>
  <?php ActiveForm::end(); ?>
<?php endif; ?>
