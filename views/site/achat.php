<?php
use yii\helpers\Html;
use yii\helpers\Url;
date_default_timezone_set('Africa/Lagos');
$db = Yii::$app->db;
$current_user = Yii::$app->user->id;
$usersname = Yii::$app->user->identity->first_name;
$date_time = date('Y-m-d h:i:sa');
$status = 1;


//fetch agent name for message title
if(isset($_GET['agentId'])) :

    $user_id = $_GET['agentId'];
    $agntname = $db->createCommand("SELECT * from user where id = '{$user_id}'")
                    ->queryAll();
    $fetch_chat_msg = $db->createCommand("SELECT * FROM chat_message WHERE (from_user_id = '{$current_user}' AND to_user_id = '{$user_id}')
                                            OR (from_user_id = '{$user_id}' AND to_user_id = '{$current_user}') ORDER BY timestamp ")
                    ->queryAll();

    $update_status = $db->createCommand("UPDATE chat_message set status = 0 where from_user_id = '{$user_id}' and to_user_id = '{$current_user}'
                                        and status = '{$status}' ")
                        ->execute();
?>
    <div class="panel panel-default" style="height:440px; margin-left:0px ">
    <div class="" style="">
        <?php foreach($agntname as $row) : ?>

            <div class="panel-heading"><?= $row['first_name'].' '.$row['last_name'] ?></div>

            <input type="hidden" value="<?= $row['id']?>" name="agentid" class="agentID">

        <?php endforeach; ?>

        <!-- <div class="panel-body"  style=""> -->
        <div class=""  style="">
            <div class="list-group scrollbar scrollbar-primary chat_area" id="innerlist" style="height:400px; margin-bottom:0;border:1px solid #ccc; background-color:#DCDCDC;">
                <?php foreach($fetch_chat_msg as $row) : ?>
                <?php
                    $user_name = '';
                    $message = '';
                    $timestamp ='';
                    if($row["from_user_id"] == $current_user)
                    {
                        $user_name = '';
                        $message = '<div class="pull-right" style="background-color:#FFFFF0; padding:5px; border-radius:25px; color:#2F4F4F">'.$row['chat_message'].'</div>';
                        $timestamp = '<div class=" pull-right">'.$row['timestamp'].'</div>';
                    }else{
                        foreach($agntname as $name)
                        {
                            $user_name = '<b class="text-danger">'.$name['first_name'].'</b>';
                        }
                        $message = '<div class="pull-left" style="background-color:#2F4F4F; padding:5px; border-radius:25px; color:#FFFFF0">'.$row['chat_message'].'</div>';
                        $timestamp = $row['timestamp'];
                    }
                ?>
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
                <?php endforeach; ?>
            </div>

            <div class="input-group" style="margin-top:0; background-color:#DCDCDC;">
                <!-- <div style="border:1px #fff solid; border-radius:25px;"> -->
                <textarea class="form-control msg col-md-10" style="height:50px; border-radius:5px;" id="msg" placeholder="     Type a message ..."></textarea>
                <!-- </div> -->
                <div class="input-group-btn">
                    <button class="btn btn-success  snd" type="submit" id="snd" style="background-color:#2F4F4F; border-radius:25px;" disabled>
                    <i class="fa fa-paper-plane" aria-hidden="true" style="color:#fff; font-size:25px;"></i>
                    </button>
                </div>
            </div>
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
//send agent chat to db
if(isset($_GET['msgto']) || isset($_GET['msgg'])) :

    $msg_to = trim($_GET['msgto']);
    $msg = $_GET['msgg'];
    $from_user = $current_user;


    $chat_msg = $db->createCommand("INSERT INTO chat_message (to_user_id, from_user_id, chat_message, timestamp, status)
                                    VALUES ('{$msg_to}','{$from_user}','{$msg}', now(),'{$status}') ")
                    ->execute();

    //for test purpose; to be removed later
    $fetch_chat_msg = $db->createCommand("SELECT * FROM chat_message WHERE (from_user_id = '{$from_user}' AND to_user_id = '{$msg_to}')
                                     OR (from_user_id = '{$msg_to}' AND to_user_id = '{$from_user}') ORDER BY timestamp ")
                        ->queryAll();
    $users_name = $db->createCommand("SELECT first_name FROM user where id = '{$msg_to}'")
                    ->queryAll();
?>
<?php
        foreach($fetch_chat_msg as $row) {

            $user_name = '';
            $message = '';
            $timestamp ='';
            if($row["from_user_id"] == $from_user)
            {
                $user_name = '';
                $message = '<div class="pull-right" style="background-color:#FFFFF0; padding:5px; border-radius:25px; color:#2F4F4F">'.$row['chat_message'].'</div>';
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
<?php   } ?>

<script>
var obj = document.getElementById('innerlist');
obj.scrollTop = obj.scrollHeight;
</script>
<?php endif; ?>

<?php
//filter agent
if(isset($_GET['filter']))
{
    $filter = $_GET['filter'];

    $filterer = $db->createCommand("SELECT * from user where full_name like '%{$filter}%' and id !='{$current_user}' and status = 1 and full_name !='' order by full_name")
                    ->queryAll();
?>
    <div class="list-group scrollbar scrollbar-primary" style="height:350px; background-color:#2F4F4F; overflow: auto;">
        <?php foreach($filterer as $row) : ?>
            <a href="#" style="color:#228B22">
                <li class="list-group-item agents" value="<?=$row['id']?>" style="color:#fff; background-color:#2F4F4F;">
                <!-- <span class="glyphicon glyphicon-user " style="font-size: 30px; text-align: middle;" ></span> -->
                <i class="fa fa-user-circle " style="font-size: 20px;"></i>
                <?= $row['last_name']; ?>
                    <?php
                        if($row['login_status'] == 1)
                        {
                            echo Html::img('@web/images/online.png', ['class'=>'pull-right']);
                        }else{
                            echo Html::img('@web/images/offline.png', ['class'=>'pull-right']);
                        }
                        // foreach($notiffy as $notiffys)
                        // {
                        //     if($notiffys['from_user_id'] == $agent['id'] && $notiffys['cnt'] > 0)
                        //     {
                        //     echo '<div class="notify pull-right"></div>';
                        //     }
                        // }
                    ?>
                </li>
            </a>
        <?php endforeach; ?>

    </div>
    </div>
<?php
}else{

}

if(isset($_GET['is_type']) || isset($_GET['agtId']))
{
    $user_id = $_GET['agtId'];
    $is_type = $_GET['is_type'];
    $db->createCommand("UPDATE user_visit_log set is_type = '{$is_type}'
                                where user_id = '{$current_user}' order by svisit_time desc limit 1 ")
                ->execute();
    $db->createCommand("UPDATE chat_message set status = '0' where from_user_id = '{$user_id}' and to_user_id = '{$current_user}'
                                            and status = '{$status}' ")
                ->execute();
}


?>
