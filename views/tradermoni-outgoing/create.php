<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TradermoniOutgoing */

$this->title = 'Create Tradermoni Outgoing';
$this->params['breadcrumbs'][] = ['label' => 'Tradermoni Outgoings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tradermoni-outgoing-create">

    <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-success">
                
                <div class="panel-heading"><h5 id='h3title'><?= Html::encode($this->title) ?></h5></div>
                    
                <div class="panel-body">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
                </div>
                </div>
            </div>
        <div class="col-md-2"></div>
    </div>

</div>
