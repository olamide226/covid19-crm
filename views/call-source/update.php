<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CallSource */

$this->title = 'Update Call Source: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Call Sources', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="call-source-update">

<div class="row">   
        <div class="col-sm-offset-1 col-sm-9">
        <div class="panel panel-success">
            <div class="panel-heading"><h5><?= Html::encode($this->title) ?></h5></div>
            <div class="panel-body">

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>
        </div>
        </div>
    </div>

</div>
