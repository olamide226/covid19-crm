<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hgsf */

$this->title = 'Create Hgsf Customer';
$this->params['breadcrumbs'][] = ['label' => 'Hgsfs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hgsf-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>