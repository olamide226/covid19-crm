<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\httpclient\Client;
use yii\web\NotFoundHttpException;
use app\models\Cbr;

/* @var $this yii\web\View */
/* @var $model app\models\Boi */

$this->title = 'Customer Detail';
$this->params['breadcrumbs'][] = ['label' => 'Existing Caterers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
if (isset($_GET['myphone'])) {
  $phone_no = $_GET['myphone'];
} else {
  throw new NotFoundHttpException('The requested page does not exist.');
}
?>
<?php
// Login and consume API
$client = new Client(['baseUrl' => 'http://nsio-audit.test.vggdev.com/api/User/Login']);
$response = $client->createRequest()
    ->setFormat(Client::FORMAT_JSON)
    ->addHeaders(['clientID' => 'cbrweb'])
    ->setMethod('POST')
    // ->setUrl('articles/search')
    ->setData([
        'Username' => 'marky@mailinator.com',
        'Password' => 'P@ssword21',
    ])
    ->send();

    $fetch = new Client(['baseUrl' => 'http://cbr-api.test.vggdev.com/api/BeneficiaryEnrollment/Search']);
    $fetch2 = $fetch->createRequest()
        ->setFormat(Client::FORMAT_JSON)
        ->addHeaders(['Authorization' => 'Bearer ' . (string) $response->getData()['access_token'],
                      'Content-Type' => "application/json"])
        ->setMethod('POST')
        // ->setUrl('articles/search')
        ->setData([
            'MobileNumber' =>  "$phone_no"
        ])
        ->send();


  echo "<br>";
  // echo count($fetch2->data);
if (empty($fetch2->getData())) {
  $cbr = false;
}else {
  $cbr = $fetch2->getData()[0];  
}



 ?>
<div class="row">

<div class="col-md-5">
    <?= $this->render('conversations2', ['calllogs' => $calllogs, 'phone_no'=>$phone_no, 'cbr'=>$cbr]); ?>
</div>


<div class="col-md-7">

<div class="boi-view">

    <div class="panel panel-success">

        <div class="panel-heading"><h5><?= Html::encode("Details for {$this->title}") ?></h5></div>


        <div class="panel-body">

        <p>
            <?php //  Html::a('Move to Loan Processing Issues', ['/casetwo/create', 'id' => $model->id], ['class' => 'btty','target' => '_blank']) ?>

        </p>

        <?php if ($cbr): ?>

        <table id="w1" class="table table-striped table-bordered detail-view">
          <tbody>
            <?php foreach ($cbr as $key => $value): ?>
              <?php if ($key == 'BeneficiaryIdentities' || $key == 'Bvn' || $key == 'BankName' || $key == 'AccountNumber'){ continue; } ?>
              <tr>
                <th><?= $key  ?></th>
                <td><?= $value ?></td>
              </tr>

            <?php endforeach; ?>
              </table>
            <?php else: echo "No Information For Customer"; endif; ?>

        </div>
        </div>
    </div>

    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php
      //  $this->render('call-logs', ['calllogs'=>$calllogs,'model'=>$model]);
        ?>
    </div>
</div>
<div class='row'>
<?php 

if ($cbr) {

  $customer = Cbr::find()
    ->where(['id' => $cbr['Id']])
    ->one();


  if (!$customer) {
    
    $mod = new Cbr();
      foreach ( array_change_key_case($cbr,CASE_LOWER) as $key => $value) {
        if ($key == 'beneficiaryidentities' || $key == 'interventionid' ||
        $key == 'programid' || $key == 'thirdpartyid' || $key == 'cbrid' ||
        $key == 'idnumber' || $key == 'nokfullname' || $key == 'nokrelationship'
        || $key == 'nokaddress' || $key == 'nokphone' || $key == 'isbvnvalid'
        || $key == 'batchid' || $key == 'hasissue'  ){ 
          continue;
        }

        $mod->$key = $value;
      }
      
      $mod->save(false);
      echo "<script>console.log('saved!')</script>";
     } else{

      echo "<script>console.log('exists!')</script>";
     }

    } 
 ?>
</div>