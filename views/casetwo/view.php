<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use webvimark\modules\UserManagement\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\Casetwo */

$this->title = $model->customer_name;
$this->params['breadcrumbs'][] = ['label' => 'Loan Processing Ticket', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="casetwo-view">

    <div class="row">
        <div class="col-md-2"></div>
            <div class="col-md-8">
            <div class="panel panel-success">
                <div class="panel-heading"><h3><?= Html::encode($this->title) ?></h3></div>
                <div class="panel-body">

                <p><?= Html::a('Create New Loan Processing Ticket', ['create'], ['class' => 'btty']) ?>
                    <?php echo
                    Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn-save']) ?>
                </p>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        // 'id',

                        'ticket_number',
                        'ticket_status',
                        'customer_name',
                        'phone_no',
                        'entry_date:datetime',
                        'association',
                        'comment.comments',
                        'other_comment',
                        'cc_agent_response',
                        'cc_agent_action:ntext',
                        'category.category_name',
                        // 'user_id',
                        [
                        'attribute' => 'username',
                        'label' => 'Created By',
                        'value' => function($model) {
                            return $model->user->first_name . ' ' . $model->user->last_name;
                        }
                    ],
                        'entrySource.source_name',
                        // 'category_id',
                        'agent_phone_no',
                        'agent_name',
                    ],
                ]) ?>
            </div>
            </div>
        </div>
    </div>

</div>
