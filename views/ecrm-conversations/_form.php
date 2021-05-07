<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EcrmConversations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ecrm-conversations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ticket_number')->textInput() ?>

    <?= $form->field($model, 'ticket_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'entry_category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'association')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount_paid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_paid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other_comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cc_agent_response')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fraud_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cc_agent_action')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'entry_source')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ecrm_category_id')->textInput() ?>

    <?= $form->field($model, 'agent_phone_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'agent_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payment_medium')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_date')->textInput(['value'=>Date('Y-m-d')]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
