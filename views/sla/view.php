<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sla */

$this->title = "SLA Rule defined for  ID: " .$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Slas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sla-view">

  <div class="row">
    <div class="col-sm-offset-1 col-sm-9">
      <div class="panel panel-success">
        <div class="panel-heading"><h5><?= Html::encode($this->title) ?></h5></div>
        <div class="panel-body">

          <p><?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn-save']) ?></p>

          <?= DetailView::widget([
              'model' => $model,
              'attributes' => [
                  'id',
                  'product.product_name',
                  'category.category_name',
                  // 'is_fraud',
                  [
                    'label' => 'Fraud??',
                    'value' => function ($model)
                    {
                      if ($model->is_fraud == 1) {
                        return 'Yes';
                      }else {
                        return 'No';
                      }
                    }
                  ],
                  // 'is_urgent',
                  [
                    'label' => 'Priority',
                    'value' => function ($model)
                    {
                      if ($model->is_urgent == 1) {
                        return 'High';
                      }else {
                        return 'Normal';
                      }
                    }
                  ],
                  'duration',
                  'user_group',
                  'level',
              ],
          ]) ?>
        </div>
      </div>
    </div>
  </div>

</div>
