<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TmReasons */

$this->title = 'Create Tm Reasons';
$this->params['breadcrumbs'][] = ['label' => 'Tm Reasons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tm-reasons-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
