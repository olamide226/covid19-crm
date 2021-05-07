<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Product;
use app\models\Category;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Sla */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sla-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="row">
  <div class="col-md-6">

    <?= $form->field($model, 'product_id')->dropdownList(
     ArrayHelper::map(Product::find()->all(), 'id', 'product_name'),['disabled' => true]) ?>

    <?= $form->field($model, 'is_fraud')->dropdownList(['0' => 'No', '1' =>  'Yes'],['disabled' => true]) ?>

  </div>
  <div class="col-md-6">
    <?= $form->field($model, 'category_id')->dropdownList(
     ArrayHelper::map(Category::find()->all(), 'id', 'category_name'),['disabled' => true]) ?>


    <?= $form->field($model, 'is_urgent')->dropdownList(['0' => 'Normal', '1' =>  'High'],['disabled' => true]) ?>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <?= $form->field($model, 'level')->dropdownList(['1'=>'Level 1','2'=>'Level 2','3'=>'Level 3','4'=>'Level 4','5'=>'Level 5',],
    ['disabled' => true]) ?>
  </div>

  <div class="col-md-6">
    <?= $form->field($model, 'duration')->textInput(['placeholder'=> 'e.g 24']) ?>
  </div>
</div>

    <?= $form->field($model, 'user_group')->dropdownList(
     ArrayHelper::map(Yii::$app->db->createCommand('SELECT name, description FROM auth_item WHERE auth_item.type=1')->queryAll(),
      'name', 'description'),['prompt' => 'Select User Group...']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
