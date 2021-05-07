<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EcrmConversations */

$this->title = 'Create Ecrm Conversations';
$this->params['breadcrumbs'][] = ['label' => 'Ecrm Conversations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ecrm-conversations-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
