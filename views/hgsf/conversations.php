<?php
// page that renders paylogs form based on paylogs model
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
// use yii\bootstrap\ActiveForm;
// https://github.com/2amigos/yii2-date-picker-widget
use dosamigos\datepicker\DatePicker;
use yii\widgets\Pjax; //ajax implentation for Yii2
// use app\models\User;
use app\models\Product;
use app\models\State;
use app\models\Bank;
use kartik\select2\Select2;
use app\models\EntrySource;
use app\models\CallSource;
use app\models\Comment;
use webvimark\modules\UserManagement\models\User;
$user = User::getCurrentUser();


/* @var $this yii\web\View */
/* @var $model app\models\Conversations */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
  form div.required label.control-label:after {

  content:" * ";

  color:red;

}
</style>
<div class="paylogs-form">
<div class="panel panel-success">
  <div class="panel-heading"><h5> Log a new conversation.</h5></div>

    <div class="panel-body">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    // Yii::$app->db opens a connection to the db. refer to pg 250 of yii2 guide pdf
            Yii::$app->db
            ->createCommand("INSERT INTO generator(create_date,time_created) VALUES(NOW(),CURRENT_TIME)")
            ->execute();
          $row = Yii::$app->db
            ->createCommand("SELECT CONCAT('4',MAX(CONCAT(DATE_FORMAT(create_date,'%Y%m%d'),LPAD(sequence,4,'0')))) AS gen from generator;")
            ->queryOne(); ?>

    <?= $form->field($calllogs, 'ticket_number')->textInput(['value'=>$row['gen'], 'readonly'=>true]) ?>

    <?= $form->field($calllogs, 'product_id')->dropdownList(ArrayHelper::map(Product::find()->all(), 'id', 'product_name')) ?>

    <?= $form->field($calllogs, 'amount_paid')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($calllogs, 'state_id')->widget(Select2::classname(),
    // [
    //     'data' => ArrayHelper::map(State::find()->all(), 'id', 'state_name'),
    //     'language' => 'en',
    //     'options' => ['placeholder' => 'Select State...'],
    //     'pluginOptions' => [
    //         'allowClear' => true
    //     ],
                                                      //  ]); ?>

    <?= $form->field($calllogs, 'category_id')->hiddenInput(['value' => 4])->label(false) ?>

    <?= $form->field($calllogs, 'date_paid')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
        'autoclose' => true,
        'format' => 'yyyy-mm-dd'
    ]
]);?>

    <?= $form->field($calllogs, 'entry_category')->dropdownList([
        'Information correct'=>'Information Correct',
        'Incorrect payment'=>'Incorrect Payment',
        'Incomplete call'=>'Incomplete Call',
        'Customer does not have info'=>'Customer does not have info',
        ],
        ['prompt'=>'Select a Category...']
        ) ?>

    <?= $form->field($calllogs, 'comment_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Comment::find()
    ->where(['category_id'=>4, 'status'=>1])
    ->all(), 'id', 'comments'),
    'language' => 'en',
    'options' => ['placeholder' => 'Select Comment...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]); ?>

    <?= $form->field($calllogs, 'other_comment')->textarea(['rows' => 2]) ?>

    <?= $form->field($calllogs, 'phone_no')->textInput(['value'=> $model->phone_number,
                                                    'readonly'=>false]) ?>

    <?= $form->field($calllogs, 'entry_source_id')->dropdownList(ArrayHelper::map(EntrySource::find()
    ->all(), 'id', 'source_name'),
    ['prompt' => 'Select Source...']) ?>

    <div id="cs" style="display:none;">
        <?= $form->field($calllogs, 'call_source_id')->dropdownList(ArrayHelper::map(CallSource::find()
            ->where([ 'id'=>[1,2]])
        ->all(), 'id', 'name'),
        ['prompt' => 'Select Call Source...']) ?>
    </div>


    <?= $form->field($calllogs, 'member_id')->textInput(['value' => $model->member_id ? $model->member_id : $model->phone_number,
                                                        'readonly' => true]) ?>
    <?= $form->field($calllogs, 'account_no')->textInput(['maxlength'=>true]) ?>

    <?= $form->field($calllogs, 'bank_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Bank::find()
    ->all(), 'id', 'bank'),
    'language' => 'en',
    'options' => ['placeholder' => 'Select Bank...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]); ?>

    <?= $form->field($calllogs, 'fraud_status')->dropdownList([
        '0'=>'Not Fraud',
        '1'=>'Fraud'
      ]) ?>

    <?= $form->field($calllogs, 'cc_agent_action')->textarea(['rows' => 2]) ?>

    <?= $form->field($calllogs, 'ticket_status')->dropdownList(['resolved'=>'Resolved',
                                                                  'open'=>'Open',
                                                                    ],['prompt'=>'Select Ticket Status...']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn-save']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
    </div>
</div>
<?php
$script = <<< JS

$('#paylogs-fraud_status').change(function () {

  if ($('#paylogs-fraud_status').val() == '1') {
  $('#fraud-field').show();
} else {
  $('#fraud-field').hide();
        }
  });

  $('#paylogs-entry_source_id').change(function () {
    if ($('#paylogs-entry_source_id').val() == '1') {
    $('#cs').show();
  } else {
    $('#cs').hide();
  }
  });


/////////////////
function hold_on (){
  setTimeout(function(){  $('form').find(':submit').prop('disabled', false); }, 3500);
}

$('form').submit(function(){
  console.log('Submitted once only');
  $(this).find(':submit').attr('disabled','disabled');
  hold_on();
});

JS;
$this->registerJs($script)
?>
