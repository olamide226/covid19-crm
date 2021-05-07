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
<style type="text/css">
  form div.required label.control-label:after {

  content:" * ";

  color:red;

}
</style>
<div class="enquiry-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
      <div class="col-md-6">
        <?= $form->field($model, 'product_id')->dropdownList(
        ArrayHelper::map(Product::find()->all(), 'id', 'product_name'),['value' => 1]) ?>
        <?= $form->field($model, 'category_id')->hiddenInput(['value' => 1])->label(false) ?>
      </div>
      
      <div class="col-md-6">
      <?php Yii::$app->db
        ->createCommand("INSERT INTO generator(create_date,time_created) VALUES(NOW(),CURRENT_TIME)")
        ->execute();
        

        $row = Yii::$app->db
        ->createCommand("SELECT CONCAT('1',MAX(CONCAT(DATE_FORMAT(create_date,'%Y%m%d'),LPAD(sequence,4,'0')))) AS gen from generator")
        ->queryOne(); 
      ?>

        <?= $form->field($model, 'ticket_number')->textInput(['value'=> $model->ticket_number ? $model->ticket_number : $row['gen'], 'readonly'=>true]) ?>
      </div>
    </div>

      <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'phone_no')->textInput(['maxlength'=>true]) ?>
    <div id="validate-phone" style="color:red;"></div>

    <button class="btty" style="margin-bottom:10px;" type="button" id='button1'  >Show/hide Call Logs</button>
    
    <div style="display:none" class="form-group call_logs" id="call_logs"></div>

    <div class="row">
      <div class="col-md-6">
        <?= $form->field($model, 'state_id')->dropdownList(
        ArrayHelper::map(State::find()->all(), 'id', 'state_name'),['prompt' => 'Select State...']) ?>
      </div>
      <div class="col-md-6">
        
        <?= $form->field($model, 'lga_id')->widget(Select2::classname(), [
          'data' => ArrayHelper::map(Lga::find()
          ->where(['state_id'=>0])
          ->all(), 'id', 'lga'),
          'language' => 'en',
          'options' => ['placeholder' => 'Select LGA...'],
          'pluginOptions' => [
              'allowClear' => true
          ],
        ]); ?>
      </div>

    </div>

    <div class="row">
      <div class="col-md-6">
        <?= $form->field($model, 'association')->textInput(['maxlength' => true]) ?>
      </div>
      
      <div class="col-md-6">
        <?= $form->field($model, 'sub_category')->dropdownList(
          ['Farmer'=>'Farmer',
            'Caterer'=>'Caterer',
            'School'=>'School',
            'Others'=>'Others'
          ],['prompt' => 'Select Category...']) ?>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-6">
      <?= $form->field($model, 'comment_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Comment::find()
        ->where(['category_id'=>1, 'status'=>1])
        ->all(), 'id', 'comments'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select Comment...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ]); 
      ?>
      </div>
      <div class="col-md-6">
      <?= $form->field($model, 'details')->textInput(['maxlength' => true]) ?>
      </div>
    </div>

   <?php //echo $form->field($model, 'comment_id')->dropdownList(
     //ArrayHelper::map(Comment::find()->where(['category_id'=>4, 'status'=>1])->all(),'id','comments'),['prompt' => 'Select Comment...']) ?>

    

    <div class="row">
      <div class="col-md-6">
      <?= $form->field($model, 'other_comment')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-6">
      <?= $form->field($model, 'cc_agent_response')->textInput(['maxlength' => true]) ?>
      </div>
    </div>

    
  

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
  setTimeout(function(){
   poplga();
  }, 1000);

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

     $("#call_logs").slideToggle('600');
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



function poplga() {
  let phone = $('#enquiry-phone_no').val().trim();
  
  console.log(phone);
  $.get("index.php?r=site/stats&phone="  + phone,
    function( data ) {
      $("select#enquiry-lga_id").html(data);
    });
}


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
