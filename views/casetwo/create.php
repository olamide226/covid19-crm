<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Casetwo */

$this->title = 'Create New Loan Processing Ticket';
$this->params['breadcrumbs'][] = ['label' => 'Loan Processing Ticket', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="casetwo-create">
    <div class="row">
        <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-success">
                    
                    <div class="panel-heading"><h5 id='h3title'><?= Html::encode($this->title) ?></h5></div>
                        
                    <div class="panel-body">
                        <?= $this->render('_form', [
                            'model' => $model,
                            'get_boi_rec' => $get_boi_rec,
                        ]) ?>

                    </div>
                </div>
            </div>
        <div class="col-md-2"></div>
    </div>
</div>
