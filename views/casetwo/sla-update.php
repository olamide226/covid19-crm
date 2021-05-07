<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Casetwo */

$this->title = "Update Info: #{$model->ticket_number}";
$this->params['breadcrumbs'][] = ['label' => 'Loan Processing Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>


<div class="panel panel-default">
  <div class="panel-heading">  <h3><?= Html::encode($this->title) ?></h3></div>
  <div class="panel-body">
    <div class="casetwo-update">



        <?= $this->render('_update', [
            'model' => $model,
        ]) ?>

    </div>

  </div>
  <!-- end of panel body -->
</div>
<!-- below are logs of all current ticket -->
<div class="row">
    <div class="col-md-12 col-sm-6">
        <?=
        $this->render('call-logs', ['model'=>$model]);
        ?>
    </div>
</div>
