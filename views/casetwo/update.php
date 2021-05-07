<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Casetwo */

$this->title = "Update Info: #{$model->customer_name}";
$this->params['breadcrumbs'][] = ['label' => 'Loan Processing Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="casetwo-update">

    <div class="row">
        <div class="col-md-2"></div>
            <div class="col-md-8">
            <div class="panel panel-success">
                <div class="panel-heading"><h3><?= Html::encode($this->title) ?></h3></div>
                <div class="panel-body">

                    <?= $this->render('_update', [
                        'model' => $model,
                    ]) ?>

            </div>
            </div>
        </div>
    </div>
</div>
