<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CasetwoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="casetwo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'customer_name') ?>

    <?= $form->field($model, 'phone_no') ?>

    <?= $form->field($model, 'entry_date') ?>

    <?= $form->field($model, 'association') ?>

    <?php // echo $form->field($model, 'complaints') ?>

    <?php // echo $form->field($model, 'other_comments') ?>

    <?php // echo $form->field($model, 'response') ?>

    <?php // echo $form->field($model, 'action') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'source') ?>

    <?php // echo $form->field($model, 'application_source') ?>

    <?php // echo $form->field($model, 'agent_phn_number') ?>

    <?php // echo $form->field($model, 'agent_name') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
