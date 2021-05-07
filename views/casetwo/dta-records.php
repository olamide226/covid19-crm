<?php use yii\helpers\Html ;?>
<div class="table">
    <hr><div class="header"><h4>Call Logs For Current Customer</h4></div>

    <table class='table table-striped table-bordered table-hover' cellspacing="0">
    <!-- <table class='table table-striped table-bordered table-hover' cellspacing="0"> -->
    <tr>
    <th>#</th>
    <th>Status</th>
    <th>Ticket Number</th>
    <th>Date Called</th>
    <th>Comment By</th>
    <th width="200">Complaints</th>
    </tr>
    <?php if ($data){
    foreach ($data as $row ) {
    ?>

    <tr>
    <td><?php if ($row['ticket_status'] == 'open' || ($row['ticket_status'] == 'resolved' && time() - $row['edate'] <= 86400 )) {
     echo Html::a(nl2br("Update\nTicket"), ['casetwo/sla-update', 'id' => $row['id']], ['class' => 'btn btn-warning btn-xs','target'=>'_blank' ]) ;
   }else {
     echo Html::a(nl2br("View\nTicket"), ['casetwo/sla-view', 'id' => $row['id']], ['class' => 'btn btn-warning btn-xs','target'=>'_blank' ]) ;
     // echo '#';
   } ?></td>
    <td><?= ucfirst($row['ticket_status']); ?></td>
    <td><?= $row['ticket_number']; ?></td>
    <td><?php $mytime = $row['entry_date']; echo date("M jS, Y", strtotime($mytime)); ?></td>
    <td><?= $row['username'] ?></td>
    <td><?=  $row['comments']; ?></td>
    </tr>
    <?php }} else{ echo "<h3 style='color:red;'>No Previous Record Found!!</h3>"; } ?>
    </table>
