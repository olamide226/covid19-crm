<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SubCategory */

$this->title = $model->sub_category;
$this->params['breadcrumbs'][] = ['label' => 'Sub Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sub-category-view">

    <div class="row">   
        <div class="col-sm-offset-1 col-sm-9">
        <div class="panel panel-success">
            <div class="panel-heading"><h5><?= Html::encode($this->title) ?></h5></div>
            <div class="panel-body">

                <p>
                    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn-save']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                        'class' => 'btn btty-del',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
                
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        // 'id',
                        'sub_category',
                    ],
                ]) ?>
            </div>
        </div>
        </div>
    </div>

    

</div>
