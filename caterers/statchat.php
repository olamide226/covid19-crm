<?php
date_default_timezone_set('Africa/Lagos');
$db = Yii::$app->db; 
$current_user = Yii::$app->user->id;
$usersname = Yii::$app->user->identity->first_name;
$date_time = date('Y-m-d h:i:sa');
$nt_response = 2;
$in_response = 1;
$end_chat = 0;


//fetch message box
if(isset($_GET['caseId'])) :
    
    $caseId = $_GET['caseId'];

    $update_status = $db->createCommand("UPDATE customer_chat a join customer b on (a.from_user=b.customer_phone) 
                                        set a.to_user = '{$current_user}', a.status = '{$in_response}'
                                        where a.case_id = '{$caseId}' and a.status = '{$nt_response}' ")
                        ->execute();

    $update = $db->createCommand("UPDATE customer set status = '{$in_response}', agent_id='{$current_user}'
                                    where case_id = '{$caseId}' and status = '{$nt_response}' ")
                ->execute();
    // $fetch_chat_msg = $db->createCommand("SELECT * FROM customer_chat 
    //                                     WHERE (from_user = '{$caseId}' AND to_user = '{$current_user}') 
    //                                     OR (from_user = '{$current_user}' AND to_user = '{$caseId}')
    //                                     ORDER BY chat_date ")
    //                 ->queryAll();

    // $customer_name = $db->createCommand("SELECT * from customer where customer_phone = '{$caseId}'")
    //                 ->queryAll();

    $fetch_chat_msg = $db->createCommand("SELECT a.customer_name as cname, b.chat_message as msg, b.chat_date as chat_date, 
                            b.from_user as phone, b.case_id as case_id
                            FROM customer_chat b 
                            JOIN customer a on (a.customer_phone = b.from_user)
                            WHERE b.case_id = '{$caseId}' order by chat_date")
                     ->queryAll();

   
?>

    <div class="panel panel-default jerk" style="height:430px">
        <div class="panel-heading">
            <button  class="btn btn-xs btn-primary endChat">End Chat</button>
        </div>
        <?php foreach($fetch_chat_msg as $row) : ?>

            <input type="hidden" value="<?= $row['case_id']?>" class="case_id">
            <input type="hidden" value="<?= $row['phone']?>" class="cphone">

        <?php endforeach; ?>

        <div class=""  style="">
            <div class="list-group scrollbar scrollbar-primary chatty" id="innerlist" style="height:400px; margin-bottom:0; border:1px solid #ccc; background-color:#DCDCDC;"">
                <?php foreach($fetch_chat_msg as $row) : ?>  
                <?php 
                    $user_name = '';
                    $message = '';
                    $timestamp ='';
                    if($row["phone"] == $current_user)
                    {
                        $user_name = '<div class=" pull-right">'.$usersname.'</div>';;
                        $message = '<div class="pull-right" style="background-color:#FFFFF0; padding:5px; border-radius:25px; color:#4285F4">'.$row['msg'].'</div>';
                        $timestamp = '<div class=" pull-right">'.$row['chat_date'].'</div>';
                    }else{
                        
                        $user_name = '<b class="text-danger">'.$row['cname'].'</b>';
                        
                        $message = '<div class="pull-left" style="background-color:#4285F4; padding:5px; border-radius:25px; color:#FFFFF0">'.$row['msg'].'</div>';
                        $timestamp = $row['chat_date'].'<br><div class="is_typing"></div>';
                    }
                ?>
                    <div style="width:100%;">
                        <ul class="list-unstyled">
                            <li style="border-bottom:0px dotted #fff">
                                <p><?=  $user_name.'<br>'.$message .'<br>'; ?></p>
                                <div>
                                    <small><em><?= $timestamp .'<br><br>';?></em></small>
                                </div>
                            </li>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="input-group" style="background-color:#DCDCDC;">
                <textarea class="form-control extmsg col-md-10" id="extmsg" style="height:50px; border-radius:5px;" placeholder="     Type a message ..."></textarea>
                <div class="input-group-btn">
                    <button class="btn btn-success extsnd" type="submit" id="extsnd" style="background-color:#2F4F4F; border-radius:25px;" disabled>
                        <i class="fa fa-paper-plane" aria-hidden="true" style="color:#fff; font-size:25px;"></i>
                    </button>
                </div>
            </div>
        </div>
    </div> 

<script>
var obj = document.getElementById('innerlist');
obj.scrollTop = obj.scrollHeight;
</script>
<?php endif; ?>


<?php
//fetch message box for chatlog
if(isset($_GET['caseidhist'])) :
    
    $caseId = $_GET['caseidhist'];

    //get customers phone
    $getCphone=$db->createCommand("SELECT b.customer_phone as phone from customer_chat a
                                    join customer b on (b.customer_phone = a.from_user) 
                                    where a.case_id ='{$caseId}' limit 1 ")->queryAll();
    $frmUser = '';
    foreach($getCphone as $getCphones)
    {
        $frmUser = $getCphones['phone'];
    }
    $frmUsers = json_encode($frmUser, JSON_NUMERIC_CHECK); /*JSON_BIGINT_AS_STRING)*/
 
    //get chat messages
    $fetch_chat_msg = $db->createCommand("SELECT * FROM customer_chat 
                                        WHERE (case_id = '{$caseId}' AND from_user ='{$frmUsers}' AND to_user = '{$current_user}') 
                                        OR (from_user ='{$current_user}' AND  to_user = '{$frmUsers}')
                                        ORDER BY chat_date ")
                        ->queryAll();
    //get customers name                
    $customer_name = $db->createCommand("SELECT * from customer where case_id = '{$caseId}'")
                     ->queryAll();
?>

    <div class="panel panel-default jerk" style="height:430px">

    <?php foreach($customer_name as $rows) : ?>
        <div class="panel-heading" style="color:#2F4F4F"><?= $rows['customer_name'] ?></div>
    <?php endforeach; ?>
    
        <?php foreach($fetch_chat_msg as $row) : ?>
                
            <input type="hidden" value="<?= $row['case_id']?>" class="case_id">
            <input type="hidden" value="<?= $row['from_user']?>" class="cphone">

        <?php endforeach; ?>

        <div class=""  style="">
            <div class="list-group scrollbar scrollbar-primary " id="innerlist" style="height:450px; border:1px solid #ccc; background-color:#DCDCDC;">
                <?php foreach($fetch_chat_msg as $row) : ?>  
                <?php 
                    $user_name = '';
                    $message = '';
                    $timestamp ='';
                    if($row["from_user"] == $current_user)
                    {
                        $user_name = '<div class=" pull-right">'.$usersname.'</div>';;
                        $message = '<div class="pull-right" style="background-color:#FFFFF0; padding:5px; border-radius:25px; font-size:15px;color:#4285F4; width:150px;">'.$row['chat_message'].'</div>';
                        $timestamp = '<div class=" pull-right">'.$row['chat_date'].'</div>';
                    }else{
                        
                        // $user_name = '<b class="text-danger">'.$row['cname'].'</b>';
                        $user_name ='';
                        $message = '<div class="pull-left" style="background-color:#4285F4; padding:5px; border-radius:25px; font-size:10px;color:#FFFFF0;width:150px;">'.$row['chat_message'].'</div>';
                        $timestamp = $row['chat_date'].'<br><div class="is_typing"></div>';
                    }
                ?>
                    <div style="width:100%;">
                        <ul class="list-unstyled">
                            <li style="border-bottom:0px dotted #fff">
                                <div><?=  $message; ?></div><br><br>
                                <div><small><em><?= $timestamp ;?></em></small></div>
                            </li>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div> 

<script>
var obj = document.getElementById('innerlist');
obj.scrollTop = obj.scrollHeight;
</script>
<?php endif; ?>

<?php 
//send and recieve message
if(isset($_GET['msgto']) || isset($_GET['msgg']) || isset($_GET['caseID'])) :

    $from_user = $current_user;
    $to_user = $_GET['msgto'];
    $msg = $_GET['msgg'];
	$case_id = $_GET['caseID'];
	$status = '1';
    
    $insert = $db->createCommand("INSERT INTO customer_chat (from_user, to_user, chat_message, status, case_id, chat_date) 
                                    VALUES ('{$from_user}','{$to_user}','{$msg}','{$status}','{$case_id}', now())")
                ->execute();
    $fetch_chat_msg = $db->createCommand("SELECT * FROM customer_chat 
                                            WHERE (case_id = '{$case_id}' AND from_user ='{$from_user}' AND to_user = '{$to_user}') 
                                            OR (from_user ='{$to_user}' AND  to_user = '{$from_user}')
                                            ORDER BY chat_date")
                ->queryAll();
    $customer_name = $db->createCommand("SELECT * from customer where case_id = '{$case_id}'")
                ->queryAll();

    $upate_response = $db->createCommand("UPDATE customer_chat set status = '{$status}' where case_id = '{$case_id}'")
                ->execute();
?>
<?php
        foreach($fetch_chat_msg as $row) { 
            
            $user_name = '';
            $message = '';
            $timestamp ='';
            if($row["from_user"] == $current_user)
            {
                $user_name = '<div class=" pull-right">'.$usersname.'</div>';;
                $message = '<div class="pull-right" style="background-color:#FFFFF0; padding:5px; border-radius:25px; color:#4285F4">'.$row['chat_message'].'</div>';
                $timestamp = '<div class=" pull-right">'.$row['chat_date'].'</div>';
            }else{
                foreach($customer_name as $c_name)
                {
                    $user_name = '<b class="text-danger">'.$c_name['customer_name'].'</b>';
                }
                $message = '<div class="pull-left" style="background-color:#4285F4; padding:5px; border-radius:25px; color:#FFFFF0">'.$row['chat_message'].'</div>';
                $timestamp = $row['chat_date'].'<br><div class="is_typing"></div>';
            } ?>
            
            <div style="width:100%;">
                <ul class="list-unstyled">
                    <li style="border-bottom:0px dotted #fff">
                        <p><?=  $user_name.'<br>'.$message .'<br><br>'; ?></p>
                        <div>
                            <small><em><?= $timestamp?></em></small>
                        </div>
                    </li>
                </ul>
            </div>
<?php   } ?>

<script>
var obj = document.getElementById('innerlist');
obj.scrollTop = obj.scrollHeight;
</script>
<?php endif; ?>

<?php
//end chat
if(isset($_GET['endChat']))
{
    $caseId = $_GET['endChat'];
    $update_status = $db->createCommand("UPDATE customer_chat set status = '{$end_chat}'
                                        where case_id = '{$caseId}' and status in ('{$in_response}','{$nt_response}')")
                        ->execute();
    
    $update = $db->createCommand("UPDATE customer set status = '{$end_chat}'
                                    where case_id = '{$caseId}' and status = '{$in_response}' ")
                ->execute();
}

//updating is_typing
if(isset($_GET['isType']))
{
	$is_type = $_GET['isType'];
	// $case_id = $_POST['case_id'];

    $type = $db->createCommand("UPDATE user_visit_log set is_type = '{$is_type}' 
                                where user_id = '{$current_user}' and date(svisit_time) = date(now()) order by date(svisit_time) desc limit 1")
                ->execute();
}
if(isset($_GET['isNotype']))
{
	$is_type = $_GET['isNotype'];
	// $case_id = $_POST['case_id'];

    $type = $db->createCommand("UPDATE user_visit_log set is_type = '{$is_type}' 
                                where user_id = '{$current_user}' and date(svisit_time) = date(now()) order by date(svisit_time) desc limit 1")
                ->execute();
}
