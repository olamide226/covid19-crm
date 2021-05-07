<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2; // check https://github.com/kartik-v/yii2-widget-select2 for usage

use app\models\EntrySource;
use app\models\Comment;
use app\models\Product;
use app\models\Category;
use yii\helpers\ArrayHelper;
use app\models\CallSource;
/* @var $this yii\web\View */
/* @var $model app\models\Casetwo */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="casetwo-form">


    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'ticket_number')->textInput(['readonly'=>true]) ?>

    <div class="row">

      <div class="col-md-6">

        <?= $form->field($model, 'product_id')->dropdownList(
         ArrayHelper::map(Product::find()->all(), 'id', 'product_name'),['prompt' => 'Select Product...','disabled'=>true]) ?>
      </div>
      <div class="col-md-6 cat" style="display:none;">
        <?= $form->field($model, 'category_id')->dropdownList(ArrayHelper::map(Category::find()->where(['IN','id',[2,3,7]])
        ->all(), 'id', 'category_name'),['prompt' => 'Select Category...','disabled'=>true]) ?>
      </div>
    </div>
    <?= $form->field($model, 'phone_no')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'customer_name')->textInput() ?>


    <?= $form->field($model, 'association')->textInput() ?>


    <?php /* $form->field($model, 'comment_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Comment::find()
    ->where(['category_id'=>2, 'product_id'=>1, 'status'=>1])
    ->all(), 'id', 'comments'),
    'language' => 'en',
    'options' => ['disabled'=>true],
    'pluginOptions' => [
        'allowClear' => true
    ],
]); */?>
<?= $form->field($model, 'comment_id')->dropdownList(ArrayHelper::map(Comment::find()
    ->where(['status'=>1])
    ->all(), 'id', 'comments'),
    ['disabled' => true]) ?>


    <?= $form->field($model, 'other_comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cc_agent_response')->textInput(['maxlength' => true,'list'=>'']) ?>
    <datalist id=response-dta>
     <option value="Marketmoni loan is being processed."></option>
		 <option value="Customer was given the URL to download the form and thereafter submit via the URL"></option>
		 <option value="Kindly register new members on New Excel sheet."></option>
		 <option value="Customer was given the correction link to rectify the error."></option>
		 <option value="Explanation was given to customer based on the message received."></option>
		 <option value="Kindly locate a BOI agent for registration"></option>
		 <option value="Kindly ignore the loan offer message."></option>
		 <option value="Customer was given the registration URL. (apply.marketmoni.com.ng)"></option>
		 <option value="Marketmoni registration form is being processed."></option>
		 <option value="Asssociation only provide the platform to their members."></option>
		 <option value="Marketmoni loan is being processed."></option>
		 <option value="Loan will be disbursed into members account."></option>
		 <option value="The loan tenure is 6 months, 2 free weeks of no repayment and 24 weeks of re-payment."></option>
		 <option value="Applicants BVN is one of the major information to be provided in order to process the loan."></option>
		 <option value="The maximum number of person's that can apply is 200 per Excel sheet and minimum of 5 person's."></option>
		 <option value="The maximum amount is N50,000 and the minimum amount is N10,000."></option>
		 <option value="Only members with correct information will receive a feedback message."></option>
		 <option value="Kindly retrieve the phone number."></option>
		 <option value="Kindly register only the interested member."></option>
		 <option value="No interest but there is an administrative fee of 5%."></option>
		 <option value="The first application maximum amount is N50,000 but subsequent applications can be increased to N100,000"></option>
		 <option value="Customer was given the USSD to access the loan offer message."></option>
		 <option value="Kindly respond through the phone number registered with, and also ensure there is airtime on the line."></option>
		 <option value="Kindly ignore subsequent messages."></option>
		 <option value="Kindly follow the link sent to update your BVN record."></option>
		 <option value="Customer was given the BVN correction link. Http://goo.gl/7jn5iC."></option>
		 <option value="Marketmoni loan can only be accessed through the listed banks on the Excel sheet."></option>
		 <option value="Customer was asked to provide the phone that was used to process the loan."></option>
		 <option value="Kindly re-apply for marketmoni loan."></option>
		 <option value="Ensure all the necessary fields are correctly filled and try to re-upload the forms."></option>
     <option value="apply.marketmoni.com.ng"></option>
		 <option value="Call dropped before a response could be given to customer"></option>
		</datalist>

    <datalist id='response-agg'>
<option value="Customer was given the URL to download the registration form to apply and submit."></option>
<option value="Kindly add members to existing form and submit."></option>
<option value="Customer was given the link to make correction(s)."></option>
<option value="Kindly ignore loan offer SMS."></option>
<option value="Marketmoni loan is being processed."></option>
<option value="Customer was briefed on the text message"></option>
<option value="Kindly make payment to Agent."></option>
<option value="Marketmoni registration form is being processed."></option>
<option value="Association gives platform for members to register for the Marketmoni loan."></option>
<option value="24 weeks/6months."></option>
<option value="Minimum of 5 members and maximum of 200 members."></option>
<option value="Minimum amount is 10,000, Maximum amount is 50,000. Subsequently, a higher amount of 100,000naira and 250,000naira can be applied for."></option>
<option value="Kindly retrieve phone number used in applying for Marketmoni loan."></option>
<option value="Notification will be sent across to members."></option>
<option value="All payment will be made into individual accounts"></option>
<option value="No interest rate on marketmoni loan, But a 5% administrative fee is compulsory."></option>
<option value="For verification of customer's information."></option>
<option value="After a first time application, customer can apply for a higher amount of 100,000naira and 250,000 naira."></option>
<option value="Customer was given the code to fetch the loan offer SMS."></option>
<option value="Keep trying the USSD code."></option>
<option value="Kindly ignore the text message."></option>
<option value="Customer was guided on how to make correction on the BVN"></option>
<option value="Kindly re-apply if interested"></option>
<option value="Ignore subsequent message(s)"></option>
<option value="Marketmoni loan can only be accessed through the listed banks."></option>
<option value="Kindly provide phone number used during registration."></option>
<option value="Call dropped before a response could be given to customer"></option>
</datalist>


    <?= $form->field($model, 'cc_agent_action')->textarea(['rows' => 2]) ?>

    <?php $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->id,
                                                            'readonly'=>true])->label(false) ?>
    <?= $form->field($model, 'entry_source_id')->dropdownList(ArrayHelper::map(EntrySource::find()
    ->all(), 'id', 'source_name'),
    ['prompt' => 'Select Source...']) ?>
    <div class="es" style="display:none;">
        <?= $form->field($model, 'call_source_id')->dropdownList(ArrayHelper::map(CallSource::find()
          ->where([ 'id'=>[1,2]])
        ->all(), 'id', 'name'),
        ['prompt' => 'Select Call Source...']) ?>
    </div>
    <?= $form->field($model, 'agent_phone_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'agent_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'ticket_status')->dropdownList(['resolved'=>'Resolved',
                                                                  'open'=>'Open',
                                                                    ],['prompt'=>'Select Ticket Status...']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn-save']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$script = <<< JS
// //////////////////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////
$("#button2").click(function() {

  $('#call_logs2').load("index.php?r=casetwo/dta-records&q=" + $('#casetwo-phone_no2').val().trim())
  if ($('#casetwo-phone_no2').val().trim().length==11){
       $("#call_logs2").stop().slideToggle('600');
  }
});
$("#button3").click(function() {

  $('#call_logs3').load("index.php?r=casetwo/dta-records&q=" + $('#casetwo-phone_no3').val().trim())
  if ($('#casetwo-phone_no3').val().trim().length==11){
       $("#call_logs3").stop().slideToggle('600');
  }
});

$('#casetwo-entry_source_id').change(function () {
  if ($('#casetwo-entry_source_id').val() == '1') {
  $('.es').show();
} else {
  $('.es').hide();
}
});

//show category only if theres a valid product
$('#casetwo-product_id').change(function () {
  if ($(this).val() == '1' ||$(this).val() == '2') {
    $.get( "index.php?r=site/stats&id="  + $(this).val() + "&cat=" + $('#casetwo-category_id').val(),
                      function( data ) {
                      $("select#casetwo-comment_id").html(data);
                });
//show category
  $('.cat').show();
} else {
  $('.cat').hide();//hide category
}
});
if ($('#casetwo-product_id').val() == '1' || $('#casetwo-product_id').val() == '2'){
  $('.cat').show();
}
////////change comment and response based on product
$('#casetwo-category_id').change(function () {
  $.get( "index.php?r=site/stats&cat="  + $(this).val() + "&id=" + $('#casetwo-product_id').val(),
                    function( data ) {
                    $("select#casetwo-comment_id").html(data);
              });
    if ($(this).val() == '2') {
   $('input#casetwo-cc_agent_response').attr('list', 'response-dta');
 } else if ($(this).val() == '3') {
   $('input#casetwo-cc_agent_response').attr('list', 'response-agg') ;
 } else if ($(this).val() == '7'){ $('input#casetwo-cc_agent_response').attr('list', 'response-kw'); }
});

/////////////////
function hold_on (){
  setTimeout(function(){  $('form').find(':submit').prop('disabled', false); }, 3500);
}
//prevent multiple clicks of submit button
$('form').submit(function(){
  // console.log('Submitted once only');
  $(this).find(':submit').attr('disabled','disabled');
  hold_on();
});

JS;
$this->registerJs($script);
 ?>
