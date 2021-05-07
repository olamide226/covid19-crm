<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Comment;
use app\models\Product;
use app\models\State;
use app\models\Lga;
use app\models\Category;
use app\models\EntrySource;
use app\models\CallSource;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Enquiry */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enquiry-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'product_id')->dropdownList(
      ArrayHelper::map(Product::find()->all(), 'id', 'product_name'),['value' => 1]) ?>
      <?= $form->field($model, 'category_id')->hiddenInput(['value' => 1])->label(false) ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'phone_no')->textInput(['maxlength'=>true]) ?>
    <div id="validate-phone" style="color:red;"></div>

    <button class="btty" style="margin-bottom:10px;" type="button" id='button1'  >Show/Hide Call logs</button>
    
    <div style="display:none" class="form-group call_logs" id="call_logs"></div>

    <div class="row">
      <div class="col-md-6">
        <?= $form->field($model, 'state_id')->dropdownList(
        ArrayHelper::map(State::find()->all(), 'id', 'state_name'),['prompt' => 'Select state...']) ?>
      </div>
      <div class="col-md-6">
        <?= $form->field($model, 'lga_id')->dropdownList(
          ['prompt' => 'Select lga...']) ?>
      </div>

      <?= $form->field($model, 'comment_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Comment::find()
    ->where(['category_id'=>1, 'status'=>1])
    ->all(), 'id', 'comments'),
    'language' => 'en',
    'options' => ['placeholder' => 'Select Comment...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
  ]); ?>
  
    </div>

    <div class="row">
      <div class="col-md-6">
        <?= $form->field($model, 'association')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-6">
        <?= $form->field($model, 'sub_category')->dropdownList(
          ['1'=>'Farmers',
            '2'=>'Caterers',
            '3'=>'School',
            '4'=>'Others'
          ],['prompt' => 'Select category...']) ?>
      </div>
    </div>


   <?php //echo $form->field($model, 'comment_id')->dropdownList(
     //ArrayHelper::map(Comment::find()->where(['category_id'=>4, 'status'=>1])->all(),'id','comments'),['prompt' => 'Select Comment...']) ?>

    <?= $form->field($model, 'comment_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Comment::find()
    ->where(['category_id'=>1, 'status'=>1])
    ->all(), 'id', 'comments'),
    'language' => 'en',
    'options' => ['placeholder' => 'Select Comment...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
  ]); ?>



    <?= $form->field($model, 'other_comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cc_agent_response')->hiddenInput()->label(false) ?>
    <datalist  id='response-mm'>
   <option value="Association only provide platform for their members to register."></option>
   <option value="Customer was given the Criteria on how to apply for Marketmoni loan."></option>
   <option value="All payment will be made into individual account."></option>
   <option value="Customer must be a member of an Association."></option>
   <option value="Customer must belong to only one Association to avoid disqualification."></option>
   <option value="Minimum of 5 members and maximum of 200 members."></option>
   <option value="Minimum amount is 10,000 naira, Maximum amount is 50,000 naira. Subsequently a member can apply for a higher amount of 100,000 and 250,000 naira."></option>
   <option value="A genuine BOI agent has means of identification."></option>
   <option value="Kindly visit www.marketmoni.com.ng/agent-network, look for your proposed state of operation and call the phone number (s) for guide."></option>
   <option value="Monthly payments should be made at the beginning of every month."></option>
   <option value="Customer was given the nearest BOI office, customer care line and email address."></option>
   <option value="Call dropped before customer could be given a response."></option>
   </datalist>

    <datalist  id='response-tm'>
      <option value ="Kindly be patient as Tradermoni loan is being processed"></option>
      <option value ="Kindly be patient as you await subsequent SMS"></option>
      <option value ="Customer was guided on the process to follow"></option>
      <option value ="Customer was given Tradermoni application criteria"></option>
      <option value ="Kindly hold on for 24 hours. Please ensure the amount transferred is not less than #1,000 and not greater than #10,000"></option>
      <option value ="Kindly reapply for Tradermoni loan"></option>
      <option value ="Customer was guided on how to retrieve pin"></option>
      <option value ="Tradermoni loan is being processed"></option>
      <option value ="There is no platform to be registerd as an agent at the moment"></option>
      <option value ="Customer was guided on how to reset pin"></option>
      <option value ="Call dropped before a response could be given to customer"></option>
      <option value ="Kindly locate any Tradermoni agent and register"></option>
      <option value ="All genuine Tradermoni agents are found wearing branded Tradermoni t-shirts and facecaps"></option>
      <option value ="Kindly recheck message received"></option>
      <option value ="There is no online platform for Tradermoni registration. Kindly, contact Tradermoni agents to apply for the loan."></option>
      <option value ="Customer was guided on how to access the code"></option>
      <option value ="Kindly locate a ready cash agent in your locality or await a loan reversal within 24 hours."></option>
      <option value ="Kindly use the EYOWO App or Link"></option>
      <option value ="Kindly recheck message received and call back"></option>
      <option value ="There is no platform for change of phone number used in registration."></option>
      <option value ="Kindly ignore subsequent messages"></option>
      <option value ="Tradermoni registration does not warrant a fee"></option>
      <option value ="Kindly respond with the phone number used it in registering"></option>
      <option value ="Kindly dial *4255# or follow the link"></option>
      <option value ="Application is done through Tradermoni agents"></option>
      <option value ="Tradermoni is a loan"></option>
      <option value ="Kindly retrieve the registered phone number"></option>
      <option value ="There is no interest on Tradermoni loan but there is an administrative fee which is 2.5% of the loan received"></option>
      <option value ="Loan repayment is for 24 weeks"></option>
      <option value ="Customer was given Eyowo helpline"></option>
      <option value ="Kindly choose the correct language option on the IVR"></option>

   </datalist>
   <datalist id='response-kw'>
    <option value="Kwikcash is currently not under GEEP"></option>
    <option value="Kwikcash has 10% interest rate."></option>
    <option value="Customer was guided on registration process by using the USSD *540*251#"></option>
    <option value="Ensure there is airtime on your line while dialing the USSD."></option>
    <option value="Customer bank must be among the beneficiary banks also there must be airtime available on the line."></option>
    <option value="2 weeks loan period with an opportunity for extension if requested before the due date."></option>
    <option value="Kindly use other mode of payment. (ATM, Quickteller.com/Kwikcash, Using Paydirect at the bank)."></option>
    <option value="Kindly ignore the text message."></option>
    <option value="Customer was given the payment method which is ATM, Quickteller.com/KwikCash and Using paydirect at the Bank."></option>
    <option value="Kwikcash loan is an instant loan that can be access by dial the USSD on the mobile phone."></option>
    <option value="5%"></option>
    <option value="Loan will be disbursed into the account number provided during registration."></option>
    <option value="Kindly be patient while we reconcile your account."></option>
    <option value="Kindly be patient while we rectify the issue."></option>
    <option value="Notification will be sent after reconciliation"></option>
    <option value="Kindly be patient while issue is been resolved."></option>
    <option value="Ensure there is airtime on your line while dialing the USSD."></option>
    <option value="Ensure the money was paid into the right platform. Customer detail was collected to rectify the re-payment error."></option>
    <option value="*554*261#"></option>
    <option value="Kindly be patient while we reconcile payment made."></option>
    <option value="The minimum amount is N500 and the maximum amount is N100, 000."></option>
    <option value="Customer was guided through the application process
Kwikcash loan will be disbursed as soon the application process is completed."></option>
<option value="Call dropped before a response could be given to the customer."></option>
<option value="Tenure for repayment without penalty is 14 days."></option>
<option value="Loan will be disbursed into the account number provided during registration."></option>
<option value="Customer was given the application criteria."></option>
<option value="Minimum is less than a 1000 Naira and the maximum is up-to 100,000 Naira."></option>
   </datalist>


   <?= $form->field($model, 'entry_source_id')->dropdownList(ArrayHelper::map(EntrySource::find()
   ->all(), 'id', 'source_name'),
   ['prompt' => 'Select Source...']) ?>

   <div id="cs" style="display:none;">
       <?= $form->field($model, 'call_source_id')->dropdownList(ArrayHelper::map(CallSource::find()
        ->where([ 'id'=>[1,2]])
       ->all(), 'id', 'name'),
       ['prompt' => 'Select Call Source...']) ?>

   </div>

    <?= $form->field($model, 'cc_agent_action')->textarea(['rows' => 2]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn-save']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">

</script>

<?php
$script = <<< JS

//phone no. validation
  $('body').on('keyup', '#enquiry-phone_no', function () {

    let phone = $('#enquiry-phone_no').val(),
      phoneNo = /^[(]{0,1}[0-9]{11}[)]{0,1}$/,
      phoneValid = phoneNo.test(phone);

    if(phoneValid === false)
    {
      $('#validate-phone').html("Please enter a valid number");
        return false;
    }else{
      $('#validate-phone').html("");
    }
  });

function loadDoc() {

  if ($('#enquiry-phone_no').val().trim().length===11){
$('#call_logs').load("index.php?r=enquiry/call-records&q=" + $('#enquiry-phone_no').val().trim())

     $("#call_logs").stop().slideToggle('600');
	 }
 }
$('#enquiry-phone_no').keyup(loadDoc);
$('#button1').click(loadDoc);

$('#enquiry-entry_source_id').change(function () {
  if ($('#enquiry-entry_source_id').val() == '1') {
  $('#cs').show();
} else {
  $('#cs').hide();
}
});

$('#enquiry-product_id').change(function () {
  //populate comment on product type selected
  $.get( "index.php?r=site/stats&id="  + parseInt($(this).val()) + "&cat=" + $('#enquiry-category_id').val(),
    function( data ) {
      $("select#enquiry-comment_id").html(data);
  });

  //popluate response
  // if ($(this).val() == '1') {
  //  $('input#enquiry-cc_agent_response').attr('list', 'response-mm');
  // } else if ($(this).val() == '2') {
  //   $('input#enquiry-cc_agent_response').attr('list', 'response-tm');
  // } else { 
  //   $('input#enquiry-cc_agent_response').attr('list', 'response-kw'); 
  // }
});

//populate lga with state id
$('#enquiry-state_id').change(function () {
    
  $.get("index.php?r=site/stats&stateId="  + parseInt($(this).val()),
    function( data ) {
      $("select#enquiry-lga_id").html(data);
    });
});


/////////////////disable submit btn immediately after submit and enable later
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
