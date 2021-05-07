<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Whitelist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="whitelist-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'middlename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dob')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bvn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tradetype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trade_subtype_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'home_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_enumerated')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'current_bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'account_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cluster_location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trademoni_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'batch_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'agent_firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'agent_lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'agent_middlename')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
