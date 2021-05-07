<?php

// create database connection
$conn = \Yii::$app->getDb();
$sql = sprintf("SELECT a.question_a2, a.question_a, a.question_b, a.question_e, a.other_comment, a.call_status, a.entry_date, concat(b.first_name, ' ', b.last_name) usernam
    FROM tm_conversations a
    join user b on (a.user_id = b.id)

    WHERE a.phone = %d

    ORDER BY entry_date desc LIMIT 5", $model->phone ? $model->phone : 0);
//send query to database
$row = $conn->createCommand($sql)->queryAll();

    // echo json_encode($row);
?>
<div class="table-responsive">

    <div class="panel panel-success">
        <div class="panel-heading"><b>Call Logs For <?php echo $model->firstname . " " .$model->lastname; ?></b></div>
        <div class="panel-body">
            <table class='table table-striped' cellspacing="0">
                <tr>
                    <th> Is customer willing to pay?</th>
                    <th>Why haven't you paid back your loan?</th>
                    <th>When will you pay back?</th>
                    <th>When do you plan to complete payment(days)?</th>
                    <th>Other Comment</th>
                    <th>Status</th>
                    <th>Date Called</th>
                    <th width="100">Created By</th>
                </tr>
                <?php
                //while($row) {
                if ($row) {
                    foreach ($row as $row) {
                    // code...
                ?>
                <tr <?php if ($row['call_status']==1){ echo "class='success'";} else{ echo "class='danger'"; } ?>>
                    <td><?php echo $row['question_a2']; ?></td>
                    <td><?php echo $row['question_a']; ?></td>
                    <td><?php echo $row['question_b']; ?></td>
                    <td><?php echo $row['question_e']; ?></td>
                    <td><?php echo $row['other_comment']; ?></td>
                    <td><?php if ($row['call_status']==1){ echo "Completed";} else {
                        echo "Not Complete";
                    }; ?></td>
                    <td><?php $mytime = $row['entry_date']; echo date("M jS, Y", strtotime($mytime)); ?></td>
                    <td><?php echo $row['usernam']; ?></td>
                </tr>
                <?php }} else{ echo "<h3 style='color:red;'>No Previous Record Found!!</h3>"; } ?>
            </table>
        </div>
    </div>
</div>
