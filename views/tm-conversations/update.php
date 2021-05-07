<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TmConversations */

$this->title = 'Update Tm Conversations: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tm Conversations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tm-conversations-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
