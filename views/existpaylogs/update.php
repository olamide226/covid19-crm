<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Conversations */

$this->title = 'Update Ticket Information';
$this->params['breadcrumbs'][] = ['label' => 'Conversations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="conversations-update">
<!-- 
    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?> -->

    <div class="row">
        <div class="col-md-2"></div>
            <div class="col-md-8">
            <div class="panel panel-success">
                <div class="panel-heading"><h3><?= Html::encode($this->title) ?></h3></div>
                <div class="panel-body">

                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
