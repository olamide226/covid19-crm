<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\Comment;

/* @var $this yii\web\View */
/* @var $model app\models\TradermoniOutgoing */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tradermoni-outgoing-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Comment::find()
    ->where(['category_id'=>6, 'product_id'=>2, 'status'=>1])
    ->all(), 'id', 'comments'),
    'language' => 'en',
    'options' => ['placeholder' => 'Select Status ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]); ?>

    <?= $form->field($model, 'other_comment')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn-save']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
