<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EntrySource */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Entry Sources', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entry-source-view">

    <div class="row">   
        <div class="col-sm-offset-1 col-sm-9">
        <div class="panel panel-success">
            <div class="panel-heading"><h5><?= Html::encode($this->title) ?></h5></div>
            <div class="panel-body">

                <p>
                    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn-save']) ?>
                
                </p>

            </div>
        </div>
        </div>
    </div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'source_name',
        ],
    ]) ?>

</div>
