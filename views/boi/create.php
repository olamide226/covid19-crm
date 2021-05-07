<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Boi */

$this->title = 'Create Boi';
$this->params['breadcrumbs'][] = ['label' => 'Bois', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="boi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
