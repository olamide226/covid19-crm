<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TradermoniOutgoingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tradermoni-outgoing-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
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

    <?php // echo $form->field($model, 'comment_id') ?>

    <?php // echo $form->field($model, 'other_comment') ?>

    <?php // echo $form->field($model, 'cc_agent_response') ?>

    <?php // echo $form->field($model, 'fraud_status') ?>

    <?php // echo $form->field($model, 'cc_agent_action') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'entry_source_id') ?>

    <?php // echo $form->field($model, 'call_source_id') ?>

    <?php // echo $form->field($model, 'call_type_id') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'agent_phone_no') ?>

    <?php // echo $form->field($model, 'agent_name') ?>

    <?php // echo $form->field($model, 'payment_medium') ?>

    <?php // echo $form->field($model, 'product_id') ?>

    <?php // echo $form->field($model, 'entry_date') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'updated_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
