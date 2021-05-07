<?php
date_default_timezone_set('Africa/Lagos');
$db = Yii::$app->db; 
$current_user = Yii::$app->user->id;
$usersname = Yii::$app->user->identity->first_name;
$date_time = date('Y-m-d h:i:sa');
$nt_response = 2;
$in_response = 1;
$end_chat = 0;

$chat = $db->createCommand("SELECT * FROM `customer` where status = 0 and agent_id='{$current_user}'order by chat_date desc limit 5")->queryAll();

?>

<!-- <div class="list-group scrollbar scrollbar-primary"  style="height:350px"> -->
<?php foreach ($chat as $chats): ?>
<li  class="list-group-item caseidhist" value="<?= $chats['case_id']; ?>" style="background-color:#4285F4; color:#fff;">
    <p><small><?= '<b>Name:</b> '.$chats['customer_name']; ?></small><br>
    <small><?= '<b>Phone: </b> 0'.$chats['customer_phone']; ?></small><br>
    <small><em><?= '<b>CaseID:</b>'.' '.$chats['case_id']; ?></em></small></p>
    <!-- <ul>
        <li><small><?= '<b>Name:</b> '.$chats['customer_name']; ?></small></li>
        <li><small><?= '<b>Phone: </b> 0'.$chats['customer_phone']; ?></small></li>
        <li><small><em><?= '<b>CaseID:</b>'.' '.$chats['case_id']; ?></em></small></li>
    </ul> -->
</li>
<?php endforeach; ?> 
<!-- </div> -->