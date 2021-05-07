<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BoiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="boi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    

    <?= $form->field($model, 'customer_name') ?>

    <?= $form->field($model, 'phone_number') ?>

    <?= $form->field($model, 'association') ?>

    <?= $form->field($model, 'member_id') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'tenure') ?>

    <?php // echo $form->field($model, 'bvn') ?>

    <?php // echo $form->field($model, 'mou_status') ?>

    <?php // echo $form->field($model, 'first_due_date') ?>

    <?php // echo $form->field($model, 'amount_due') ?>

    <?php // echo $form->field($model, 'amount_re_paid') ?>

    <?php // echo $form->field($model, 'amount_in_default') ?>

    <?php // echo $form->field($model, 'sub_aggregator') ?>

    <?php // echo $form->field($model, 'aggregator') ?>

    <?php // echo $form->field($model, 'beneficiary_institution') ?>

    <?php // echo $form->field($model, 'nuban') ?>

    <?php // echo $form->field($model, 'date_requested') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'reason_for_rejection') ?>

    <?php // echo $form->field($model, 'last_change_date') ?>

    <?php // echo $form->field($model, 'pending_icu_confirmation_date') ?>

    <?php // echo $form->field($model, 'pending_customer_confirmation_date') ?>

    <?php // echo $form->field($model, 'pending_f_ire_confirmation_date') ?>

    <?php // echo $form->field($model, 'pending_approval_date') ?>

    <?php // echo $form->field($model, 'due_for_disbursement_date') ?>

    <?php // echo $form->field($model, 'loan_disbursed_successfully_date') ?>

    <?php // echo $form->field($model, 'offer_declined_date') ?>

    <?php // echo $form->field($model, 'risk_request_denied_date') ?>

    <?php // echo $form->field($model, 'request_denied_date') ?>

    <?php // echo $form->field($model, 'not_qualified_date') ?>

    <?php // echo $form->field($model, 'action') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
