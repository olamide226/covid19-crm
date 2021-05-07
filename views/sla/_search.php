<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SlaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sla-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'is_fraud') ?>

    <?= $form->field($model, 'is_urgent') ?>

    <?php // echo $form->field($model, 'duration') ?>

    <?php // echo $form->field($model, 'user_group') ?>

    <?php // echo $form->field($model, 'level') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
