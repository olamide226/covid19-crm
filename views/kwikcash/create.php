<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kwikcash */

$this->title = 'Create Kwikcash';
$this->params['breadcrumbs'][] = ['label' => 'Kwikcashes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kwikcash-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
