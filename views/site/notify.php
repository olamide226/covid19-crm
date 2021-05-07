<?php 
$db = Yii::$app->db; 
$current_user = Yii::$app->user->id;
  $type = $db->createCommand("SELECT count(*) as cnt FROM `chat_message` where status = 1 and to_user_id = '{$current_user}'")->queryAll();
  foreach($type as $types)
  {
    $json = $types['cnt'];
  }

    $jres = json_encode($json, JSON_NUMERIC_CHECK);

    if($jres > 0)
    {
        echo '<span class="badge">'.number_format($jres).'</span>';
    }else{
        echo '<div></div>';
    }  
?>