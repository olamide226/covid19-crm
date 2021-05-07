<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EcrmConversations */

$this->title = 'Update Ecrm Conversations:';
$this->params['breadcrumbs'][] = ['label' => 'Ecrm Conversations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ecrm-conversations-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
