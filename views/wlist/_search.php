<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WlistSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wlist-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'enumerator') ?>

    <?= $form->field($model, 'agentname') ?>

    <?= $form->field($model, 'batch_id') ?>

    <?= $form->field($model, 'rejection_reason') ?>

    <?php // echo $form->field($model, 'firstname') ?>

    <?php // echo $form->field($model, 'lastname') ?>

    <?php // echo $form->field($model, 'middlename') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'dob') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'bvn') ?>

    <?php // echo $form->field($model, 'tradetype') ?>

    <?php // echo $form->field($model, 'tradesubtype') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'lga') ?>

    <?php // echo $form->field($model, 'home_address') ?>

    <?php // echo $form->field($model, 'current_bank') ?>

    <?php // echo $form->field($model, 'account_number') ?>

    <?php // echo $form->field($model, 'gps') ?>

    <?php // echo $form->field($model, 'cluster_location') ?>

    <?php // echo $form->field($model, 'picture') ?>

    <?php // echo $form->field($model, 'facial_picture') ?>

    <?php // echo $form->field($model, 'certificate_picture') ?>

    <?php // echo $form->field($model, 'current_status') ?>

    <?php // echo $form->field($model, 'date_submission') ?>

    <?php // echo $form->field($model, 'disbursement') ?>

    <?php // echo $form->field($model, 'date_disbursement') ?>

    <?php // echo $form->field($model, 'amount_due') ?>

    <?php // echo $form->field($model, 'amount_repaid') ?>

    <?php // echo $form->field($model, 'amount_default') ?>

    <?php // echo $form->field($model, 'createdon') ?>

    <?php // echo $form->field($model, 'is_callable') ?>

    <?php // echo $form->field($model, 'date_called') ?>

    <?php // echo $form->field($model, 'call_description') ?>

    <?php // echo $form->field($model, 'call_not_reachable') ?>

    <?php // echo $form->field($model, 'is_applied') ?>

    <?php // echo $form->field($model, 'date_applied') ?>

    <?php // echo $form->field($model, 'is_disbursed') ?>

    <?php // echo $form->field($model, 'trademoni_id') ?>

    <?php // echo $form->field($model, 'smile_reference') ?>

    <?php // echo $form->field($model, 'date_enumerated') ?>

    <?php // echo $form->field($model, 'date_batch_verify') ?>

    <?php // echo $form->field($model, 'wallet_map_id') ?>

    <?php // echo $form->field($model, 'wallet_name') ?>

    <?php // echo $form->field($model, 'senatorial_id') ?>

    <?php // echo $form->field($model, 'geopolitical_id') ?>

    <?php // echo $form->field($model, 'agent_id') ?>

    <?php // echo $form->field($model, 'is_cashedout') ?>

    <?php // echo $form->field($model, 'date_cashout') ?>

    <?php // echo $form->field($model, 'region') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
