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
    
    <?= $form->field($model, 'ticket_number')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'product_id')->dropdownList(ArrayHelper::map(Product::find()->all(), 'id', 'product_name'),['disabled'=>'true']) ?>

    <?= $form->field($model, 'amount_paid')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'state_id')->widget(Select2::classname(),
    // [
    //     'data' => ArrayHelper::map(State::find()->all(), 'id', 'state_name'),
    //     'language' => 'en',
    //     'options' => ['placeholder' => 'Select State...'],
    //     'pluginOptions' => [
    //         'allowClear' => true
    //     ],
                                                      //  ]); ?>

    <?= $form->field($model, 'category_id')->hiddenInput(['value' => 4])->label(false) ?>

    <?= $form->field($model, 'date_paid')->widget(
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

    <?= $form->field($model, 'entry_category')->dropdownList([
        'Information correct'=>'Information Correct',
        'Incorrect payment'=>'Incorrect Payment',
        'Incomplete call'=>'Incomplete Call',
        'Customer does not have info'=>'Customer does not have info',
        ],
        ['prompt'=>'Select a Category...']
        ) ?>

    <?= $form->field($model, 'comment_id')->dropdownList(ArrayHelper::map(Comment::find()
    ->all(), 'id', 'comments'),['disabled'=>true]); ?>

    <?= $form->field($model, 'other_comment')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'phone_no')->textInput(['readonly'=>false]) ?>

    <?= $form->field($model, 'entry_source_id')->dropdownList(ArrayHelper::map(EntrySource::find()
    ->all(), 'id', 'source_name'),
    ['prompt' => 'Select Source...']) ?>

    <div id="cs" style="display:none;">
        <?= $form->field($model, 'call_source_id')->dropdownList(ArrayHelper::map(CallSource::find()
            ->where([ 'id'=>[1,2]])
        ->all(), 'id', 'name'),
        ['prompt' => 'Select Call Source...']) ?>
    </div>


    <?= $form->field($model, 'member_id')->textInput(['readonly' => true]) ?>
    <?= $form->field($model, 'account_no')->textInput(['maxlength'=>true]) ?>

    <?= $form->field($model, 'bank_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Bank::find()
    ->all(), 'id', 'bank'),
    'language' => 'en',
    'options' => ['placeholder' => 'Select Bank...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]); ?>

    <?= $form->field($model, 'fraud_status')->dropdownList([
        '0'=>'Not Fraud',
        '1'=>'Fraud'
      ]) ?>

    <?= $form->field($model, 'cc_agent_action')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'ticket_status')->dropdownList(['resolved'=>'Resolved',
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
