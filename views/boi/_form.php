<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Boi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="boi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput() ?>

    <?= $form->field($model, 'association')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tenure')->textInput() ?>

    <?= $form->field($model, 'bvn')->textInput() ?>

    <?= $form->field($model, 'mou_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_due_date')->textInput() ?>

    <?= $form->field($model, 'amount_due')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount_re_paid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount_in_default')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_aggregator')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aggregator')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'beneficiary_institution')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nuban')->textInput() ?>

    <?= $form->field($model, 'date_requested')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reason_for_rejection')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_change_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pending_icu_confirmation_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pending_customer_confirmation_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pending_f_ire_confirmation_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pending_approval_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'due_for_disbursement_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loan_disbursed_successfully_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'offer_declined_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'risk_request_denied_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'request_denied_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'not_qualified_date')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
