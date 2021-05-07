<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EntrySource */

$this->title = 'Update Entry Source: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Entry Sources', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="entry-source-update">

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
