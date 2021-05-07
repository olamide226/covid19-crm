<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tmverification */

$this->title = $model->candidateid;
$this->params['breadcrumbs'][] = ['label' => 'verifications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tmverification-view">

    <h3><?= $model->firstname.' '.$model->lastname; ?></h3>

    <p>
        <!-- <?= Html::a('Update', ['update', 'id' => $model->candidateid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->candidateid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'trademoni_id',
            'dob',
            'state',
            'lga',
            'current_bank',
            'account_number',
            'phone',
            'home_address',
            'date_enumerated',
            'tradetype',
            'trade_subtype_name',
            'cluster_location',

            // 'candidateid',
            // 'firstname',
            // 'lastname',
            // 'middlename',
            // 'gender',
            // 'bvn',
            // 'batch_id',
            // 'agent_firstname',
            // 'agent_lastname',
            // 'agent_middlename',
            // 'status',
            // 'reason',
            // 'valid_rating',
            //'user_id',
            //'created_on',
        ],
    ]) ?>

</div>
