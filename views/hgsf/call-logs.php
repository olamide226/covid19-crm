<?php
use yii\helpers\Html;
// create database connection
$conn = \Yii::$app->getDb();
$sql = sprintf("SELECT a.id, unix_timestamp(a.updated_date) edate, a.entry_date,a.ticket_number,a.ticket_status, concat(b.first_name, ' ', b.last_name) usernam, c.comments, a.other_comment
	 FROM hgsf_conversations a
	 join user b on (a.user_id = b.id)
	 join hgsf_comment c	on (a.comment_id = c.id)
	 WHERE a.member_id = '%s' AND a.category_id = 4

	 ORDER BY entry_date desc LIMIT 5", $model->member_id ? $model->member_id : $model->phone_number);
//send query to database
$row = $conn->createCommand($sql)->queryAll();
	 // echo json_encode($row);
?>

<div class="table-responsive">

   <div class="panel panel-success">

      <!-- <hr style="color:black"><div><h3></h3></div> -->

         <div class="panel-heading"><b>Call Logs For Current Customer</b></div>

         <div class="panel-body">

            <table class='table table-striped' cellspacing="0">
               <tr>
                  <th width="25">#</th>
                  <th>Ticket No</th>
                  <th>Date Called</th>
                  <th>Status</th>
                  <th>User</th>
                  <th width="250">Comments</th>
               </tr>

         <?php
         //while($row) {
         if ($row) {
            foreach ($row as $row) {
               // code...
         ?>
               <tr>
                  <td><?php if ($row['ticket_status'] == 'open' || ($row['ticket_status'] == 'resolved' && time() - $row['edate'] <= 86400 )) {
                     echo Html::a(nl2br("Update\nTicket"), ['paylogs/sla-update', 'id' => $row['id']], ['class' => 'btn btn-warning btn-xs','target'=>'_blank' ]) ;
                     }else {
                        echo Html::a(nl2br("View\nTicket"), ['paylogs/viewonly', 'id' => $row['id']], ['class' => 'btn btn-warning btn-xs','target'=>'_blank' ]) ;
                        // echo '#';
                     } ?></td>
                  <td><?php echo $row['ticket_number']; ?></td>
               <td><?php $mytime = $row['entry_date']; echo date("M jS, Y", strtotime($mytime)); ?></td>
                  <td><?php echo ucfirst($row['ticket_status']); ?></td>
                  <td><?php echo $row['usernam']; ?></td>
                  <td><?php echo $row['comments']; ?></td>
               </tr>


         <?php }} else{ echo "<h3 style='color:red;'>No Previous Record Found!!</h3>"; } ?>
            </table>

   </div>
</div>
</div>

<?php
$script = <<< JS

//do sth

JS;
$this->registerJs($script);
 ?>
