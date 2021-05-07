<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tmverification */

$this->title = 'Start Verification';
$this->params['breadcrumbs'][] = ['label' => 'Tmverifications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tmverification-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
