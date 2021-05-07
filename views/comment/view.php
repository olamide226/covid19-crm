<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Comment */

$this->title = "Comment ID #" .$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-view">
  <div class="row">
    <div class="col-sm-offset-1 col-sm-9">
      <div class="panel panel-success">
        <div class="panel-heading"><h5><?= Html::encode($this->title) ?></h5></div>
        <div class="panel-body">

        <p><?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn-save']) ?></p>

          <?= DetailView::widget([
              'model' => $model,
              'attributes' => [
                  // 'id',
                  'comments',
                  'category.category_name',
                  'product.product_name',
                  // 'status',
                  [
                    // 'label' => 'Priority',
                    'attribute'=>'status',  'value' => function ($model)
                    {
                      if ($model->status == 1) {
                        return 'Active';
                      } else {
                        return 'Inactive';
                      }
                    }
                  ],
                  [
                    // 'label' => 'Priority',
                    'attribute'=>'sla_urgency',
                    'value' => function ($model)
                    {
                      if ($model->sla_urgency == 1) {
                        return 'High';
                      } else {
                        return 'Normal';
                      }
                    }
                  ],
              ],
          ]) ?>
        </div>
      </div>
    </div>
  </div>
  
</div>
