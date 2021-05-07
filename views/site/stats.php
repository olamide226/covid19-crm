
<?php

use app\models\Comment;
use app\models\Lga;
//retrieve comments based on product
 if (isset($_GET['id']) && isset($_GET['cat']) ):
    $id1 = $_GET['id'];
    $cat = $_GET['cat'];
    $comm = Comment::find()->where(['category_id'=>$cat, 'product_id'=> $id1, 'status'=>1])->all();
?>

        <option>Select Comment...</option>
                <?php foreach ($comm as $comm) : ?>

        <option value='<?= $comm->id ?>' ><?= $comm->comments ?></option>

               <?php endforeach; ?>
                <!-- </select> -->
<?php return true; endif; ?>

<?php 
$db = Yii::$app->db;
//populate lga with stateid
  if(isset($_GET['stateId'])) :
    $stateId = $_GET['stateId'];
    
    // $getLga = Lga::find()->where(['id'=>$stateId])->all();
    $getLga =  $db->createCommand("SELECT * from hgsf_lga where state_id = '{$stateId}' ")->queryAll();
?>
<option>Select LGA...</option>
<?php foreach ($getLga as $getLgas) : ?>
<option value='<?= $getLgas['id'] ?>' ><?= $getLgas['lga'] ?></option>
<?php endforeach; ?>
<?php return true; 
      endif; ?>

<?php
//auto-populate comment with subcategory(customer category)  on update form 
 if(isset($_GET['comment'])) :
  $phone = $_GET['comment'];

  $getComment = $db->createCommand("SELECT a.phone_no, a.comment_id, b.comments comments, b.id id from hgsf_conversations a
                                        join hgsf_comment b on (a.comment_id = b.id)
                                        where a.phone_no = '{$phone}'
                                        order by date(entry_date) desc limit 1 ")->queryAll();
 foreach ($getComment as $gcmt) : ?>
 <option value='<?= $gcmt['id'] ?>'><?= $gcmt['comments'] ?></option>
 <?php endforeach; ?>
 <?php return true;
        endif; ?>


<?php
//auto-populate lga with state on update form
  if(isset($_GET['phone'])) :
    $phone = $_GET['phone'];

    $getLga =  $db->createCommand("SELECT a.phone_no, a.lga_id, b.lga lga, b.id id from hgsf_conversations a 
                                  join hgsf_lga b on (a.lga_id = b.id) 
				where a.phone_no = '{$phone}' 
				order by date(entry_date) desc limit 1 ")->queryAll();
?>
<!-- <option>Select Lga...</option> -->
<?php foreach ($getLga as $getLgas) : ?>
  <option value='<?= $getLgas['id'] ?>' ><?= $getLgas['lga'] ?></option>
<?php endforeach; ?>
<?php return true; 
      endif; ?>

<?php
//populate lga with stateid
  if(isset($_GET['catId'])) :
    $subCat = $_GET['catId'];
    
    $getSubCat =  $db->createCommand("SELECT * from hgsf_comment where sub_category_id = '{$subCat}' and status = 1 ")->queryAll();
?>
<option>Select Issues...</option>
<?php foreach ($getSubCat as $getSubCats) : ?>
<option value='<?= $getSubCats['id'] ?>' ><?= $getSubCats['comments'] ?></option>
<?php endforeach; ?>
<?php return true; 
      endif; ?>


<?php
use dosamigos\datepicker\DatePicker;
date_default_timezone_set('Africa/Lagos');
////declaring variables to capture function ID,
$db = Yii::$app->db;
$today = date('Y-m-d');
$today_pretty = date('l jS M, Y');
$current_user = Yii::$app->user->id;
$pid = $_REQUEST['pid'];
if (isset($_GET['sdate']) && isset($_GET['edate']))
{
  $sdate = $_GET['sdate'];
  $edate = $_GET['edate'];
}

//from todayCount
switch ($pid){

  case 1:
  $today_call_count = $db->createCommand("SELECT count(*) as numrows
  FROM hgsf_conversations
  WHERE call_type_id = 1 AND date(entry_date) = CURRENT_DATE AND entry_source_id = 1")
  ->queryOne();
  foreach ($today_call_count as $key => $value)  {
    // echo "<h1 style='font-size: 60px'>" . $value . "</h1>";
  echo   "<button style='background-color: #5FCF80;border: none;
        color: white;
        padding: 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 40px;
        margin: 4px 2px;
        border-radius: 50%;'> {$value}</button>";
  }

  echo  "<h4>" . date('l, jS M, h:i a') . "</h4>";

  break;
  case 1.1:
  $today_call_count = $db->createCommand("SELECT count(*) as numrows
  FROM tm_verification_history
  WHERE date(created_on) = CURRENT_DATE ")
  ->queryOne();
  foreach ($today_call_count as $key => $value)  {
    // echo "<h1 style='font-size: 60px'>" . $value . "</h1>";
  echo   "<button style='background-color: #5FCF80;border: none;
        color: white;
        padding: 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 40px;
        margin: 4px 2px;
        border-radius: 50%;'> {$value}</button>";
  }

  echo  "<h4>" . date('l, jS M, h:i a') . "</h4>";

  break;


  case 1.5:
  $realtime_summary = $db->createCommand("SELECT  b.source_name, count(*)  num_rows
      from hgsf_conversations a JOIN hgsf_entry_source b ON (a.entry_source_id = b.id)
      where a.call_type_id = 1 AND date(entry_date) = '".$today."'
      group by a.entry_source_id
      order by 1 ")
  ->queryAll();

      echo  "Date: ".date('jS M Y'). "<br> Time: ".date('h:i a')."<br>";
      foreach ($realtime_summary as $row)  {
        echo  ucfirst($row['source_name']).": ". $row['num_rows'] . "<br>";
      }

      $total_count = $db->createCommand("SELECT count(*)  num_rows
          from hgsf_conversations
          where call_type_id = 1 AND date(entry_date) = '".$today."'")
          ->queryAll();
      foreach ($total_count as $row) {
        echo  "<br> Total: ". $row['num_rows'] . "<br>Thank You.";
      }
  break;

//for verifiers
  case 1.6:
  $vrealtime_summary = $db->createCommand("SELECT  count(*) as num_rows,
  sum(case when status = 1 then 1 else 0 end) accepted,
  sum(case when status = 0 then 1 else 0 end) rejected ,
  sum(case when status = 2 then 1 else 0 end) unsettled,
  sum(case when status = 3 then 1 else 0 end) voicemail,
  sum(case when status = 4 then 1 else 0 end) flash
                FROM tm_verification
                where date(updated_date) = '".$today."'
                ")
                ->queryAll();

      echo  "Date: ".date('jS M Y'). "<br> Time: ".date('h:i a')."<br>";
      foreach ($vrealtime_summary as $row)  {
        echo  "Total Records Processed: " . number_format($row['num_rows'],0) . "<br>";
        echo "Accepted".": " . number_format($row['accepted'],0) . "<br>";
        echo "Rejected".": " . number_format($row['rejected'],0) . "<br>";
        echo "Ongoing".": " . number_format($row['unsettled'],0) . "<br>";
        echo "Voice Mail".": " . number_format($row['voicemail'],0) . "<br>";
        echo "Flash Call".": " . number_format($row['flash'],0) . "<br>";
      }

      $total_count = $db->createCommand("SELECT count(*)  num_rows
          from tm_verification_history
          where date(created_on) = '".$today."'")
          ->queryAll();
      foreach ($total_count as $row) {
        echo "<br>Total Calls".": " . number_format($row['num_rows'],0) . "<br>";

        echo  "<br>Thank You.";
      }
  break;

//from agentCount
 case 2:
  $user_call_count = $db->createCommand("SELECT
      count(*) num_rows
      from hgsf_conversations
      where (date(entry_date) = CURRENT_DATE)
      AND (entry_source_id = 1) AND
      user_id = '{$current_user}'
      AND call_type_id = 1
      ")
      ->queryOne();
      foreach ($user_call_count as $key => $value)  {
      echo "<button style='background-color: #5FCF80;border: none;
            color: white;
            padding: 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 40px;
            margin: 4px 2px;
            border-radius: 50%;'> {$value}</button>";
      }
      break;
//from agentCount outgoing
 case 2.1:
  $user_call_count = $db->createCommand("SELECT
      count(*) num_rows
      from tm_verification_history
      where (date(created_on) = CURRENT_DATE)
      AND
      user_id = '{$current_user}'

      ")
      ->queryOne();
      foreach ($user_call_count as $key => $value)  {
      echo "<button style='background-color: #5FCF80;border: none;
            color: white;
            padding: 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 40px;
            margin: 4px 2px;
            border-radius: 50%;'> {$value}</button>";
      }
      break;


 case 2.5:

          //product
          echo  "Good day all. <br> Report on the Call Centre for <br>".date('l, jS M, Y'). "<br><br>";

          $product_count = $db->createCommand("SELECT b.product_name, count(*) num_rows
              from hgsf_conversations a JOIN hgsf_product b ON (a.product_id = b.id)
              where a.call_type_id = 1 AND date(entry_date) = '".$today."'
              group by a.product_id")
              ->queryAll();


          foreach($product_count as $row) {
            echo ucfirst($row['product_name']).":". $row['num_rows']."<br>";
          }

          // category
          $category_count = $db->createCommand("SELECT b.category_name, count(*) num_rows
              from hgsf_conversations a JOIN hgsf_category b ON (a.category_id = b.id)
              where a.call_type_id = 1 AND date(entry_date) = '".$today."'
              group by a.category_id
              order by 2 desc ")
              ->queryAll();

          echo "<hr>";
          foreach($category_count as $row) {
            echo ucfirst($row['category_name']). ": ". $row['num_rows'] . "<br>";
          }


          $per_agent_count = $db->createCommand(" SELECT concat(b.first_name ,' ',b.last_name) created_by, count(*) num_rows
              from hgsf_conversations a JOIN user b ON (a.user_id = b.id)
              where a.call_type_id = 1 AND date(entry_date) = '".$today."'
              group by  created_by
              order by  2 desc")
              ->queryAll();

          $i = 1;
          echo "<hr>";
          foreach($per_agent_count as $row) {
            echo $i . ". " . $row['created_by'].": " . $row['num_rows'] . "<br>" ;
            $i++;
          }


          //source
          $source_count = $db->createCommand("SELECT b.source_name, count(*)  num_rows
              from hgsf_conversations a JOIN hgsf_entry_source b ON (a.entry_source_id = b.id)
              where a.call_type_id = 1 AND date(entry_date) = '".$today."'
              group by a.entry_source_id
              order by 1 ")
              ->queryAll();

          echo "<hr>";
          foreach($source_count as $row) {
            echo  ucfirst($row['source_name']).": ". $row['num_rows'] . "<br>";
          }

          $total_count = $db->createCommand("SELECT count(*)  num_rows
              from hgsf_conversations
              where call_type_id = 1 AND date(entry_date) = '".$today."'")
              ->queryAll();

          foreach($total_count as $row) {
            echo  "<hr> Total: ". $row['num_rows'] . "<br>Thank You.";
          }

        break;


 case 2.9:

          //daily summary
          echo  "Good day all. <br> Verification Reports for <br>".date('l, jS M, Y'). "<br><br>";
          //total PROCESSED count
          $processed_count = $db->createCommand("SELECT count(*) as num_rows,
                    sum(case when status = 1 then 1 else 0 end) accepted,
                    sum(case when status = 0 then 1 else 0 end) rejected,
                    sum(case when status = 2 then 1 else 0 end) unsettled,
                    sum(case when status = 3 then 1 else 0 end) voicemail,
                    sum(case when status = 4 then 1 else 0 end) flash
                    FROM tm_verification
                    where date(updated_date) = '" . $today . "'
                    ")
              ->queryAll();


          foreach($processed_count as $row) {
            echo "Total Records Processed".": " . number_format($row['num_rows'],0) . "<br>";
            echo "Accepted".": " . number_format($row['accepted'],0) . "<br>";
            echo "Rejected".": " . number_format($row['rejected'],0) . "<br>";
            echo "Ongoing".": " . number_format($row['unsettled'],0) . "<br>";
            echo "Voice Mail".": " . number_format($row['voicemail'],0) . "<br>";
            echo "Flash".": " . number_format($row['flash'],0) . "<br>";
          }

          // Total call count
          $call_count = $db->createCommand("SELECT count(*) as num_rows,
                    sum(case when status = 1 then 1 else 0 end) accepted,
                    sum(case when status = 0 then 1 else 0 end) rejected ,
                    sum(case when status = 2 then 1 else 0 end) unsettled,
                    sum(case when status = 3 then 1 else 0 end) voicemail,
                    sum(case when status = 4 then 1 else 0 end) flash
                    FROM tm_verification_history
                    where date(created_on) = '" . $today . "'
                    ")
              ->queryAll();

          echo "<hr>";
          foreach($call_count as $row) {
              echo "Total Calls".": " . number_format($row['num_rows'],0) . "<br>";
              echo "Accepted".": " . number_format($row['accepted'],0) . "<br>";
              echo "Rejected".": " . number_format($row['rejected'],0) . "<br>";
              echo "Ongoing".": " . number_format($row['unsettled'],0) . "<br>";
              echo "Voicemail".": " . number_format($row['voicemail'],0) . "<br>";
              echo "Flash Call".": " . number_format($row['flash'],0) . "<br>";
          }


          $per_agent_count = $db->createCommand("SELECT b.first_name as created_by, count(*) num_rows
                      from tm_verification_history a join user b on  (a.user_id=b.id)
                      where date(a.created_on) = '" . $today . "'
                      group by b.id
                      order by 2 desc")
              ->queryAll();

          $i = 1;
          echo "<hr>";
          foreach($per_agent_count as $row) {
            echo $i . ". " . $row['created_by'].": " . $row['num_rows'] . "<br>" ;
            $i++;
          }
          //
          //
          // $total_count = $db->createCommand("SELECT count(*)  num_rows
          //    from hgsf_conversations
          //    where call_type_id = 1 AND date(entry_date) = '".$today."'")
          //     ->queryAll();
          //
          // foreach($total_count as $row) {
          //  echo  "<hr> Total: ". $row['num_rows'] . "<br>Thank You.";
          // }

        break;

// from drawChart function
 case 3:
   $agent_total_call = $db->createCommand("select b.first_name, count(*) num_rows
        from hgsf_conversations a join user b
on (a.user_id=b.id)
        where a.call_type_id = 1 AND date(entry_date) = CURRENT_DATE
        AND entry_source_id = 1
          group by a.user_id")->queryAll();
   $new_array = array();
   array_push($new_array, ["Agent",'No Of Calls']);
   if ($agent_total_call){
   foreach ($agent_total_call as $key => $value) {
     array_push($new_array, [$value['first_name'], (int)$value['num_rows']]);
   }} else{ array_push($new_array,['No User Data', 0 ]);}
// This encodes the array so it can be decoded/parsed somewhere else.
//data over ajax is sent as a string.
echo json_encode($new_array);
// print_r($agent_total_call);
break;
?>
<?php
// from drawChart function for outgoing
 case 3.5:
   $agent_total_call = $db->createCommand("select b.first_name, count(*) num_rows
        from tm_verification_history a join user b
on (a.user_id=b.id)
        where date(a.created_on) = CURRENT_DATE
          group by a.user_id order by 2 desc")->queryAll();
   $new_array = array();
   array_push($new_array, ["Agent",'No Of Calls']);
   if ($agent_total_call){
   foreach ($agent_total_call as $key => $value) {
     array_push($new_array, [$value['first_name'], (int)$value['num_rows']]);
   }} else{ array_push($new_array,['No User Data', 0 ]);}
// This encodes the array so it can be decoded/parsed somewhere else.
//data over ajax is sent as a string.
echo json_encode($new_array);
// print_r($agent_total_call);
break;
?>

<?php case 4: ?>

<?php
//scripts for displaying count per day or per month reports
$count_per_day = $db->createCommand("SELECT date(entry_date) as entry_date, count(*) as num_rows
                    FROM hgsf_conversations
                    where call_type_id = 1 AND date(entry_date) between '{$sdate}' and '{$edate}'
                    group by date(entry_date)
                    order by date(entry_date) desc")
                    ->queryAll();


$count_per_month = $db->createCommand("SELECT DATE_FORMAT(entry_date,'%Y-%m'),
                      concat(monthname(entry_date),'-',year(entry_date)) entry_date,  count(*)  num_rows
                      from hgsf_conversations
                      where call_type_id = 1
                      group by  DATE_FORMAT(entry_date,'%Y-%m'), concat(monthname(entry_date),'-',year(entry_date))
                      order by 1 desc")
                      ->queryAll();
$i = 1;
?><hr>
<table class='table'>
  <h3>Daily call count</h3>
    <tr>
        <th>ID</th>
        <th>DATE</th>
        <th>CALL COUNT</th>
    </tr>

  <?php foreach ($count_per_day as $key => $value) { ?>
      <tr>
          <td><?= $i ?></td>
          <td><?= $value['entry_date'] ?></td>
          <td><?= $value['num_rows'] ?></td>
      </tr>
    <?php $i++;
  } //ends count_per_day loop
  ?>
</table>
<br><br>

<?php
//count per day per entry source //
  $entry_source_count = $db->createCommand("SELECT date(entry_date) entry_date, b.source_name source, count(*)  num_rows
        from hgsf_conversations a JOIN hgsf_entry_source b ON (a.entry_source_id = b.id)
        where a.call_type_id = 1 AND date(entry_date) between '{$sdate}' and  '{$edate}'
        group by date(entry_date), source
        order by 1 desc ")
        ->queryAll();

    echo "<hr><table class='table table-hover'>
    <h3>Count per Source of Entry</h3>
    <tr>
    <th>ID</th>
    <th>DATE</th>
    <th>SOURCE</th>
    <th>ENTRY COUNT</th>
    </tr>";
    $i = 1;
    foreach($entry_source_count as $row) {
      echo "<tr>";
      echo "<td>" . $i. "</td>";
      echo "<td>" . $row['entry_date'] . "</td>";
      echo "<td>" . $row['source'] . "</td>";
      echo "<td>" . $row['num_rows'] . "</td>";
      echo "</tr>";
      $i++;
    }
    echo "</table>";

 ?>
    <hr><h3>Monthly Summary as at <?= $today_pretty ?><h3/>
    <table class='table'>
    <tr>
        <th>ID</th>
        <th>MONTH</th>
        <th>CALL COUNT</th>
    </tr>

<?php    $i = 1;
    foreach ($count_per_month as $key => $value) { ?>
      <tr>
          <td><?= $i ?></td>
          <td><?= $value['entry_date'] ?></td>
          <td><?= $value['num_rows'] ?></td>
      </tr>

<?php $i++;
    } //ends count_per_month loop
?>
   </table>

<?php break; ?>

<?php case 4.5: ?>

<?php
//scripts for displaying count per day or per month reports
$count_per_day = $db->createCommand("SELECT date(updated_date) as entry_date, count(*) as num_rows,
                    sum(case when status = 1 then 1 else 0 end) accepted,
                    sum(case when status = 0 then 1 else 0 end) rejected,
                    sum(case when status = 2 then 1 else 0 end) unsettled,
                    sum(case when status = 3 then 1 else 0 end) voicemail,
                    sum(case when status = 4 then 1 else 0 end) flash
                    FROM tm_verification
                    where date(updated_date) between '{$sdate}' and '{$edate}'
                    group by 1
                    order by 1 desc")
                    ->queryAll();

$i = 1;
?>

<h3>RECORDS PER DAY</h3>
<table class='table table-responsive'>
    <tr>
        <th>ID</th>
        <th>DATE</th>
        <th>TOTAL PROCESSED RECORDS</th>
        <th>ACCEPTED</th>
        <th>REJECTED</th>
        <th>ONGOING</th>
        <th>VOICE MAIL</th>
        <th>FLASH</th>
    </tr>

  <?php foreach ($count_per_day as $key => $value) { ?>
      <tr>
          <td><?= $i ?></td>
          <td><?= $value['entry_date'] ?></td>
          <td><?= number_format($value['num_rows'],0) ?></td>
          <td><?= number_format($value['accepted'],0) ?></td>
          <td><?= number_format($value['rejected'],0) ?></td>
          <td><?= number_format($value['unsettled'],0) ?></td>
          <td><?= number_format($value['voicemail'],0) ?></td>
          <td><?= number_format($value['flash'],0) ?></td>
      </tr>
    <?php $i++;
  } //ends count_per_day loop
  ?>
</table>
<br><br>

   </table>

<?php break; ?>

<?php case 4.6: ?>

<?php
//scripts for displaying count per day or per month reports
$all_time_month = $db->createCommand("SELECT DATE_FORMAT(updated_date,'%Y-%m'),
                      concat(monthname(updated_date),'-',year(updated_date)) entry_date,  count(*)  num_rows,
sum(case when status = 1 then 1 else 0 end) accepted,
    sum(case when status = 0 then 1 else 0 end) rejected,
    sum(case when status = 2 then 1 else 0 end) unsettled,
    sum(case when status = 3 then 1 else 0 end) voicemail,
    sum(case when status = 4 then 1 else 0 end) flash
                      from tm_verification
                      group by  1, 2
                      order by 1 desc")
                      ->queryAll();
$count_per_month = $db->createCommand("SELECT DATE_FORMAT(updated_date,'%Y-%m'),
                      concat(monthname(updated_date),'-',year(updated_date)) entry_date,  count(*)  num_rows,
    sum(case when status = 1 then 1 else 0 end) accepted,
    sum(case when status = 0 then 1 else 0 end) rejected,
    sum(case when status = 2 then 1 else 0 end) unsettled,
    sum(case when status = 3 then 1 else 0 end) voicemail,
    sum(case when status = 4 then 1 else 0 end) flash
                      from tm_verification where date(created_on) between '{$sdate}' and '{$edate}'
                      group by  1, 2
                      order by 1 desc")
                      ->queryAll();
?>

    <h3>Records Processed between <?= $sdate . " and " .$edate?><h3/>
    <table class='table'>
    <tr>
        <th>ID</th>
        <th>MONTH</th>
        <th>TOTAL PROCESSED RECORDS</th>
        <th>ACCEPTED</th>
        <th>REJECTED</th>
        <th>ONGOING</th>
        <th>VOICE MAIL</th>
        <th>FLASH</th>
    </tr>

<?php    $i = 1;
    foreach ($count_per_month as $key => $value) { ?>
      <tr>
          <td><?= $i ?></td>
          <td><?= $value['entry_date'] ?></td>
          <td><?= number_format($value['num_rows'],0) ?></td>
          <td><?= number_format($value['accepted'],0) ?></td>
          <td><?= number_format($value['rejected'],0) ?></td>
          <td><?= number_format($value['unsettled'],0) ?></td>
          <td><?= number_format($value['voicemail'],0) ?></td>
          <td><?= number_format($value['flash'],0) ?></td>
      </tr>

<?php $i++;
    } //ends count_per_month loop
?>
   </table>

    <h3>Monthly Summary as at <?= $today_pretty ?><h3/>
    <table class='table'>
    <tr>

        <th>MONTH</th>
        <th>TOTAL PROCESSED RECORDS</th>
        <th>ACCEPTED</th>
        <th>REJECTED</th>
        <th>INCONCLUSIVE</th>
        <th>VOICE MAIL</th>
        <th>Flash</th>
    </tr>

<?php
    foreach ($all_time_month as $key => $value) { ?>
      <tr>
          <td><?= $value['entry_date'] ?></td>
          <td><?= number_format($value['num_rows'],0) ?></td>
          <td><?= number_format($value['accepted'],0) ?></td>
          <td><?= number_format($value['rejected'],0) ?></td>
          <td><?= number_format($value['unsettled'],0) ?></td>
          <td><?= number_format($value['voicemail'],0) ?></td>
          <td><?= number_format($value['flash'],0) ?></td>
      </tr>

<?php
    } //ends count_per_month loop
?>
   </table>

<?php break; ?>


<?php case 5: ?>
<?php
//script for showing category report
$categroy_product_count = $db->createCommand("SELECT date(entry_date) entry_date,  b.product_name, count(*) num_rows
        from hgsf_conversations a JOIN hgsf_product b ON (a.product_id = b.id)
        where a.call_type_id = 1 AND date(entry_date) between '".$sdate."' and '".$edate."'
        group by date(entry_date) , a.product_id
        order by 1 desc,2 ")
        ->queryAll();


    echo "
    <h3>Count per Product<h3/>
    <table class='table'>
    <tr>
    <th>ID</th>
    <th>DATE</th>
    <th>PRODUCT</th>
    <th>CALL COUNT</th>
    </tr>";
    $i = 1;
    foreach($categroy_product_count as $row) {
      echo "<tr>";
      echo "<td>" . $i. "</td>";
      echo "<td>" . $row['entry_date'] . "</td>";
      echo "<td>" . ucwords($row['product_name']). "</td>";
      echo "<td>" . $row['num_rows']. "</td>";
      echo "</tr>";
      $i++;
    }
    echo "</table>";


$count_per_category = $db->createCommand("SELECT date(a.entry_date) as entry_date, b.product_name product,  c.category_name as category, a.fraud_status,  count(*)  num_rows
                            from hgsf_conversations a join hgsf_category c on (a.category_id = c.id)
                            JOIN hgsf_product b ON (a.product_id = b.id)
                            WHERE a.call_type_id = 1 AND date(a.entry_date) between '{$sdate}' and '{$edate}'
                            group by  date(entry_date), a.product_id, a.category_id, fraud_status
                            order by 1 desc,2,3")
                          ->queryAll();
$i = 1;
?>
<h3>Count per Category</h3>
<table class='table'>
    <tr>
        <th>ID</th>
        <th>DATE</th>
        <th>PRODUCT</th>
        <th>CATEGORY</th>
        <th>FRAUD??</th>
        <th>CALL COUNT</th>
    </tr>
<?php foreach ($count_per_category as $key => $value) { ?>
      <tr>
      <td><?= $i ?></td>
      <td><?= $value['entry_date'] ?></td>
      <td><?= $value['product'] ?></td>
      <td><?= ucwords($value['category']) ?></td>
      <td><?= $value['fraud_status'] ?></td>
      <td><?= $value['num_rows'] ?></td>
      </tr>
  <?php
    $i++;
  } //ends loop
    ?>
</table>
<?php
//call count per source per category
$per_source_per_category = $db->createCommand( "SELECT date(entry_date) entry_date,  b.product_name, c.category_name,
      d.source_name, count(*) num_rows
      FROM hgsf_conversations a JOIN hgsf_product b ON (a.product_id = b.id)
      JOIN hgsf_category c ON (a.category_id = c.id)
      JOIN hgsf_entry_source d ON (a.entry_source_id = d.id)
      WHERE a.call_type_id = 1 AND  date(entry_date) between '".$sdate."' and '".$edate."'
      group by date(entry_date) , a.product_id, a.category_id,  a.entry_source_id
      order by 1 desc,2,3,4")
      ->queryAll();

  echo "<BR><BR>
  <h3>Count Per source by category<h3/>
  <table class='table'>
  <tr>
  <th>ID</th>
  <th>DATE</th>
  <th>PRODUCT</th>
  <th>CATEGORY</th>
  <th>SOURCE</th>
  <th>CALL COUNT</th>
  </tr>";
  $i = 1;
  foreach($per_source_per_category as $row) {
    echo "<tr>";
    echo "<td>" . $i. "</td>";
    echo "<td>" . $row['entry_date'] . "</td>";
    echo "<td>" . ucwords($row['product_name']). "</td>";
    echo "<td>" . ucwords($row['category_name']). "</td>";
    echo "<td>" . ucwords($row['source_name']). "</td>";
    echo "<td>" . $row['num_rows']. "</td>";
    echo "</tr>";
    $i++;
  }
  echo "</table>";
  ?>
<?php
//monthly summary
$count_per_cat_month = $db->createCommand("SELECT DATE_FORMAT(entry_date,'%Y-%m'), c.product_name, concat(monthname(entry_date),'-',year(entry_date)) entry_date,
 b.category_name as category, a.fraud_status, count(*)  num_rows
from hgsf_conversations a join hgsf_category b on (a.category_id = b.id)
JOIN hgsf_product c ON (a.product_id = c.id)
group by  DATE_FORMAT(entry_date,'%Y-%m'), a.product_id, concat(monthname(entry_date),'-',year(entry_date)), b.category_name, a.fraud_status
order by 1 desc,2,4,5")
->queryAll();

 ?>
     <br><BR>
    <h3>Monthly summary Per Category as at  <?= $today_pretty ?>  <h3/>
<table class='table'>
    <tr>
        <th>ID</th>
        <th>MONTH</th>
        <th>PRODUCT</th>
        <th>CATEGORY</th>
        <th>FRAUD??</th>
        <th>CALL COUNT</th>
    </tr>
  <?php
  $i = 1;
  foreach ($count_per_cat_month as $value) {
  ?>
       <tr>
       <td><?= $i ?> </td>
       <td><?= $value['entry_date'] ?></td>
       <td><?= $value['product_name'] ?></td>
       <td><?= ucwords($value['category']) ?></td>
       <td><?= $value['fraud_status'] ?></td>
       <td><?= $value['num_rows'] ?></td>
       </tr>
       <?php
      $i++;
    } //ends loop for monthly summary
    ?>
     </table>

<?php
//all time summary
$count_cat_all_time = $db->createCommand("SELECT c.product_name, b.category_name as category, count(*)  num_rows
from hgsf_conversations a join hgsf_category b on (a.category_id = b.id)
join hgsf_product c ON (a.product_id = c.id)
group by  a.product_id, b.category_name
")->queryAll();
 ?>

   <br><br>
    <h3>All Time Per Category as at   <?= $today_pretty ?>  <h3/>
    <table class='table'>
    <tr>
      <th>ID</th>
      <th>PRODUCT</th>
      <th>CATEGORY</th>
      <th>CALL COUNT</th>
    </tr>

    <?php
    $i = 1;
    foreach ($count_cat_all_time as $key => $value): ?>
    <tr>
    <td><?= $i ?></td>
    <td><?= ucwords($value['product_name']) ?></td>
    <td><?= ucwords($value['category']) ?></td>
    <td><?= $value['num_rows'] ?></td>
    </tr>

    <?php $i++; endforeach; ?>

     </table>

<?php break; ?>


<?php case 6: ?>

<?php //script showing count per association
$count_per_asso = $db->createCommand("
SELECT date(entry_date) entry_date, UPPER(trim(association)) AS association, count(*) as num_rows FROM mv_boi_data
    where date(entry_date) between '{$sdate}' and '{$edate}'
    group by date(entry_date), UPPER(trim(association))
    order by 1 desc, 3  desc")->queryAll();
?>

    <h3>Count per Association<h3/>
    <table class='table'>
    <tr>
    <th>ID</th>
    <th>DATE</th>
    <th>ASSOCIATION</th>
    <th>CALL COUNT</th>
    </tr>

    <?php $i = 1;
    foreach ($count_per_asso as $key => $value): ?>
      <tr>
      <td><?= $i ?></td>
      <td><?= $value['entry_date'] ?></td>
      <td><?= $value['association'] ?></td>
      <td><?= $value['num_rows'] ?></td>
      </tr>


    <?php $i++; endforeach; ?>

    </table>
<?php
$monthly_asso_count = $db->createCommand("SELECT date_format(entry_date,'%Y-%m'), concat(monthname(entry_date),'-',year(entry_date)) entry_date,UPPER(trim(association)) AS association, count(*) as num_rows FROM mv_boi_data
    where date(entry_date) between '{$sdate}' and '{$edate}'
    group by date_format(entry_date,'%Y-%m'), concat(monthname(entry_date),'-',year(entry_date)) ,UPPER(trim(association))
    order by 1 desc, 4 desc")->queryAll();
 ?>

    <h3>Monthly Count Per Association<h3/>
    <table class='table'>
    <tr>
    <th>ID</th>
    <th>MONTH</th>
    <th>ASSOCIATION</th>
    <th>CALL COUNT</th>
    </tr>
    <?php
    $i = 1;
    foreach ($monthly_asso_count as $key => $value): ?>

    <tr>
        <td><?= $i ?></td>
        <td><?= $value['entry_date'] ?></td>
        <td><?= $value['association'] ?></td>
        <td><?= $value['num_rows'] ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>

    </table>

<?php break; ?>


<?php case 7: ?>
<?php //script for showing sub aggregator

        $count_per_subA = $db->createCommand("SELECT date(entry_date) entry_date, UPPER(trim(sub_aggregator)) AS sub_aggregator, count(*) as num_rows
        FROM mv_boi_data
        where date(entry_date) between '".$sdate."' and '".$edate."'
        group by date(entry_date) , UPPER(trim(sub_aggregator))
        order by 1 desc,3 desc")
        ->queryAll();
     ?>
    <h3>Count Per Day per Sub Aggregator<h3/>
    <table class='table'>
    <tr>
        <th>ID</th>
        <th>DATE</th>
        <th>SUB AGGREGATOR</th>
        <th>CALL COUNT</th>
    </tr>
    <?php
    $i = 1;
    foreach ($count_per_subA as $key => $value): ?>
    <tr>
    <td><?= $i ?></td>
    <td><?= $value['entry_date'] ?></td>
    <td><?= $value['sub_aggregator'] ?></td>
    <td><?= $value['num_rows'] ?></td>
    </tr>

    <?php $i++; endforeach; ?>
</table><br>

<?php
$count_subA_monthly = $db->createCommand("SELECT date_format(entry_date,'%Y-%m'), concat(monthname(entry_date),'-',year(entry_date)) entry_date,UPPER(trim(sub_aggregator)) AS sub_aggregator, count(*) as num_rows
    FROM mv_boi_data
    group by date_format(entry_date,'%Y-%m'), concat(monthname(entry_date),'-',year(entry_date)) ,UPPER(trim(sub_aggregator))
    order by 1 desc,4")
    ->queryAll();
 ?>
    <h3>Monthly Summary per Sub Aggregator as at <?= $today_pretty ?><h3/>
    <table class='table'>
    <tr>
    <th>ID</th>
    <th>MONTH</th>
    <th>SUB AGGREGATOR</th>
    <th>CALL COUNT</th>
    </tr>
    <?php
    $i = 1;
    foreach ($count_subA_monthly as $key => $value): ?>
      <tr>
      <td><?= $i ?></td>
      <td><?= $value['entry_date'] ?></td>
      <td><?= $value['sub_aggregator'] ?></td>
      <td><?= $value['num_rows'] ?></td>
      </tr>
<!-- //scripts for displaying count Per  sub aggr ENDS HERE  -->
    <?php $i++; endforeach; ?>

  </table><br>

  <?php break; ?>


<?php case 8: ?>
  <!-- //scripts for displaying count Per Data SOURCES -->
  <?php $count_per_state = $db->createCommand(" SELECT upper(trim(state)) as state, count(*) as num_rows FROM mv_boi_data
        where date(entry_date) between '".$sdate."' and '".$edate."'
        group by upper(trim(state))
        order by 2 desc")->queryAll(); ?>

    <h3>Count Per State<h3/>
    <table class='table'>
    <tr>
    <th>ID</th>
    <th>STATE</th>
    <th>CALL COUNT</th>
    </tr>

    <?php $i = 1;
     foreach ($count_per_state as $key => $value): ?>
     <tr>
     <td><?= $i?></td>
     <td><?= $value['state'] ?></td>
     <td><?= $value['num_rows'] ?></td>
     </tr>


    <?php $i++; endforeach; ?><tr>
    </table><BR>


      <!-- //scripts for displaying count Per Data SOURCES ENDS HERE -->
  <?php break; ?>

<?php case 9: ?>
  <!-- //scripts for displaying count per Agent  -->
<?php
$count_per_agent = $db->createCommand("SELECT date(a.entry_date) entry_date, concat(first_name,' ',last_name) as created_by, count(*) num_rows
                      from hgsf_conversations a join user b on  (a.user_id=b.id)
                      where a.call_type_id = 1 AND date(a.entry_date) between '{$sdate}' and '{$edate}'
                      group by date(a.entry_date) , created_by
                      order by 1 desc, 3 desc")
                      ->queryAll();
  ?>
<h3>CC Agent Total Entry Count <h3/>
<table class='table'>
    <tr>
        <th>ID</th>
        <th>DATE</th>
        <th>CC AGENT</th>
        <th>CALL COUNT</th>
    </tr>
<?php
$i = 1;
foreach ($count_per_agent as $key => $value): ?>
  <tr>
      <td><?= $i ?></td>
      <td><?= $value['entry_date'] ?></td>
      <td><?= $value['created_by'] ?></td>
      <td><?= $value['num_rows'] ?></td>
  </tr>
      <?php $i++; ?>
<?php endforeach; ?>
    </table>

<?php
//CC Agent Call Per Product
$per_product = $db->createCommand("SELECT date(a.entry_date) entry_date, concat(b.first_name, ' ',b.last_name) created_by, c.product_name,
                        count(*) num_rows
                      from hgsf_conversations a join user b on  (a.user_id=b.id)
                      join hgsf_product c on (a.product_id=c.id)
                      where a.call_type_id = 1 AND  date(a.entry_date) between '{$sdate}' and '{$edate}'
                      group by date(a.entry_date) , a.user_id, a.product_id
                      order by 1 desc, 3 desc, 4 desc")
                      ->queryAll();
  ?>

    <h3>CC Agent Call Per Product<h3/>
<table class='table'>
    <tr>
        <th>ID</th>
        <th>DATE</th>
        <th>CC AGENT</th>
        <th>PRODUCT</th>
        <th>CALL COUNT</th>
    </tr>
<?php
$i = 1;
foreach ($per_product as $key => $value): ?>
  <tr>
      <td><?= $i ?></td>
      <td><?= $value['entry_date'] ?></td>
      <td><?= $value['created_by'] ?></td>
      <td><?= $value['product_name'] ?></td>
      <td><?= $value['num_rows'] ?></td>
  </tr>
      <?php $i++; ?>
<?php endforeach; ?>
    </table>

<?php
//CC Agent Call Per Source
$per_source = $db->createCommand("SELECT date(a.entry_date) entry_date, concat(b.first_name, ' ',b.last_name) created_by, c.source_name,
                        count(*) num_rows
                      from hgsf_conversations a join user b on  (a.user_id=b.id)
                      join hgsf_entry_source c on (a.entry_source_id=c.id)
                      where a.call_type_id = 1 AND date(a.entry_date) between '{$sdate}' and '{$edate}'
                      group by date(a.entry_date) , a.user_id, a.entry_source_id
                      order by 1 desc, 4 desc")
                      ->queryAll();
  ?>

    <h3>CC Agent Call Per Source<h3/>
<table class='table'>
    <tr>
        <th>ID</th>
        <th>DATE</th>
        <th>CC AGENT</th>
        <th>SOURCE</th>
        <th>CALL COUNT</th>
    </tr>
<?php
$i = 1;
foreach ($per_source as $key => $value): ?>
  <tr>
      <td><?= $i ?></td>
      <td><?= $value['entry_date'] ?></td>
      <td><?= $value['created_by'] ?></td>
      <td><?= $value['source_name'] ?></td>
      <td><?= $value['num_rows'] ?></td>
  </tr>
      <?php $i++; ?>
<?php endforeach; ?>
    </table>

    <!-- //scripts for displaying count per Agent ENDS HERE -->
  <?php break; ?>

  <?php case 9.5: ?>

    <!-- //scripts for displaying count per Agent  -->
  <?php
  $count_per_agent_per_day = $db->createCommand("SELECT date(created_on) entry_date, concat(first_name,' ',last_name) as created_by, count(*) num_rows,
                      sum(case when a.status = 1 then 1 else 0 end) accepted,
                      sum(case when a.status = 0 then 1 else 0 end) rejected,
                      sum(case when a.status = 2 then 1 else 0 end) unsettled,
                      sum(case when a.status = 3 then 1 else 0 end) voicemail,
                      sum(case when a.status = 4 then 1 else 0 end) flash
                      from tm_verification_history a join user b on  (a.user_id=b.id)
                      where date(a.created_on) between '{$sdate}' and '{$edate}'
                      group by 1 , 2
                      order by 1 desc, 3 desc")
                        ->queryAll();
  // $count_per_agent_month = $db->createCommand("SELECT DATE_FORMAT(created_on,'%Y-%m'),
  //                     concat(monthname(created_on),'-',year(created_on)) created_on, username as created_by, count(*) num_rows
  //                     from tm_verification a join user b on  (a.user_id=b.id)
  //                     where date(a.created_on) between '{$sdate}' and '{$edate}' OR
  //                     concat(year(created_on),'-',month(created_on)) = '{$sdate}' and '{$edate}'
  //                     group by 1 , 4
  //                     order by 1 desc, 3 desc")
  //                       ->queryAll();
    ?>
  <h3>Agent Total Entry Count <h3/>
  <table class='table'>
      <tr>
          <!-- <th>ID</th> -->
          <th>DATE</th>
          <th>CC AGENT</th>
          <th>CALL COUNT</th>
          <th>ACCEPTED</th>
          <th>REJECTED</th>
          <th>INCONCLUSIVE</th>
          <th>VOICE MAIL</th>
          <th>FLASH</th>
      </tr>
  <?php
  $i = 1;
  foreach ($count_per_agent_per_day as $key => $value): ?>
    <tr>
        <!-- <td><?= $i ?></td> -->
        <td><?= $value['entry_date'] ?></td>
        <td><?= $value['created_by'] ?></td>
        <td><?= $value['num_rows'] ?></td>
        <td><?= $value['accepted'] ?></td>
        <td><?= $value['rejected'] ?></td>
        <td><?= $value['unsettled'] ?></td>
        <td><?= $value['voicemail'] ?></td>
        <td><?= $value['flash'] ?></td>
    </tr>
        <!-- <?php  $i++; ?> -->
  <?php endforeach; ?>
      </table>

<?php break; ?>

<?php case 10: ?>
  <!-- //scripts for displaying Loan Report Issue  -->


  <?php
$customer_claim = $db->createCommand("select UPPER(a.customer_name) customer_name, a.phone_number, a.bank, sum(a.amount_due) amount_d, sum(a.amount_paid) amount_p, sum(b.amount_paid) customer_claim
 FROM hgsf a JOIN `hgsf_conversations` b ON a.`phone_number` =b.phone_no WHERE b.category_id = 4
 group by 1,2, 3
 order by 3 desc;")->queryAll();
   ?>
   <br><br>
    <h3>Claim Per Customer<h3/>
    <table class='table table-responsive table-striped table-hover'>
    <tr>
        <th>ID</th>
        <th>CALLER NAME</th>
        <th>PHONE NUMBER</th>
        <th>BANK</th>
        <th>HGSF AMOUNT DUE</th>
        <th>HGSF AMOUNT REPAID</th>
        <th>CALLER CLAIM</th>
    </tr>
    <?php $i = 1; ?>
<?php foreach ($customer_claim as $key => $value): ?>
  <tr>
    <td><?=  $i ?></td>
    <td><?= $value['customer_name'] ?></td>
    <td><?= $value['phone_number'] ?></td>
    <td><?= $value['bank'] ?></td>
    <td><?= number_format($value['amount_d'],2) ?></td>
    <td><?= number_format($value['amount_p'],2) ?></td>
    <td><?= number_format($value['customer_claim'],2) ?></td>
    </tr>
  <?php  $i++; ?>
<?php endforeach; ?>
    </table>


    

  <!-- //scripts for displaying Loan Report Issue ENDS HERE -->

  <?php break; ?>


<?php case 11: ?>
<!-- //scripts for displaying Issues per category  -->
    <!-- //t5L&Rec Issues -->
  <?php   $state_top5 = $db->createCommand("SELECT a.state, count(*) c FROM  hgsf a JOIN `hgsf_conversations` b ON a.`phone_number` = b.phone_no 
 group by 1 
 order by 2 desc")->queryAll();
   ?>
<br>
   <h3>Count of Issues Per State<h3/>
    <table class='table'>
    <tr>
    <th>ID</th>
    <th>STATE</th>
    <th> COUNT</th>
    </tr>
    <?php $i = 1 ?>
    <?php foreach ($state_top5 as $key => $value): ?>
      <tr>
          <td> <?= $i ?></td>
          <td><?=  $value['state'] ?></td>
          <td><?=  $value['c'] ?></td>
          </tr>
        <?php $i++ ?>
    <?php endforeach; ?>

      </table>

    <?php   $loan_rec_top5 = $db->createCommand("SELECT b.comments, count(*) as num_rows FROM hgsf_conversations a
  JOIN hgsf_comment b ON (a.comment_id=b.id)
        where a.call_type_id = 1 AND date(entry_date) between '{$sdate }' and '{$edate}' and a.category_id = 1
        group by a.comment_id
        order by 2 DESC
        limit 5")->queryAll();
   ?>
   
    <h3>Top 5 Enquiry<h3/>
    <table class='table'>
    <tr>
    <th>ID</th>
    <th>COMMENT</th>
    <th>CALL COUNT</th>
    </tr>
    <?php $i = 1 ?>
    <?php foreach ($loan_rec_top5 as $key => $value): ?>
      <tr>
          <td> <?= $i ?></td>
          <td><?=  $value['comments'] ?></td>
          <td><?=  $value['num_rows'] ?></td>
          </tr>
        <?php $i++ ?>
    <?php endforeach; ?>

      </table>
    <?php
    //top5 DTA issues
    $dta_top5 = $db->createCommand("SELECT b.comments, count(*) as num_rows FROM hgsf_conversations a
    JOIN hgsf_comment b ON (a.comment_id=b.id)
        where a.call_type_id = 1 AND date(entry_date) between '{$sdate}' and '{$edate}' and a.category_id = 2
        group by a.comment_id
        order by 2 DESC
        limit 5")->queryAll();
    ?>
    <h3>Top 5 General Complaints<h3/>
    <table class='table'>
    <tr>
        <th>ID</th>
        <th>COMMENT</th>
        <th>CALL COUNT</th>
    </tr>
    <?php $i = 1 ?>
<?php foreach ($dta_top5 as $value): ?>
  <tr>
      <td> <?= $i ?></td>
      <td><?=  $value['comments'] ?></td>
      <td><?=  $value['num_rows'] ?></td>
      </tr>
      <?php $i++ ?>
<?php endforeach; ?>
</table>
  <!-- //top5 Aggregator issues -->
<?php $agg_top5 = $db->createCommand("SELECT b.comments, count(*) as num_rows FROM hgsf_conversations a
  JOIN hgsf_comment b ON (a.comment_id=b.id)
    where a.call_type_id = 1 AND date(entry_date) between '{$sdate}' and '{$edate}' and a.category_id = 3
    group by a.comment_id
    order by 2 DESC
    limit 5")->queryAll();
 ?>

    <h3>Top 5 Caterer Complaints<h3/>
    <table class='table'>
    <tr>
    <th>ID</th>
    <th>COMMENT</th>
    <th>CALL COUNT</th>
    </tr>
    <?php $i = 1 ?>
<?php foreach ($agg_top5 as $key => $value): ?>
  <tr>
      <td> <?= $i ?></td>
      <td><?=  $value['comments']  ?></td>
      <td><?=  $value['num_rows']  ?></td>
    </tr>
  <?php $i++ ?>
<?php endforeach; ?>
      </table>


   
<?php
    //t5kwikcash
    $kwikcash = $db->createCommand("SELECT b.comments, count(*) as num_rows FROM hgsf_conversations a
    JOIN hgsf_comment b ON (a.comment_id=b.id)
        where a.call_type_id = 1 AND date(entry_date) between '{$sdate}' and '{$edate}' and a.category_id = 4
        group by a.comment_id
        order by 2 DESC
        limit 5")->queryAll();
?>
    <h3>Top 5 Reconciliation Issues<h3/>
    <table class='table'>
    <tr>
    <th>ID</th>
    <th>COMMENT</th>
    <th>CALL COUNT</th>
    </tr>
  <?php $i = 1 ?>
<?php foreach ($kwikcash as $key => $value): ?>
  <tr>
  <td> <?= $i ?></td>
  <td><?=  $value['comments']  ?></td>
  <td><?=  $value['num_rows']  ?></td>
  </tr>
<?php $i++ ?>
<?php endforeach; ?>

    </table>

  <!-- //scripts for displaying issues per category ENDS HERE -->
  <?php break; ?>


<?php case 12: ?>
<?php
//general complaints
   $gen_complaints = $db->createCommand("SELECT b.comments, count(*) as num_rows
       FROM hgsf_conversations a JOIN hgsf_comment b ON (a.comment_id=b.id)
       where a.call_type_id = 1 AND date(entry_date) between '$sdate' and '$edate'
       group by a.comment_id
       order by count(*) DESC ")->queryAll();
?>

   <h3>General Complaints<h3/>
   <table class='table'>
   <tr>
   <th>ID</th>
   <th>COMPLAINTS</th>
   <th>CALL COUNT</th>
   </tr>
   <?php $i = 1 ?>
   <?php foreach ($gen_complaints as $key => $value): ?>
     <tr>
     <td><?=  $i ?></td>
     <td><?=  $value['comments'] ?></td>
     <td><?= $value['num_rows'] ?></td>
     </tr>
    <?php $i++ ?>
   <?php endforeach; ?>

 </table><br>
 <!-- //general complaints end here -->
  <?php break; ?>


<?php case 13: ?>
<?php
//fraud scripts starts here
$fraud_list = $db->createCommand("SELECT customer_name, phone_number, association, sub_aggregator, agent_name, entry_date, cc_agent_name
FROM mv_boi_data
    where date(entry_date) between '{$sdate}' and '{$edate}' and fraud_status = 'Fraud' ")
    ->queryAll();
?>


<h3>Suspected Fraud List<h3/>
<table class='table table-responsive'>
<tr>
<th>ID</th>
<th>CUSTOMER NAME</th>
<th>PHONE NUMBER</th>
<th>ASSOCIATION</th>
<th>SUB AGGREGATOR</th>
<th>AGENT NAME</th>
<th>CC AGENT</th>
</tr>
<?php $i = 1 ?>
<?php foreach ($fraud_list as $key => $value): ?>
  <tr>
  <td><?= $i ?></td>
  <td><?= $value['customer_name'] ?></td>
  <td><?= $value['phone_number'] ?></td>
  <td><?= $value['association'] ?></td>
  <td><?= $value['sub_aggregator'] ?></td>
  <td><?= $value['agent_name'] ?></td>
  <td><?= $value['cc_agent_name'] ?></td>
  </tr>
 <?php $i++ ?>
<?php endforeach; ?>

    </table><BR>

  <?php break; ?>


<?php case 14: ?>
<!-- Scripts for outbound calls -->
    <?php
    $per_agent = $db->createCommand("SELECT
        created_by,
        (select count(*) from unaccepted_loans_calls x
          where x.created_by = a.created_by and date(created_on) between '{$sdate}' and '{$edate}' and (
                              upper(agent_comment)  like 'CUSTOMER DID NOT PICK' or
                      upper(agent_comment)  like 'INCORRECT NUMBERS' or
                      upper(agent_comment)  like 'INCORRECT NUMBER' or
                      upper(agent_comment)  like 'WRONG NUMBER' or
                              upper(comment) = 'NUMBER NOT AVAILABLE' )
        ) failed,
        count(*)- (select count(*) from unaccepted_loans_calls x
          where x.created_by = a.created_by and date(created_on) between '{$sdate}' and '{$edate}' and (
                              upper(agent_comment)  like 'CUSTOMER DID NOT PICK' or
                      upper(agent_comment)  like 'INCORRECT NUMBERS' or
                      upper(agent_comment)  like 'INCORRECT NUMBER' or
                      upper(agent_comment)  like 'WRONG NUMBER' or
                              upper(comment) = 'NUMBER NOT AVAILABLE' )
        ) success,
                count(*) total
      from unaccepted_loans_calls a
      where date(created_on) between '{$sdate}' and '{$edate}'
      group by
        created_by
      order by 3 desc")->queryAll();
   ?>

    <h3>Count Per Agent<h3/>
    <table class='table'>
    <tr>
    <th>ID</th>
    <th>CC AGENT</th>
    <th>SUCCESSFUL</th>
    <th>UNSUCCESSFUL</th>
    <th>TOTAL</th>
    </tr>
    <?php $i = 1 ?>
  <?php foreach ($per_agent as $key => $value): ?>
    <tr>
    <td><?= $i ?></td>
    <td><?= $value['created_by'] ?></td>
    <td><?= $value['success'] ?></td>
    <td><?= $value['failed'] ?></td>
    <td><?= $value['total'] ?></td>
    </tr>
    <?php $i++ ?>
  <?php endforeach; ?>

     </table><BR>


  <?php
    $count_per_response = $db->createCommand("select
        case
        when (agent_comment is null or agent_comment = '') and UPPER(comment) = 'OTHERS' then 'NOT AVAILABLE'
        when upper(comment)='OTHERS' then upper(agent_comment)
        else upper(comment)
        end as a_comment,
        count(*) as num_rows
      from unaccepted_loans_calls
        where date(created_on) between '{$sdate}' and '{$edate}'
      group by case
        when (agent_comment is null or agent_comment = '') and UPPER(comment) = 'OTHERS' then 'NOT AVAILABLE'
        when upper(comment)='OTHERS' then upper(agent_comment)
        else upper(comment)
        end
      order by 2 desc")->queryAll();
?>
    <h3>Count Per Response<h3/>
    <table class='table'>
    <tr>
    <th>ID</th>
    <th>RESPONSE</th>
    <th>CALL COUNT</th>
    </tr>
    <?php $i = 1 ?>
    <?php foreach ($count_per_response as $key => $value): ?>

      <tr>
      <td><?= $i ?></td>
      <td><?= $value['a_comment'] ?></td>
      <td><?= $value['num_rows'] ?></td>
      </tr>

    <?php $i++ ?>
    <?php endforeach; ?>

     </table><BR>
  <!-- //scripts for displaying outbound ENDS HERE -->
  <?php break; ?>

<!-- recovery analytics report begin-->
<?php case 16: ?>
  <?php
  //scripts for displaying amount recovered so far
  $amt_repaid = $db->createCommand("SELECT sum(payment_after_call) as total_repaid FROM tm_analyzer")
                   ->queryAll();
  $date_amt_repaid = $db->createCommand("SELECT sum(payment_after_call) as amt_repaid FROM tm_analyzer_logs
                                        where date(trig_event_date)  between '{$sdate}' and '{$edate}'")
                        ->queryAll();
  ?>
  <!-- <h3>Total Amount Recovered so Far</h3>
  <div style="font-weight:bold; text-align:center; color:#fff;">
    <?php foreach ($amt_repaid as $values): ?>
      <div><?php echo '&#8358'.' '.(number_format($values['total_repaid'])); ?></div>
    <?php endforeach; ?>
  </div> -->

  <h3><?= 'Total Amount Recovered' ?></h3>
  <div style="font-weight:bold; text-align:center; color:#fff;">
    <?php foreach ($date_amt_repaid as $values): ?>
      <div><?php echo '&#8358'.' '.number_format($values['amt_repaid']); ?></div>
    <?php endforeach; ?>
  </div>
<?php break; ?>


<!-- scripts for displaying total count of people paid -->
<?php case 17: ?>
<?php
$count_paid = $db->createCommand("SELECT count(*) as count from tm_analyzer_logs
                                        where date(trig_event_date)  between '{$sdate}' and '{$edate}'")
          ->queryAll();
?>

<h3>Total Count of People Paid so Far</h3>
<div style="font-weight:bold; text-align:center; color:#fff;">
<?php foreach ($count_paid as $values): ?>
<div><?php echo number_format($values['count']); ?></div>
<?php endforeach; ?>
</div>
<?php break; ?>

<!-- scripts for displaying count of people paid so far by state -->
<?php case 18: ?>
<?php
$count_paid_state = $db->createCommand("SELECT b.state as state, count(a.phone) as count from tm_analyzer_logs a
                                        join gcc_whtl b on a.phone = b.phone
                                        where date(a.trig_event_date)  between '{$sdate}' and '{$edate}'
                                        group by b.state")
          ->queryAll();
?>
<h3>Beneficiary Count of Loan Repayment by State</h3>
<table class='table' style="font-weight:bold; color:#fff;">
  <tr>
    <th>S/N</th>
    <th>State</th>
    <th>Count</th>
  </tr>
  <?php
  $i = 1;
  foreach ($count_paid_state as $key => $value): ?>
  <tr>
    <td><?= $i ?></td>
    <td><?= $value['state'] ?></td>
    <td><?= number_format($value['count']) ?></td>
  </tr>
  <?php  $i++; ?>
  <?php endforeach; ?>
</table>
<?php break; ?>

<!-- scripts for displaying count of people paid so far by region -->
<?php case 19: ?>
<?php
$count_paid_reg = $db->createCommand("SELECT b.region as region, count(a.phone) as count from tm_analyzer_logs a
                  join gcc_whtl b on a.phone = b.phone
                  where date(a.trig_event_date)  between '{$sdate}' and '{$edate}'
                  group by b.region")
          ->queryAll();
?>

<h3>Beneficiary Count of Loan Repayment by Region</h3>
<table class='table' style="font-weight:bold; color:#fff;">
  <tr>
    <th>S/N</th>
    <th>Region</th>
    <th>Count</th>
  </tr>
  <?php
  $i = 1;
  foreach ($count_paid_reg as $key => $value): ?>
  <tr>
    <td><?= $i ?></td>
    <td><?= $value['region'] ?></td>
    <td><?= number_format($value['count']) ?></td>
  </tr>
  <?php  $i++; ?>
  <?php endforeach; ?>
</table>
<?php break; ?>

<!-- scripts for displaying count of people paid so far by clusterlocation -->
<?php case 20: ?>
<?php
$count_paid_loc = $db->createCommand("SELECT b.cluster_location as location, count(a.phone) as count from tm_analyzer_logs a
                  join gcc_whtl b on a.phone = b.phone
                  where date(a.trig_event_date)  between '{$sdate}' and '{$edate}'
                  group by b.cluster_location")
          ->queryAll();
?>

<h3>Beneficiary Count of Loan Repayment by Cluster Location</h3>
<table class='table' style="font-weight:bold; color:#fff;">
  <tr>
    <th>S/N</th>
    <th>Location</th>
    <th>Count</th>
  </tr>
  <?php
  $i = 1;
  foreach ($count_paid_loc as $key => $value): ?>
  <tr>
    <td><?= $i ?></td>
    <td><?= $value['location'] ?></td>
    <td><?= number_format($value['count']) ?></td>
  </tr>
  <?php  $i++; ?>
  <?php endforeach; ?>
</table>
<?php break; ?>

<!-- scripts for displaying count of people paid so far by paymenttype -->
<?php case 21: ?>
<?php
$count_paid_paytype = $db->createCommand("SELECT
                    sum(case when a.question_c ='' then 1 else 0 end) 'No Payment',
                    sum(case when a.question_c ='Anyone' then 1 else 0 end) 'Anyone',
                    sum(case when a.question_c ='Interswitch Pay-direct' then 1 else 0 end) 'Interswitch Pay-direct',
                    sum(case when a.question_c ='TraderMoni Scratch Card' then 1 else 0 end) 'TraderMoni Scratch Card'
                    from tm_conversations a
                    join tm_analyzer b on a.phone = b.phone")
                    ->queryAll();
?>
<h3>Beneficiary Count of Loan Repayment by Payment Type</h3>
<table class='table' style="font-weight:bold; color:#fff;">
  <tr>
    <th>S/N</th>
    <th>No Payment</th>
    <th>Anyone</th>
    <th>Interswitch Pay-direct</th>
    <th>TraderMoni Scratch Card</th>
  </tr>
  <?php
  $i = 1;
  foreach ($count_paid_paytype as $key => $value): ?>
  <tr>
    <td><?= $i ?></td>
    <td><?= $value['No Payment'] ?></td>
    <td><?= $value['Anyone'] ?></td>
    <td><?= $value['Interswitch Pay-direct'] ?></td>
    <td><?= $value['TraderMoni Scratch Card'] ?></td>
  </tr>
  <?php  $i++; ?>
  <?php endforeach; ?>
</table>
<?php break; ?>

<!-- scripts for displaying count of people paid so far by gender -->
<?php case 22: ?>
<?php
$count_paid_gen = $db->createCommand("SELECT b.gender as gender, count(a.phone) as count from tm_analyzer_logs a
                                    join gcc_whtl b on a.phone = b.phone
                                    where date(a.trig_event_date)  between '{$sdate}' and '{$edate}'
                                    group by b.gender")
          ->queryAll();
?>
<h3>Beneficiary Count of Loan Repayment by Gender</h3>
<table class='table' style="font-weight:bold; color:#fff;">
  <tr>
    <th>S/N</th>
    <th>Gender</th>
    <th>Count</th>
  </tr>
  <?php
  $i = 1;
  foreach ($count_paid_gen as $key => $value): ?>
  <tr>
    <td><?= $i ?></td>
    <td><?= $value['gender'] ?></td>
    <td><?= number_format($value['count']) ?></td>
  </tr>
  <?php  $i++; ?>
  <?php endforeach; ?>
</table>
<?php break; ?>

<!-- scripts for displaying count of people paid so far by TradeType -->
<?php case 23: ?>
<?php
$count_paid_tt = $db->createCommand("SELECT b.tradetype as tradetype, count(a.phone) as count from tm_analyzer_logs a
                  join gcc_whtl b on a.phone = b.phone
                  where date(a.trig_event_date)  between '{$sdate}' and '{$edate}'
                  group by b.tradetype")
          ->queryAll();
?>
<h3>Beneficiary Count of Loan Repayment by TradeType</h3>
<table class='table' style="font-weight:bold; color:#fff;">
  <tr>
    <th>S/N</th>
    <th>TradeType</th>
    <th>Count</th>
  </tr>
  <?php
  $i = 1;
  foreach ($count_paid_tt as $key => $value): ?>
  <tr>
    <td><?= $i ?></td>
    <td><?= $value['tradetype'] ?></td>
    <td><?= number_format($value['count']) ?></td>
  </tr>
  <?php  $i++; ?>
  <?php endforeach; ?>
</table>
<?php break; ?>

<!-- scripts for displaying count of people willing to payback -->
<?php case 24: ?>
<?php
$count_paid_back = $db->createCommand("SELECT question_a2 , count(*) as count FROM `tm_conversations`
                    where question_a2 in ('yes','no')
                    and date(entry_date)  between '{$sdate}' and '{$edate}'
                    group by question_a2")
          ->queryAll();
?>
<h3>Beneficiary Willing to Payback</h3>
<table class='table' style="font-weight:bold; color:#fff;">
  <tr>
    <th>#</th>
    <th>Payback Status</th>
    <th>Count</th>
  </tr>
  <?php
  $i = 1;
  foreach ($count_paid_back as $key => $value): ?>
  <tr>
    <td><?= $i ?></td>
    <td><?= $value['question_a2'] ?></td>
    <td><?= number_format($value['count']) ?></td>
  </tr>
  <?php  $i++; ?>
  <?php endforeach; ?>
</table>
<?php break; ?>

<!-- scripts for displaying count of call & agents perday -->
<?php case 25: ?>
<?php
$cperday = $db->createCommand("SELECT count(*) as total,
                              sum(case when call_status = 1 then 1 else 0 end) completed,
                              sum(case when call_status = 0 then 1 else 0 end) incomplete
                              FROM tm_conversations
                              where date(entry_date) between '{$sdate}' and '{$edate}'")
          ->queryAll();
$cperagent = $db->createCommand("SELECT concat(b.first_name,' ',b.last_name) as name, count(phone) Total,
                                  sum(case when a.call_status = 1 then 1 else 0 end) completed,
                                  sum(case when a.call_status = 0 then 1 else 0 end) incomplete
                                  FROM tm_conversations a
                                  join user b on b.id = a.user_id
                                  where date(a.entry_date) between '{$sdate}' and '{$edate}' group by 1 order by 2 desc")
                ->queryAll();
?>
<h3 style="color:#fff;"><?php if($sdate === $edate){
              echo 'Call Summary for '. $edate;
            }else{echo 'Call Summary Between '.$sdate.' and '.$edate; }
      ?>
</h3>
<table class="table" style="font-weight:bold; color:#fff;">
<?php foreach ($cperday as $row): ?>
    <tr>
      <th>Completed</th>
      <th>Incompleted</th>
      <th>Total </th>
    </tr>
    <tr>
      <td><?= number_format($row['completed']); ?></td>
      <td><?= number_format($row['incomplete']); ?></td>
      <td><?= number_format($row['total']); ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<h3 style="color:#fff;">Agents Call Summary</h3>
<table class="table" style="font-weight:bold; color:#fff;">
<tr>
  <th>#</th>
  <th>Name</th>
  <th>Completed</th>
  <th>Incompleted</th>
  <th>Total</th>
</tr>
<?php $i = 1;
foreach ($cperagent as $rows): ?>
<tr>
  <td><?= $i ?></td>
  <th><?= $rows['name']; ?></th>
  <td><?=  number_format($rows['completed']); ?></td>
  <td><?=  number_format($rows['incomplete']); ?></td>
  <td><?=  number_format($rows['Total']); ?></td>
</tr>
<?php  $i++; ?>
<?php endforeach; ?>
</table>
<?php break; ?>

<?php
default:
echo "<h4 style='color:red;'> If you're seeing, There's an error in ur code</h4>";

}
?>
