<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\TmVerification;
use yii\bootstrap\ActiveForm;
use app\assets\dashboardAsset;

dashboardAsset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AgentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<div class="result-log" style="">

	<?php $form = ActiveForm::begin(); ?>

	<!-- <div class="container-fluid"> -->
		<div class="row" style="margin-top: 30px;">
			<div class="col-xs-12 col-sm-3">
				<div class="panel-group">
					<div class="panel panel-success">
						<div class="panel-heading">
							<b><?= $model->firstname.' '.$model->lastname.' '.$model->middlename; ?></b>
						</div>
						<div class="panel-body"><center>

		<?php 
			 //$filename = dirname(__FILE__) . '@web/uploads/' . (string) $model->candidateid . ".png";
			 //if (file_exists($filename)){
			 //	echo Html::img('@web/boi/' . (string) $model->candidateid . ".png", ['alt'=>Yii::$app->name,'class'=>'profile-user-img img-responsive ',				 'style'=>'height:200px; width:200px; box-shadow:2px 3px red;']);
			 	
			 //}else{
			 	echo Html::img('http://whitelist.tradermoni.ng/api/images/candidate/picture/'.(string) $model->candidateid . ".png", ['alt'=>$model->firstname.' '.$model->lastname.' '.$model->middlename,'class'=>'profile-user-img img-responsive ','style'=>'height:200px; width:200px;']);
			 //}
		 ?>

	

							 <!-- <span class="glyphicon glyphicon-user" style="font-size: 100px; text-align: middle;" ></span></center> -->
						</div>
					</div>
				</div>

				<div class="row" style="margin-top:20px;">
					<div class="col-sm-12">
				        <?= Html::submitButton('Ongoing Call', ['class' => 'btn btn-primary btn-block','name'=>'inconclusive', 'id'=>'inconclusive']) ?>
				    </div>
				</div>

				<div class="row" style="margin-top:20px;">
					<div class="col-sm-12">
				        <?= Html::submitButton('Voicemail', ['class' => 'btn btn-warning btn-block','name'=>'voicemail', 'id'=>'voicemail']) ?>
				    </div>
				</div>
				<div class="row" style="margin-top:20px;">
					<div class="col-sm-12">
				        <?= Html::submitButton('Flash call', ['class' => 'btn btn-basic btn-block','name'=>'flashcall', 'id'=>'flashcall']) ?>
				    </div>
				</div>
			</div>

		
			<div class="col-xs-12 col-sm-9" >
			  <?php include 'viewform.php' ?>
			</div>
		</div>
	<!-- </div> -->
</div>

	<?php ActiveForm::end(); ?>

</div>
