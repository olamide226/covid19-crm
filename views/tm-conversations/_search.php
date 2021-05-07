<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TmConversationsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tm-conversations-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'phone') ?>

    <?= $form->field($model, 'amount_default') ?>

    <?= $form->field($model, 'amount_paid') ?>

    <?php // echo $form->field($model, 'amount_due') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'cluster_location') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'region') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
