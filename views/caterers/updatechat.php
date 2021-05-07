<?php
date_default_timezone_set('Africa/Lagos');
$db = Yii::$app->db; 
$current_user = Yii::$app->user->id;
$usersname = Yii::$app->user->identity->first_name;
$date_time = date('Y-m-d h:i:sa');
$nt_response = 2;
$in_response = 1;
$end_chat = 0;


if(isset($_GET['toUser']) || isset($_GET['caseId']) )
{
    $toUser = $_GET['toUser'];
    $caseId = $_GET['caseId'];

    $fetch_chat_msg = $db->createCommand("SELECT * FROM customer_chat 
                                            WHERE (case_id = '{$caseId}' AND from_user ='{$current_user}' AND to_user = '{$toUser}') 
                                            OR (from_user ='{$toUser}' AND  to_user = '{$current_user}')
                                            ORDER BY chat_date ")
                        ->queryAll();

    $customer_name = $db->createCommand("SELECT * from customer where case_id = '{$caseId}'")->queryAll();

    $json = '';
    foreach($fetch_chat_msg as $row) 
    { 

        $user_name = '';
        $message = '';
        $timestamp ='';
        if($row["from_user"] == $current_user)
        {
            $user_name = '<div class=" pull-right">'.$usersname.'</div>';
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
                    <p><?=  $user_name.'<br>'; ?></p> 
                    <p><?= $message .'<br>'; ?></p>
                    <div> <small><em><?= $timestamp ?></em></small> </div>
                    
                    <?php 
                        foreach($customer_name as $is_type)
                        {
                            if($is_type['is_typing'] == 1)
                            {
                                $json = '<small><em>'.$is_type['customer_name'].' '.'is typing...';
                                // echo '<center><small><em>'.$is_type['customer_name'].' '.'is typing</em></small></center>';
                            }else{
                                $json = '';
                            }
                        }
                    ?>
                </li>
            </ul>
        </div>


<?php }     echo $json;
 } ?>