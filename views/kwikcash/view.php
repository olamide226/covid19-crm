<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kwikcash */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kwikcashes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kwikcash-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'customer_name',
            'cust_phone_number',
            'complaints',
            'response:ntext',
            'created_by',
            'date_created',
            'action',
        ],
    ]) ?>

</div>
