<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php
$groups = Yii::$app->db->createCommand('select distinct user_group as groupp from ecrm_sla')->queryAll();

foreach ($groups as $key => $value) {
$count = Yii::$app->db->createCommand("select count(*) FROM ecrm_conversations a JOIN ecrm_sla b ON a.sla_id = b.id
WHERE a.ticket_status = 'open' and b.user_group = '". $value['groupp'] ."'")->queryScalar();

if ($count != 0) {
  echo "$count notifications for " . $value['groupp'] . "<hr>";

$users = Yii::$app->db->createCommand("Select a.email, a.first_name from user a join auth_assignment b ON a.id = b.user_id
            where b.item_name = '" . $value['groupp'] . "' AND a.status = 1")->queryAll();

        foreach ($users as $user) {
          $cc = Yii::$app->mailer->compose()
             ->setFrom('no-reply@ebis.com.ng')
             ->setTo($user['email'])
             ->setSubject('New Ticket on CIMS')
             // ->setTextBody('Delete Plixx')
             ->setHtmlBody("<p>Good day ". $user['first_name'] . ",</p><br>
                <p>There are currently $count open Tickets on CIMS. Kindly click " . Html::a('here ', Url::home('http')) ."</a> to treat<p><br>
                <p>Warmest Regards,<br>EBIS Team <p>")
             ->send(); //returns 1 if successful
             if (!$cc) {
               echo "Mail to " . $user['username'] . ' not sent';
             }

        }
}

} ?>
<?php
// Yii::$app->mailer->compose('layouts/html') // a view rendering result becomes the message body here
//     ->setFrom('admin@ebis.com')
//     ->setTo('olamideadebayo2001@gmail.com')
//     ->setSubject('Message new')
//     ->send();
     ?>
