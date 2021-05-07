<?php
use yii\helpers\Html;
date_default_timezone_set('Africa/Lagos');
$db = Yii::$app->db;
$current_user = Yii::$app->user->id;
// $login_status = Yii::$app->user->identity->login_status;
$date_time = date('Y-m-d h:i:sa');

$recent_chat = $db->createCommand("SELECT DISTINCT
                                  LEAST(to_user_id,from_user_id) AS value1,
                                  GREATEST(to_user_id,from_user_id) AS value2
                                  FROM chat_message
                                  WHERE to_user_id = '{$current_user}' OR from_user_id = '{$current_user}'
                                  ORDER BY STATUS DESC")
                  ->queryAll();

$notiffy = $db->createCommand("SELECT b.login_status logger, a.from_user_id sender, count(a.status) stats FROM chat_message a
                              join user b on (b.id = a.from_user_id)
                              where a.status = 1 and a.to_user_id = '{$current_user}' group by 1,2")->queryAll();

// $login_status = $db->createCommand("SELECT login_status  FROM  user  where status = 1 and id = '{$current_user}' ")->queryAll();

foreach ($recent_chat as $recent_chats)
{
  $val2 = $recent_chats['value2'];
  $val1 = $recent_chats['value1'];
  $getName = $db->createCommand("SELECT id, last_name from user where id in ('{$val2}') and id !='{$current_user}'
                                UNION
                                SELECT id, last_name from user where id in ('{$val1}') and id !='{$current_user}'")->queryAll();

  foreach($getName as $getName)
  { ?>
    <!-- display names -->
    <a href="#" >
      <li class="list-group-item agents" value="<?= $getName['id'] ?>" style="color:#fff; background-color:#2F4F4F;">
        <i class="fa fa-user-circle " style="font-size: 20px;"></i>
        <?= $getName['last_name'] ?>

        <!-- online/offline status -->
        <?php

        // display notification
        $output_notice = '';
        foreach($notiffy as $value)
        {
          if($value['sender'] === $getName['id'] && $value['stats'] > 0)
          {
            $output_notice = '<div class="notify pull-right"></div>';
          }else{
            $output_notice = '';
          }
        }
        echo $output_notice;
        ?>

      </li>
    </a>

    <?php
  }

}
?>
