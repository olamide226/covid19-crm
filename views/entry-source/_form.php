<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EntrySource */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entry-source-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'source_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn-save']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
