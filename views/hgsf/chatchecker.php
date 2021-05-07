<?php
date_default_timezone_set('Africa/Lagos');
$db = Yii::$app->db; 
$current_user = Yii::$app->user->id;
$usersname = Yii::$app->user->identity->first_name;
$date_time = date('Y-m-d h:i:sa');
$nt_response = 2;
$in_response = 1;
$end_chat = 0;

$chat = $db->createCommand("SELECT b.case_id as caseid, b.from_user as phone, a.agent_id as agent, a.customer_name as name, b.chat_message as msg, a.status as stat
                            FROM customer_chat b
                            join customer a on (a.customer_phone = b.from_user) 
                            where  date(b.chat_date) = date(now()) and  a.status in (1, 2) order by b.chat_date desc limit 1")
             ->queryAll();

?>

<!-- <div class="list-group scrollbar scrollbar-primary"  style="height:350px"> -->
<?php foreach ($chat as $chats): ?>
<?php $caseID = $chats['caseid']; 

    if($chats['stat'] == 1 && $chats['agent'] == $current_user)
    {
        $caseId = $db->createCommand("SELECT a.case_id as caseid, a.from_user as phone,a.chat_message as msg, b.customer_name as name FROM customer_chat a 
                                        join customer b on (b.customer_phone = a.from_user)
                                        where a.case_id = '{$caseID}'
                                        order by a.chat_date limit 1")
                    ->queryAll();
?>
    <?php foreach ($caseId as $caseIds): ?>
        <li  class="list-group-item caseid" value="<?= $chats['caseid']; ?>" style="background-color:#4285F4; color:#fff;">
            <p><small><?= '<b>Name:</b> '.$caseIds['name']; ?></small><br>
            <small><?= '<b>Phone: </b> 0'.$caseIds['phone']; ?></small><br>
            <small><?= '<b>Message:</b> '.$caseIds['msg']; ?></small><br>
            <small><em><?= '<b>CaseID:</b>'.' '.$caseIds['caseid']; ?></em></small></p>
        </li>
    <?php endforeach; ?> 
<?php   
    }elseif($chats['stat'] == 2 && $chats['agent'] != $current_user){ ?>
        <li  class="list-group-item caseid" value="<?= $chats['caseid']; ?>" style="background-color:#4285F4; color:#fff;">
    
            <p><small><?= '<b>Name:</b> '.$chats['name']; ?></small><br>
            <small><?= '<b>Phone: </b> 0'.$chats['phone']; ?></small><br>
            <small><?= '<b>Message:</b> '.$chats['msg']; ?></small><br>
            <small><em><?= '<b>CaseID:</b>'.' '.$chats['caseid']; ?></em></small></p>
            <?php
                // if($chats['stat'] == 2)
                // {
                    echo '<p style="color:red;"><small><b>Awaiting Response</b></small></p>';
                // }
            ?>    
        </li>
        
<?php } ?>
<?php endforeach; ?> 


