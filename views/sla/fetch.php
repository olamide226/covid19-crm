<?php
if (Yii::$app->request->isPost) {

  $count = Yii::$app->db->createCommand('SELECT count(*) FROM ecrm_conversations a JOIN ecrm_sla b ON a.sla_id = b.id
  WHERE a.ticket_status = "open" AND b.user_group = get_user_group('.
    Yii::$app->user->id . ')')->queryScalar();
  // $count = $count['']
  // $data = [$count];
  echo json_encode($count);

// SELECT * FROM ecrm_conversations a JOIN ecrm_sla b ON a.sla_id = b.id WHERE  b.user_group = get_user_group(2);
}
// if (isset($_POST['view'])) {
//
// $count = Yii::$app->db->createCommand('SELECT count(*) FROM ecrm_conversations WHERE ticket_status = "backend" ')->queryOne();
// // $count = $count['']
// $data = [$count];
// echo json_encode($data);
// }
