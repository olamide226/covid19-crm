<?php 
date_default_timezone_set('Africa/Lagos');
$db = Yii::$app->db; 
$current_user = Yii::$app->user->id;
$usersname = Yii::$app->user->identity->first_name;
$date_time = date('Y-m-d h:i:sa');

if(isset($_GET['msgto']))
{
    $msg_to = $_GET['msgto'];
    $from_user = $current_user;

    //for test purpose; to be removed later
    $fetch_chat_msg = $db->createCommand("SELECT * FROM chat_message WHERE (from_user_id = '{$from_user}' AND to_user_id = '{$msg_to}')
                                     OR (from_user_id = '{$msg_to}' AND to_user_id = '{$from_user}') ORDER BY timestamp")
                    ->queryAll();
    $users_name = $db->createCommand("SELECT first_name FROM user where id = '{$msg_to}'")
                    ->queryAll();

        foreach($fetch_chat_msg as $row) { 
            
            $user_name = '';
            $message = '';
            $timestamp ='';
            if($row["from_user_id"] == $from_user)
            {
                $user_name = '';
                $message = '<div class="pull-right " style="background-color:#FFFFF0; padding:5px; border-radius:25px; color:#2F4F4F">'.$row['chat_message'].'</div>';
                $timestamp = '<div class=" pull-right">'.$row['timestamp'].'</div>';
                
            }else{
                foreach($users_name as $name)
                {
                    $user_name = '<b class="text-danger">'.$name['first_name'].'</b>';
                }
                $message = '<div class="pull-left" style="background-color:#2F4F4F; padding:5px; border-radius:25px; color:#FFFFF0">'.$row['chat_message'].'</div>';
                $timestamp = $row['timestamp'];
            } ?>
            
            <div style="width:100%;">
                <ul class="list-unstyled">
                    <li style="border-bottom:0px dotted #fff">
                        <p><?=  $message .'<br>'; ?></p>
                        <div>
                            <small><em><?= $timestamp?></em></small>
                        </div>
                    </li>
                </ul>
            </div>
    
    <?php       }
   
}else{

}


?>
