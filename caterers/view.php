<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Boi */

$this->title = $model->customer_name;
$this->params['breadcrumbs'][] = ['label' => 'Existing Caterers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">

<div class="col-md-5">
    <?= $this->render('conversations', ['calllogs' => $calllogs, 'model'=> $model]); ?>
</div>


<div class="col-md-7">

<div class="boi-view">

    <div class="panel panel-success">

        <div class="panel-heading"><h5><?= Html::encode("Details for {$this->title}") ?></h5></div>


        <div class="panel-body">

        <p>
            <?php //  Html::a('Move to Loan Processing Issues', ['/casetwo/create', 'id' => $model->id], ['class' => 'btty','target' => '_blank']) ?>
            
           
        </p>

        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'customer_name',
            'phone_number',
            'member_id',
            'state',
            'lga',
            'designation',
            'last_pay_date',
            'amount_paid',
            'amount_due',
            'status',
            'account_no',
            'bank',
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
