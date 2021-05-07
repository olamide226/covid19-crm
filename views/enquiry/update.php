<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Enquiry */

$this->title = 'Update Enquiry:';
$this->params['breadcrumbs'][] = ['label' => 'Enquiries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="enquiry-update">

    <div class="row">
        <div class="col-md-1"></div>
            <div class="col-md-10">
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
