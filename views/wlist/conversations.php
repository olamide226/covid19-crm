<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $conv app\models\TmConversations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tm-conversations-form">
<div class="form-group">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($conv, 'name')->hiddenInput(['value' => $model->firstname . " " .$model->lastname])->label(false) ?>

    <?= $form->field($conv, 'phone')->textInput(['value' => trim($model->phone)]) ?>

    <?= $form->field($conv, 'amount_default')->hiddenInput(['value' => $model->amount_default])->label(false) ?>

    <?= $form->field($conv, 'amount_paid')->hiddenInput(['value' => $model->amount_repaid])->label(false) ?>

    <?= $form->field($conv, 'amount_due')->hiddenInput(['value' => $model->amount_due])->label(false) ?>

    <?= $form->field($conv, 'address')->hiddenInput(['value' => $model->home_address])->label(false) ?>

    <?= $form->field($conv, 'cluster_location')->hiddenInput(['value' => $model->cluster_location])->label(false) ?>
    
    <?= $form->field($conv, 'tradetype')->hiddenInput(['value' => $model->tradetype])->label(false) ?>

    <?= $form->field($conv, 'gender')->hiddenInput(['value' => $model->gender])->label(false) ?>

    <?= $form->field($conv, 'state')->hiddenInput(['value' => $model->state])->label(false) ?>

    <?= $form->field($conv, 'region')->hiddenInput(['value' => $model->region])->label(false) ?>

  <?= $form->field($conv, 'question_a2')->radioList(['Yes' => 'Yes',
      'No'=>'No'],['style'=>'color:#717f86']) ?>
<?= $form->field($conv, 'question_a')->dropDownList([
      'Customer does not have access to full value of loan' => 'Customer does not have access to full value of loan',
      'Financial challenges'=>'Financial challenges',
      'Unable to access channel of repayment'=>'Unable to access channel of repayment',
      'Customer does not know it\'s a loan'=>'Customer does not know it\'s a loan',
      'Customer not willing to pay back at all'=>'Customer not willing to pay back at all',
      'Unable to access loan'=>'Unable to access loan',
      'Customer yet to cash out'=>'Customer yet to cash out',
      'Loan disbursed to someone else'=>'Loan disbursed to someone else',
      'Customer just receive the loan'=>'Customer just receive the loan',
      'Customer not aware of repayment period'=>'Customer not aware of repayment period',
      'Beneficiary is dead'=>'Beneficiary is dead',
                                                        ],['prompt'=>'Select Answer..']) ?>
    <?= $form->field($conv, 'question_b')->radioList(['In 1 Day' => 'In 1 Day',
      'In 2 Days'=>Html::encode("In 2 Days",true) , 'In 3 Days'=>'In 3 Days', '4 Days and above'=>'4 Days and above'],['style'=>'color:717f86;']) ?>

    <?= $form->field($conv, 'question_c')->radioList(['TraderMoni Scratch Card' => 'TraderMoni Scratch Card',
      'Interswitch Pay-direct'=>Html::decode("Interswitch Pay-direct",true) , 'Anyone'=>'Anyone'],['style'=>'color:#717f86']) ?>
    <?= $form->field($conv, 'question_d')->textInput(['maxlength' => true]) ?>
    <?= $form->field($conv, 'question_e')->textInput(['maxlength' => true]) ?>

       <?= $form->field($conv, 'other_comment')->textInput(['maxlength' => true,'list'=>'resp']) ?>
    <datalist id="resp">
  <option value="customer phone number is switched off ">
  <option value="Customer claims to have no access to the loan.">
  <option value="Customer phone is unreacheable">
  <option value="Customer not picking up calls.">
  <option value="Customer not cooperating">
  <!-- <option value="Safari"> -->
</datalist>



<!--
  <label for="">When will you pay back:</label><br>
  <label class="radio-inline"><input type="radio" name="optradio" checked>In 1 Day</label>
<label class="radio-inline"><input type="radio" name="optradio">In 2 Days</label>
<label class="radio-inline"><input type="radio" name="optradio">In 3 Days</label>
<label class="radio-inline"><input type="radio" name="optradio"> 4 Days and above</label><br>

<br>
<label for="sel2">What mode of repayment do you prefer:</label><br>
<label class="radio-inline"><input type="radio" name="optradio1" checked>TraderMoni Scratch Card</label>
<label class="radio-inline"><input type="radio" name="optradio1">Interswitch Pay-direct</label>
<label class="radio-inline"><input type="radio" name="optradio1">Anyone</label><br>
<br>
<div class="form-group">
  <label for="usr">What Amount do you plan to repay?:</label>
  <input type="text" onkeyup="javascript:this.value=addCommas(this.value)" class="form-control" id="usr">
</div>
<div class="form-group">
  <label for="pwd">When do you plan to complete payment(days):</label>
  <input type="number" class="form-control" id="pwd">
</div>

</div>

<div class="form-group">
  <label for="usr1">Other Comments:</label>
  <textarea type="text" class="form-control" id="usr1"></textarea>
</div> -->
  <?= $form->field($conv, 'call_status')->dropdownList([1 => 'Complete',0 => 'Incomplete',],['prompt'=> 'Call Status...']) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn-save']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
function addCommas(Num) {
  Num += '';
        Num = Num.replace(',', ''); Num = Num.replace(',', ''); Num = Num.replace(',', '');
        Num = Num.replace(',', ''); Num = Num.replace(',', ''); Num = Num.replace(',', '');
        x = Num.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1))
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        return x1 + x2;
  }

</script>
