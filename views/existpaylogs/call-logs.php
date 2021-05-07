<?php
use yii\helpers\Html;
// create database connection
$conn = \Yii::$app->getDb();
$sql = sprintf("SELECT a.amount_paid, a.entry_date, a.ticket_status, concat(b.first_name, ' ', b.last_name) usernam, a.other_comment, a.cc_agent_action
	 FROM hgsf_conversations_history a
	 join user b on (a.user_id = b.id)
	 join hgsf_comment c	on (a.comment_id = c.id)
	 WHERE a.ticket_number = %s AND cbflag = 'Y'

	 ORDER BY entry_date desc LIMIT 5", $model->ticket_number);
//send query to database
$row = $conn->createCommand($sql)->queryAll();
	 // echo json_encode($row);
?>
<div class="panel panel-default">
  <div class="panel-heading"><h3 class='text-center'> <?= 'Logs For Current Ticket #' . $model->ticket_number ?></h3></div>
  <div class="panel-body">
		<div class="table-responsive">


		   <table class='table table-striped' cellspacing="0">
		      <tr>
		         <th>Date Called</th>
		         <th>Status</th>
		         <th>Amount Pending</th>
		         <th>User</th>
		         <th width="250">Other Comments</th>
		         <th width="250">Actions</th>
		      </tr>

		<?php
		//while($row) {
		  if ($row) {
		    foreach ($row as $row) {
		      // code...
		?>
		      <tr>
			   <td><?php $mytime = $row['entry_date']; echo date("M jS, Y", strtotime($mytime)); ?></td>
		         <td><?php echo ucfirst($row['ticket_status']); ?></td>
		         <td><?php echo $row['amount_paid']; ?></td>
		         <td><?php echo $row['usernam']; ?></td>
		         <td><?php echo $row['other_comment']; ?></td>
		         <td><?php echo $row['cc_agent_action']; ?></td>
		      </tr>


		<?php }} else{ echo "<h3 style='color:red;'>No Previous Record Found!!</h3>"; } ?>
		   </table>

		</div>
<!-- end of table -->

  </div>
	<!-- end of panel body -->
</div>
<!-- end of whole panel -->
