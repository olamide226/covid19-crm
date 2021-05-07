<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Conversations */

$this->title = 'Update Ticket #' .$model->ticket_number;
$this->params['breadcrumbs'][] = ['label' => 'Existing Caterer', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="row">
  <div class="col-md-1">

  </div>
  <div class="col-md-10">
    <div class="panel panel-default">
    <div class="panel-heading">  <h3><?= Html::encode($this->title) ?></h3></div>
    <div class="panel-body">
      <div class="conversations-update">



          <?= $this->render('_form', [
              'model' => $model,
          ]) ?>

      </div>

    </div>
    <!-- end of panel body -->
    </div>
  </div>
  <div class="col-md-1">

  </div>
</div>

<!-- below are logs of all current ticket -->
<div class="row">
    <div class="col-md-12 col-sm-6">
        <?=
        $this->render('call-logs', ['model'=>$model]);
        ?>
    </div>
</div>
