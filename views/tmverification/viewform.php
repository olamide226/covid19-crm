<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Tmverification;
use app\models\TmverificationSearch;
use app\models\TmverificationHistory;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;
use app\models\Comment;
use app\assets\dashboardAsset;

dashboardAsset::register($this);
/* @var $this yii\web\View */
/* @var $calltrack backend\models\Conversations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="verification-form">

<?php $form = ActiveForm::begin(); ?>

<?php $id = $model->id; ?>
<div class="row">
	<div class="col-sm-8">
		<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<div class="pull-right">
		  <label for="master">check all</label>
		  <input type="checkbox" id="master" name=valid[] value="">
		</div> 
	<tbody>
		<tr>
	    <td>State</td>
	    <td><?= $model->state ?></td>
	    <td>
			<div>
				<input type="checkbox" id="state" name=valid[] value="ST">
				  <label for="huey">Yes</label>
				</div>
	    </td>
	  </tr>
	    <tr>
	    <td>LGA</td>
	    <td><?= $model->lga ?></td>
	    <td>
			    <div>
				  <input type="checkbox" id="lga" name="valid[]" value="LGA">
				  <label for="huey">Yes</label>
				 
				 
				</div>

	    </td>
	  </tr>
	  <tr>
	    <td>Phone</td>
	    <td><?= $model->correct_phone ?></td>
	    <td>

			    <div>
				  <input type="checkbox" id="phone" name="valid[]" value="PHN">
				  <label for="huey">Yes</label>
				 
				 
				</div>

	    </td>
	  </tr>
	   <tr>
	    <td>Address</td>
	    <td><?= $model->home_address ?></td>
	    <td>

			    <div>
				  <input type="checkbox" id="phone" name="valid[]" value="ADD">
				  <label for="huey">Yes</label>
				 
				 
				</div>

	    </td>
		</tr>
		<tr>
	    <td>Trade Type</td>
	    <td><?= $model->tradetype ?></td>
	    <td>

			    <div>
				  <input type="checkbox" id="trdt" name="valid[]"value="TYP">
				  <label for="huey">Yes</label>
				 
				 
				</div>

	    </td>
	  </tr>
	  <tr>
	    <td>Trade Subtype</td>
	    <td><?= $model->trade_subtype_name ?></td>
	    <td>

			    <div>
				  <input type="checkbox" id="trdst" name="valid[]" value="TSUB">
				  <label for="huey">Yes</label>
				 
				</div>

	    </td>
	  </tr>
	   <tr>
	    <td>Date of Birth</td>
	    <td><?= $model->dob ?></td>
	    <td>

			    <div>
				  <input type="checkbox" id="dob" name="valid[]" value="DOB">
				  <label for="huey">Yes</label>
				 
				</div>

	    </td>
	  </tr>
	  <tr>
	    <td>Tradermoni ID</td>
	    <td><?= $model->trademoni_id ?></td>
	    <td>

			    <div>
				  <input type="checkbox" id="huey" name="valid[]" value="TID">
				  <label for="huey">Yes</label>
				 
				 
				</div>

      	</td>
	  </tr>

	  <tr>
	    <td>Candidate ID</td>
	    <td><?= $model->candidateid ?></td>
	    <td>

			    <div>
				  <input type="checkbox" id="cid" name="valid[]" value="CID">
				  <label for="huey">Yes</label>
				 
				 
				</div>

	    </td>
	  </tr>

	  <tr>
	    <td>Cluster Location</td>
	    <td><?= $model->cluster_location ?></td>
	    <td>

			    <div>
				  <input type="checkbox" id="cltn" name="valid[]" value="CL">
				  <label for="huey">Yes</label>
				 
				 
				</div>

	    </td>
	  </tr>


	  </tbody>
	</table>

	  </div>
	</div>

	<div class="col-sm-4">


    	<div class="row" style="margin-top:0px;">
     		<div class="col-sm-12" >
              <?= $form->field($model, 'reason')->dropDownList(ArrayHelper::map(
								Comment::find()->where(['category_id'=>6, 'product_id'=>2, 'status'=>0])
								->all(),'id','comments'),['prompt' => '-- Select reasons --','name'=>'tm_reasons','id'=>'tm_reasons','class'=>'form-control'])?>

	        </div>
	    </div>
	    <div class="row" style="margin-top:20px;">
		    <!-- <div class="col-sm-12"> -->
		        <!-- <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?> -->
		        <div class="col-sm-6">
		        <?= Html::submitButton('Verify', ['class' => 'btn btn-success btn-block','name'=>'accept', 'id'=>'accept', 'disabled'=>'disabled']) ?>
		    	</div>
		        <div class="col-sm-6">
		        <?= Html::submitButton('Reject', ['class' => 'btn btn-danger btn-block','name'=>'reject', 'id'=>'rejected', 'disabled'=>'disabled']) ?>
		    	</div>
		   <!--  </div> -->
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
								 
								</div>

						</td>
					  </tr>
					  <tr>
					</table>
				</div>
				<input type="button" id= "btn" onclick="bttn()" value="show more" class="btn btn-success btn-block" data-toggle="collapse" data-target="#demo">
			</div>
		</div>
	</div>
</div>

<?php
	$conn = \Yii::$app->getDb();
	$cid = $model->candidateid;
	$sql = ("SELECT a.phone, a.created_on, concat(b.first_name, ' ', b.last_name) usernam, concat(a.firstname, ' ', a.lastname) username, a.status
	 FROM tm_verification_history a
	 join user b on (a.user_id = b.id)
	 where a.candidateid = {$cid}
	 ORDER BY created_on desc LIMIT 5");
	//send query to database
	$row = $conn->createCommand($sql)->queryAll();
?>

<div class="table-responsive">
	<div class="row">
        <div class="col-sm-12">
            <div class="panel panel-success">
                <div class="panel-heading"><h5>Verification Logs For Candidates</h5></div>
                <div class="panel-body">
   <!-- <hr style="color:black"><div><h3>Verification Logs For Candidates</h3></div> -->

					<table class='table table-striped' cellspacing="0">
						<tr>
							<th>Candidate Name</th>
							<!-- <th>Candidate Phone</th> -->
							<th>Verified By</th>
							<th>Status</th>
							<th>Verifed On</th>
						</tr>
						<?php
						//while($row) {
						if ($row) {
							foreach ($row as $row) {

						?>
						<tr>
							<? ?>
							<td><?php echo $row['username']; ?></td>
							<!-- <td><?php echo $row['phone']; ?></td> -->
							<td><?php echo $row['usernam']; ?></td>
							<td><?php  if($row['status'] == 1){
								echo 'Accepted';
							}elseif($row['status'] == 0){
								echo 'Rejected';
							}elseif($row['status'] == 2){ 
								echo 'Ongoing Call';
							}elseif($row['status'] == 3){ 
								echo 'Voicemail';
							}elseif ($row['status'] == 4) {
								echo "Flash Call";
							} ?>
								
							</td>
							<td><?php echo $row['created_on']; ?></td>
						</tr>
						<?php }} else{ echo "<h3 style='color:red;'>No Previous Record Found!!</h3>"; } ?>
					</table>
				</div>
            </div>
        </div>
    </div>
</div>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">;

	function bttn()
	{
	    var elem = document.getElementById("btn");
	    if (elem.value=="show less") elem.value = "show more";
	    else elem.value = "show less";
	}
</script>
<?php
	$id = $id;
	$batch_id = $bid;
	// cookie will expire when the browser close
	setcookie("id", $id);
	setcookie("batch_id", $batch_id);
?>
<?php
$script = <<< JS

$(document).ready(function () {
	// Select all checked
    	$("#master").click(function(){
		$('input:checkbox').not(this).prop('checked', this.checked);
	});

	//enable reject button after select a dropdown
	$("select#tm_reasons").change(function(){
		if($("#rejected").is(":enabled"))
		{
			$("#rejected").prop("disabled",false);
		}else{
			$("#rejected").prop("disabled",false);
		}

	});
	
	//enable accept button after checkbox
	var checkboxes = $("input[type='checkbox']"),
    	submitButt = $("#accept");

	checkboxes.click(function() {
	submitButt.attr("disabled", !checkboxes.is(":checked"));
	});

	//disable every button after submit
	$("#w1").submit(function() {

		$("#accept").attr("disabled", true);
		$("#rejected").attr("disabled", true);
		$("#inconclusive").attr("disabled", true);
		$("#voicemail").attr("disabled",true);
		$("#flashcall").attr("disabled", true);
        });
});


JS;
$this->registerJs($script);
?>

<script>

// var form = document.querySelector("form");
// var arr = [];

// form.addEventListener("change", function(event) {
//   var data = new FormData(form);
//   var output = "";
//   for (const entry of data) {

//     output = entry[0] + "=" + entry[1] + "\r";
//     arr.push(output);
//     console.log(arr);
//   };
//   event.preventDefault();
// }, false);

</script>
