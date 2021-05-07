<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Tmverification;
use yii\helpers\ArrayHelper;
use app\assets\dashboardAsset;

dashboardAsset::register($this);
/* @var $this yii\web\View */
/* @var $calltrack backend\models\Conversations */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="verification-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php include 'conn.php' ?>
    
    	<div class="row" style="margin-top:40px;">
     		<div class="col-sm-12" >
              <label>Reasons</label>
			  <?php $result = $conn->query("select id, reasons from tm_reasons"); ?>
					<select class="form-control" name="tm_reasons" id="tmreasons" onchange="myfun()" />
									<option hidden="">-- select reason --</option>
						<?php while ($row = $result->fetch_assoc()) {
							  unset($id, $reasons);
							  $id = $row['id'];
							  $name = $row['reasons'];
							  echo '<option value="'.$id.'">'.$name.'</option>';
							}
						?>
					</select>
	        </div>
	    </div>
	    <div class="row" style="margin-top:20px;">
		    <div class="col-sm-10">
		        <!-- <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?> -->
		        <?= Html::submitButton('Verify', ['class' => 'btn btn-success btn-sm','name'=>'accept']) ?>
		        <?= Html::submitButton('Reject', ['class' => 'btn btn-danger btn-sm','name'=>'reject', 'id'=>'rejected', 'disabled'=>'disabled']) ?>
		    </div>
		</div>
		 <?php $bid = $model->batch_id; ?>
		<div class="row" style="margin-top:20px;">
			<div class="col-sm-12" >
				
				<div class="table-responsive collapse" id="demo">
				<table class="table table-striped table-bordered">
					<tr>
					    <td>Gender</td>
					    <td><?= $model->gender ?></td>
					    <td>
					    	
							    <div>
								  <input type="checkbox" id="gen" name="valid[]" value="GEN">
								  <label for="huey">Yes</label>
								  <input type="checkbox" id="genn" name="valid[]" value="">
								  <label for="dewey">No</label>
								</div>
							
					    </td>
					  </tr>
					<tr>
					    <td>Agent Name</td>
					    <td><?= $model->agent_firstname.' '.$model->agent_lastname.' '.$model->agent_middlename ?></td>
					    <td>
					    	
							    <div>
								  <input type="checkbox" id="agn" name="valid[]" value="AGN">
								  <label for="huey">Yes</label>
								  <input type="checkbox" id="agnn" name="valid[]" value="">
								  <label for="dewey">No</label>
								</div>
							
					    </td>
					  </tr>
					<tr>
						<tr>
						    <td>Batch ID</td>
						    <td><?= $bid ?></td>
						    <td>
						    	
								    <div>
									  <input type="checkbox" id="bid" name="valid[]" value="BID">
									  <label for="huey">Yes</label>
									  <input type="checkbox" id="bidd" name="valid[]" value="">
									  <label for="dewey">No</label>
									</div>
								
						    </td>
						  </tr>
						  <tr>
					    <td>Current Bank</td>
					    <td><?= $model->current_bank ?></td>
					    <td>
					    	
							    <div>
								  <input type="checkbox" id="cb" name="valid[]" value="CB">
								  <label for="huey">Yes</label>
								  <input type="checkbox" id="cbk" name="valid[]" value="">
								  <label for="dewey">No</label>
								</div>
							
					    </td>
					  </tr>
					  <tr>
					    <td>Account Number</td>
					    <td><?= $model->account_number ?></td>
					    <td>
					    	
							    <div>
								  <input type="checkbox" id="acn" name="valid[]" value="ACCN">
								  <label for="huey">Yes</label>
								  <input type="checkbox" id="acnn" name="valid[]" value="">
								  <label for="dewey">No</label>
								</div>
							
					    </td>
					  </tr>
					  <tr>
					    <td>Enumerated On</td>
					    <td><?= $model->date_enumerated ?></td>
					    <td>
					    	
							    <div>
								  <input type="checkbox" id="enum_d" name="valid[]" value="ED">
								  <label for="huey">Yes</label>
								  <input type="checkbox" id="enum_dd" name="valid[]" value="">
								  <label for="dewey">No</label>
								</div>
							
					    </td>
					  </tr>
					  <tr >
					    <td>BVN</td>
					    <td><?= $model->bvn ?></td>
					    <td>
					    	
							    <div>
								  <input type="checkbox" id="bvn" name="valid[]" value="BVN">
								  <label for="huey">Yes</label>
								  <input type="checkbox" id="bvnn" name="valid[]" value="">
								  <label for="dewey">No</label>
								</div>
							
						</td>
					  </tr>
					  <tr>
					</table>
				</div>
				<center><button type="button" class="btn btn-success btn-md" data-toggle="collapse" data-target="#demo">show more</button></center>
			</div>
		</div>
    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
	function myfun(){
		document.getElementById("rejected").disabled = false;
	}
</script>
<?php 
	$batch_id = $bid;
	setcookie("batch_id", $batch_id);
?>
<?php
$script = <<< JS

// $(document).ready(function () {

// 	$("select#tmreasons").change(function(){
// 		if($("#rejected").is(":enabled"))
// 		{
// 			$("#rejected").prop("disabled",false);
// 		}else{
// 			$("#rejected").prop("disabled",false);
// 		}

// 	});

// });


JS;
$this->registerJs($script);
?>