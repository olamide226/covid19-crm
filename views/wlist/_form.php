<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Wlist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wlist-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'enumerator')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'agentname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'batch_id')->textInput() ?>

    <?= $form->field($model, 'rejection_reason')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'middlename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dob')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bvn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tradetype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tradesubtype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'home_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'current_bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'account_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gps')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cluster_location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'picture')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'facial_picture')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'certificate_picture')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'current_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_submission')->textInput() ?>

    <?= $form->field($model, 'disbursement')->textInput() ?>

    <?= $form->field($model, 'date_disbursement')->textInput() ?>

    <?= $form->field($model, 'amount_due')->textInput() ?>

    <?= $form->field($model, 'amount_repaid')->textInput() ?>

    <?= $form->field($model, 'amount_default')->textInput() ?>

    <?= $form->field($model, 'createdon')->textInput() ?>

    <?= $form->field($model, 'is_callable')->textInput() ?>

    <?= $form->field($model, 'date_called')->textInput() ?>

    <?= $form->field($model, 'call_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'call_not_reachable')->textInput() ?>

    <?= $form->field($model, 'is_applied')->textInput() ?>

    <?= $form->field($model, 'date_applied')->textInput() ?>

    <?= $form->field($model, 'is_disbursed')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trademoni_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'smile_reference')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_enumerated')->textInput() ?>

    <?= $form->field($model, 'date_batch_verify')->textInput() ?>

    <?= $form->field($model, 'wallet_map_id')->textInput() ?>

    <?= $form->field($model, 'wallet_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'senatorial_id')->textInput() ?>

    <?= $form->field($model, 'geopolitical_id')->textInput() ?>

    <?= $form->field($model, 'agent_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_cashedout')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_cashout')->textInput() ?>

    <?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
