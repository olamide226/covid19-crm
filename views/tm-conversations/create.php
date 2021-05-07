<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TmConversations */

$this->title = 'Create Tm Conversations';
$this->params['breadcrumbs'][] = ['label' => 'Tm Conversations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tm-conversations-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
