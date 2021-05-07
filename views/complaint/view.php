<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Enquiry */

$this->title = '#' .$model->ticket_number;
$this->params['breadcrumbs'][] = ['label' => 'Complaints', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="complaint-view">


    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-success">
                <div class="panel-heading"><h3><?= Html::encode($this->title) ?></h3></div>
                <div class="panel-body">>

                    <p><?= Html::a('Create New Complaint', ['create'], ['class' => 'btty']) ?>
                        <?php
                        echo
                        Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn-save']) ?>
                    </p>


                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            // 'id',
                            'ticket_number',
                            'subCategory.sub_category',
                            'customer_name',
                            'phone_no',
                            'entry_date:datetime',
				[
                                'attribute' => 'state.state_name',
                                'label' => 'State',
                            ],
                            [
                                'attribute' => 'lga.lga',
                                'label' => 'LGA',
                            ],
                            'association',
                            'comment.comments',
                            'other_comment',
                            'cc_agent_response',
				'details',
                            // 'user_id',
                            [
                            'attribute' => 'username',
                            'label' => 'Created By',
                            'value' => function($model) {
                                return $model->user->first_name . " " . $model->user->last_name;
                            }
                        ],
                            // 'category_id',
                            'entrySource.source_name',
                            'cc_agent_action:ntext',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

<!--  call history-->
    <div class="row">
        <div class="col-md-12">
            <?php
            //$this->render('call-logs', ['model'=>$model]);
            ?>
        </div>
    </div>
    <!-- end of cal hostory -->
</div>
