<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Boi */

$this->title = $model->customer_name;
$this->params['breadcrumbs'][] = ['label' => 'BOI', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">

<div class="col-md-5">
    <?= $this->render('conversations', ['calllogs' => $calllogs, 'model'=> $model]); ?>
</div>


<div class="col-md-7">

<div class="boi-view">

    <div class="panel panel-success">

        <div class="panel-heading"><h5><?= Html::encode("Loan Details for {$this->title}") ?></h5></div>


        <div class="panel-body">

        <p>
            <?= Html::a('Move to Loan Processing Issues', ['/casetwo/create', 'id' => $model->id], ['class' => 'btty','target' => '_blank']) ?>
            <!-- <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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

                'customer_name',
                'phone_number',
                'association',
                'member_id',
                'state',
                'amount',
                'tenure',
                'bvn',
                'mou_status',
                'first_due_date',
                'amount_due',
                'amount_re_paid',
                'amount_in_default',
                'sub_aggregator',
                'aggregator',
                'beneficiary_institution',
                'nuban',
                'date_requested',
                'status',
                'reason_for_rejection',
                'last_change_date',
                'pending_icu_confirmation_date',
                'pending_customer_confirmation_date',
                'pending_f_ire_confirmation_date',
                'pending_approval_date',
                'due_for_disbursement_date',
                'loan_disbursed_successfully_date',
                'offer_declined_date',
                'risk_request_denied_date',
                'request_denied_date',
                'not_qualified_date',

            ],
        ]) ?>
        </div>
        </div>
    </div>

    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?=
        $this->render('call-logs', ['calllogs'=>$calllogs,'model'=>$model]);
        ?>
    </div>
</div>
