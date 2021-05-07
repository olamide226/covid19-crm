<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kwikcash */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kwikcash-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cust_phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'complaints')->dropdownList(["Customer is unable to access the loan."=>"Customer is unable to access the loan.",
					"Customer wants to know the criteria for applying for kwikcash loan."=>"Customer wants to know the criteria for applying for kwikcash loan.",
					"Customer wants to know the loan period."=>"Customer wants to know the loan period.",
					"Customer complained of having difficulty making payment."=>"Customer complained of having difficulty making payment.",
					"Customer received loan extension message before the due date."=>"Customer received loan extension message before the due date.",
					"Customer wants to know the payment procedure."=>"Customer wants to know the payment procedure.",
					"Customer wants to know to about Kwikcash."=>"Customer wants to know to about Kwikcash.",
					"Customer wants to know the interest rate."=>"Customer wants to know the interest rate.",
					"Customer called to confirm disbursement."=>"Customer called to confirm disbursement.",
					"Customer called to confirm payment."=>"Customer called to confirm payment."],['prompt'=>'Select complaint...']) ?>

    <?= $form->field($model, 'response')->textInput(['maxlength' => true,'list'=>'response-kwikcash']) ?>
    <datalist id=response-kwikcash>
     <option value="5%"></option>
     <option value="*554*261#"></option>
     <option value="2 weeks loan period with an opportunity for extension if requested before the due date."></option>
     <option value="Customer bank must be among the beneficiary banks also there must be airtime available on the line."></option>
     <option value="Customer was given the payment method which is ATM, Quickteller.com/KwikCash and Using paydirect at the Bank."></option>
     <option value="Customer was guided on registration process by using the USSD *540*251#"></option>
     <option value="Ensure the money was paid into the right platform. Customer detail was collected to rectify the re-payment error."></option>
     <option value="Ensure there is airtime on your line while dialing the USSD."></option>
     <option value="Ensure there is airtime on your line while dialing the USSD."></option>
     <option value="Kindly be patient while issue is been resolved."></option>
     <option value="Kindly be patient while we reconcile payment made."></option>
     <option value="Kindly be patient while we reconcile your account."></option>
     <option value="Kindly be patient while we rectify the issue."></option>
     <option value="Kindly ignore the text message."></option>
     <option value="Kindly use other mode of payment. (ATM, Quickteller.com/Kwikcash, Using Paydirect at the bank)."></option>
     <option value="Kwikcash loan is an instant loan that can be access by dial the USSD on the mobile phone."></option>
     <option value="Loan will be disbursed into the account number provided during registration."></option>
     <option value="Notification will be sent after reconciliation"></option>
     <option value="The minimum amount is N500 and the maximum amount is N100, 000."></option>
   </datalist>




















    <?= $form->field($model, 'created_by')->textInput(['value' => Yii::$app->user->identity->username,
                                                            'readonly'=>true]) ?>

    <?= $form->field($model, 'action')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
