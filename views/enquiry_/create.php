<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Enquiry */

$this->title = 'Create Enquiry';
$this->params['breadcrumbs'][] = ['label' => 'Enquiries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- <div class="enquiry-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div> -->

<div class="enquiry-create">

<div class="row">
    <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="panel panel-success">
                
                <div class="panel-heading"><h5 id='h3title'><?= Html::encode($this->title) ?></h5></div>
                    
                <div class="panel-body">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
                </div>
                </div>
            </div>
        <div class="col-md-1"></div>
    </div>

</div>
