
<?php 
$db = Yii::$app->db; 
$current_user = Yii::$app->user->id;

// if(isset($_GET['caseId']))
// {
    //$caseId = $_GET('caseId');
    $type = $db->createCommand("SELECT to_user, count(*) as cnt FROM `customer_chat` 
    where status = 2 and to_user = 0 and date(chat_date) = date(CURRENT_TIMESTAMP()) and from_user != 0")->queryAll();
    // $type = $db->createCommand("SELECT count(*) as cnt FROM `customer_chat` where status = 2 and case_id = '{$caseId}'")->queryAll();

    $json = '';
  foreach($type as $types)
  {
    if($types['to_user'] == 0 ){

      $json = $types['cnt'];

    }else{
      $json = '';
    }
    
  }

    $jres = json_encode($json, JSON_NUMERIC_CHECK);

    if($jres > 0)
    {
      echo '<span class="badge">'.number_format($jres).'</span>';
    }else{
      echo '<div></div>';
    }  

// }

?>