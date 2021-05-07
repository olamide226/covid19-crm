<?php
use yii\helpers\Html;
// create database connection
$conn = \Yii::$app->getDb();
$sql = sprintf("SELECT a.entry_date, concat(b.first_name, ' ', b.last_name) usernam, c.comments,a.other_comment, a.cc_agent_response
	 FROM ecrm_conversations a
	 join user b on (a.user_id = b.id)
	 join ecrm_comment c	on (a.comment_id = c.id)
	 WHERE a.phone_no = '%s' AND a.category_id = 2

	 ORDER BY entry_date desc LIMIT 5", $model->phone_no);
//send query to database
$row = $conn->createCommand($sql)->queryAll();
	 // echo json_encode($row);
?>
<style media="screen">
<style>
.collapsible {
background-color: #777;
color: white;
cursor: pointer;
padding: 18px;
width: 100%;
border: none;
text-align: left;
outline: none;
font-size: 15px;
}

.active, .collapsible:hover {
background-color: #555;
}

.c1 {
padding: 0 18px;
display: none;
overflow: hidden;
background-color: #f1f1f1;
}
</style>
</style>
<div class="panel panel-default">
  <div class="panel-heading"><h3 class='text-center'> <?= 'Logs For Current Caller #' . $model->customer_name ?></h3></div>
  <div class="panel-body">
		<div class="table-responsive">


		   <table class='table table-striped' cellspacing="0">
		      <tr>
		         <th>Date Called</th>
		         <th>User</th>
		         <th width="250"> Comments</th>
		         <th width="250">Other Comment</th>
		         <th width="250">Response</th>
		      </tr>

		<?php
		//while($row) {
		  if ($row) {
		    foreach ($row as $row) {
		      // code...
		?>
		      <tr>
			   <td><?php $mytime = $row['entry_date']; echo date("M jS, Y", strtotime($mytime)); ?></td>
		         <td><?php echo $row['usernam']; ?></td>
		         <td><?php echo $row['comments']; ?></td>
		         <td><?php echo $row['other_comment']; ?></td>
		         <td><?php echo $row['cc_agent_response']; ?></td>
		      </tr>


		<?php }} else{ echo "<h3 style='color:red;'>No Previous Record Found!!</h3>"; } ?>
		   </table>

		</div>
<!-- end of table -->

  </div>
	<!-- end of panel body -->
</div>
<!-- end of whole panel -->
