<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Product;
use app\models\Category;
use app\models\SubCategory;


/* @var $this yii\web\View */
/* @var $model app\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'comments')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropdownList(ArrayHelper::map(Category::find()
          ->all(), 'id', 'category_name'),
          ['prompt' => 'Select Category...']) ?>

    <?= $form->field($model, 'sub_category_id')->dropdownList(ArrayHelper::map(SubCategory::find()
          ->all(), 'id', 'sub_category'),
          ['prompt' => 'Select Sub Category...']) ?>

    <?= $form->field($model, 'product_id')->dropdownList(ArrayHelper::map(Product::find()
          ->all(), 'id', 'product_name'),
          ['prompt' => 'Select Product...']) ?>

    <?= $form->field($model, 'status')->dropdownList([0 => 'Inactive', 1 => 'Active'],['prompt'=>'Select Status..']) ?>
    <?= $form->field($model, 'sla_urgency')->dropdownList([0 => 'Normal', 1 => 'High'],['prompt'=>'Select priority..']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn-save']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
