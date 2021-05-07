<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TmverificationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tmverification-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'candidateid') ?>

    <?= $form->field($model, 'firstname') ?>

    <?= $form->field($model, 'lastname') ?>

    <?= //$form->field($model, 'middlename') ?>

    <?= $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'dob') ?>

    <?php  echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'bvn') ?>

    <?php // echo $form->field($model, 'tradetype') ?>

    <?php // echo $form->field($model, 'trade_subtype_name') ?>

    <?php // echo $form->field($model, 'home_address') ?>

    <?php // echo $form->field($model, 'date_enumerated') ?>

    <?php // echo $form->field($model, 'current_bank') ?>

    <?php // echo $form->field($model, 'account_number') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'lga') ?>

    <?php // echo $form->field($model, 'cluster_location') ?>

    <?php // echo $form->field($model, 'trademoni_id') ?>

    <?php  echo $form->field($model, 'batch_id') ?>

    <?php // echo $form->field($model, 'agent_firstname') ?>

    <?php // echo $form->field($model, 'agent_lastname') ?>

    <?php // echo $form->field($model, 'agent_middlename') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'reason') ?>

    <?php // echo $form->field($model, 'valid_rating') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'created_on') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
