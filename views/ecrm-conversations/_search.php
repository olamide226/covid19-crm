<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EcrmConversationsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ecrm-conversations-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ticket_number') ?>

    <?= $form->field($model, 'ticket_status') ?>

    <?= $form->field($model, 'customer_name') ?>

    <?= $form->field($model, 'phone_no') ?>

    <?php // echo $form->field($model, 'member_id') ?>

    <?php // echo $form->field($model, 'entry_category') ?>

    <?php // echo $form->field($model, 'association') ?>

    <?php // echo $form->field($model, 'amount_paid') ?>

    <?php // echo $form->field($model, 'date_paid') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'other_comment') ?>

    <?php // echo $form->field($model, 'cc_agent_response') ?>

    <?php // echo $form->field($model, 'fraud_status') ?>

    <?php // echo $form->field($model, 'cc_agent_action') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'entry_source') ?>

    <?php // echo $form->field($model, 'ecrm_category_id') ?>

    <?php // echo $form->field($model, 'agent_phone_no') ?>

    <?php // echo $form->field($model, 'agent_name') ?>

    <?php // echo $form->field($model, 'payment_medium') ?>

    <?php // echo $form->field($model, 'entry_date') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
