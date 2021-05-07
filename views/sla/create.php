<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sla */

$this->title = 'New SLA Rule';
$this->params['breadcrumbs'][] = ['label' => 'SLAs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sla-create">

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
