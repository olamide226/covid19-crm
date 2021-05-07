<?php
use yii\helpers\Html;
use webvimark\modules\UserManagement\models\User;
use miloschuman\highcharts\Highcharts;

date_default_timezone_set('Africa/Lagos');
$db = Yii::$app->db;
$today = date('Y-m-d');
$userId = Yii::$app->user->id;
?>

<div class="row">
  <!-- total customers  -->
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
    <div class="card card-statistics">
      <div class="card-body carddy crdsize" >
        <div class="clearfix">
          <div class="float-left">
            <svg width="1" height="1" >
            <?= Html::img('@web/images/Union12.svg', ['alt'=>'Customers Onboard']); ?>
            </svg>
          </div>
          <div class="float-right">
            <p class="card-text text-dark">Total Customers</p>
            <?php
              //get total customers
              $sql = ("SELECT count(*) as total FROM `hgsf` ");
              $totalCustomers = $db->createCommand($sql)->queryAll();
              foreach($totalCustomers as $totalCustomers)
              {
                // $total = $totalCustomers['total'];
                if($totalCustomers['total'] > 1000000000)
                {
                echo '<h4 class="bold-text">'.round(($totalCustomers['total']/1000000000),1).'B+ </h4>';

                }elseif($totalCustomers['total'] > 1000000)
                {
                echo '<h4 class="bold-text">'.round(($totalCustomers['total']/1000000),1).'M+ </h4>';
                }else{
                echo '<h4 class="bold-text">'.number_format($totalCustomers['total']).'</h4>';
                }
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Total Calls today -->
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
    <div class="card card-statistics">
      <div class="card-body carddy crdsize">
        <div class="clearfix">
          <div class="float-left">
            <svg width="1" height="1">
                <?= Html::img('@web/images/Union13.svg', ['alt'=>'Calls Permonth']) ?>
            </svg>
          </div>
          <div class="float-right">
            <p class="card-text text-dark">Total Calls Today</p>
            <?php
              $qq = $db->createCommand("SELECT sum(c) numrows from (
              select count(*) c from hgsf_conversations a WHERE date(a.entry_date) = CURRENT_DATE AND a.call_type_id = 1 UNION ALL
              select count(*)  c from hgsf_conversations_history b WHERE b.cbflag = 'Y' AND date(b.updated_date) = CURRENT_DATE ) as tot")->queryAll();

              foreach($qq as $qq)
              {
                if(!Yii::$app->user->isGuest )
                {
                    echo '<h4 class="bold-text">'.number_format($qq['numrows']).'</h4>';
                }
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Total Processed Call -->
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
    <div class="card card-statistics">
      <div class="card-body carddy crdsize">
        <div class="clearfix">
          <div class="float-left">
            <svg width="1" height="1">
                <?= Html::img('@web/images/Union14.svg', ['alt'=>'Processed Call']) ?>
            </svg>
          </div>
          <div class="float-right">
            <p class="card-text text-dark">Total Processed Call</p>
            <?php
                $totalCalls = $db->createCommand("SELECT sum(c) total from (
                select count(*) c from hgsf_conversations union all
                select count(*)  c from `hgsf_conversations_history` where cbflag = 'Y' ) as tot")->queryAll();

                foreach($totalCalls as $totalCalls)
                {
                  if($totalCalls['total'] > 1000000000)
                  {
                  echo '<h4 class="bold-text">'.round(($totalCalls['total']/1000000000),1).'B+ </h4>';

                  }elseif($totalCalls['total'] > 1000000)
                  {
                  echo '<h4 class="bold-text">'.round(($totalCalls['total']/1000000),1).'M+ </h4>';
                  }else{
                  echo '<h4 class="bold-text">'.number_format($totalCalls['total']).'</h4>';
                  }
                  // echo '<h4 class="bold-text">'.number_format($totalCalls['total']).'</h4>';
                }
              ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Unresolved Call Logs -->
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
    <div class="card card-statistics">
      <div class="card-body carddy crdsize">
        <div class="clearfix">
          <div class="float-left">
            <svg width="1" height="1">
                <?= Html::img('@web/images/Union15.svg', ['alt'=>'Unresolved']) ?>
            </svg>
          </div>
          <div class="float-right">
            <p class="card-text text-dark">Unresolved Call Logs</p>
            <?php
                //unresolved call
                $unresolved = $db->createCommand("SELECT count(*) as total FROM `hgsf_conversations` where ticket_status = 'open'")->queryAll();
                foreach($unresolved as $unresolved)
                {
                    echo '<h4 class="bold-text">'.number_format($unresolved['total']).'</h4>';
                }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="row">
  <div class="col-md-6 ">
    <!--monthly call Statistics highchat -->
    <div class="card">
      <div class="card-body">
        <h5 style="color:#228B22;"><span class="fa-icon"><i class="fa fa-chart-line"></i></span> Monthly Call Statistics</h5>

          <!--?php $callstats = $db->createCommand("SELECT * from hgsf_monthly_statistics order by month(date_format) limit 6")->queryAll();  ?-->
          <?php $callstats = $db->createCommand("SELECT * FROM `hgsf_monthly_statistics` limit 6")->queryAll();  ?>

          <?php  $cnt = []; $mnth = []; ?>
          <?php foreach($callstats as $cs) : ?>
          <?php
            $mnth[]= $cs['month_year'];
            $cnt[]= (int)$cs['cnt'];
          ?>
          <?php endforeach; ?>
          <!-- chart goes in here -->
          <?php
          $mnth = json_encode($mnth);
          $cnt = json_encode($cnt);
          echo Highcharts::widget([
            'options'=>'{
                "title": { "text": "" },
                "xAxis": {
                  "categories": '.$mnth.'
                },
                "yAxis": {
                  "title": { "text": "Count" }
                },
                "series": [
                  { "name": "Monthly Call Count",
                    "data": '.$cnt.',
                    "type": "areaspline",
                    "color": "#32CD32"
                  }
                ]
            }'
          ]);

          ?>
        
      </div>
    </div>

    <!-- Agents Daily Summary -->
    <div class="row" style="margin-top: 20px">
      <div class="col-md-12 ">
        <div class="card">
          <div class="card-body">
            <?php
            $agent_sum = $db->createCommand("SELECT first_name names, sum(inbound) as inbound, sum(outbound) as outbound, sum(total) as total
              from
                ( 
              SELECT 
                c.first_name,
                (select count(*) from hgsf_conversations x where x.call_type_id = 1 and date(x.entry_date)= date(a.entry_date) and (a.user_id = x.user_id)) as inbound,
                (select count(*) from hgsf_conversations y where y.call_type_id = 2 and date(y.entry_date)= date(a.entry_date) and (a.user_id = y.user_id)) as outbound,
                count(*) as total
              FROM hgsf_conversations a join user c 
              on (c.id = a.user_id)
              where date(a.entry_date) = CURRENT_DATE 
              group by c.first_name, inbound,outbound 
              union all                                   
              SELECT 
                c.first_name,
                (select count(*) from hgsf_conversations_history x where x.call_type_id = 1 and cbflag = 'Y' and (a.user_id = x.user_id)) inbound,
                (select count(*) from hgsf_conversations_history y where y.call_type_id = 2 and cbflag = 'Y' and (a.user_id = y.user_id)) outbound,
                count(*) total
              FROM hgsf_conversations_history a join user c 
              on (c.id = a.user_id)
              where cbflag = 'Y'    
              group by c.first_name, inbound,outbound
                ) as tbl                      
              group by 1 
              order by 4 desc")->queryAll();
            ?>
            <h5 style="color:#228B22"><span class="fa-icon"><i class="fa fa-user-friends"></i></span> Agents Daily Summary</h5>
            <table class="table table-striped">
              <thead>
                <tr class="" style="background-color:#98FB98;">
                  <th>#</th>
                  <th >Name</th>
                  <th >Inbound</th>
                  <!-- <th >Verification</th> -->
                  <th >Total</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach($agent_sum as $ags) : ?>
                <tr>
                  <th ><?=  $i ?></th>
                  <td><?=  $ags['names']; ?></td>
                  <td><?=  number_format($ags['inbound']); ?></td>
                  <!-- <td><?=  number_format($ags['outbound']); ?></td> -->
                  <td><?=  number_format($ags['total']); ?></td>
                </tr>
                <?php  $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6 ">
    <!-- todays call per day -->
    <div class="card">
      <div class="card-body">
        <div class="table-responsive table-sales">
          <table class="table">
            <thead>
              <tr style="background-color:#98FB98;">
                <th colspan="" >Today</th>
                <th class="text-right">Count</th>
              </tr>
            </thead>
            <?php
            $cca = $db->createCommand("
            SELECT sum(c) callcount from (
            select count(*) c from hgsf_conversations a WHERE date(a.entry_date) = CURRENT_DATE AND a.call_type_id = 1 AND a.user_id = '{$userId}' UNION ALL
            select count(*)  c from hgsf_conversations_history b WHERE b.cbflag = 'Y' AND date(b.updated_date) = CURRENT_DATE AND b.user_id = '{$userId}'  ) as tot")->queryOne();

            // $cca = $db->createCommand("SELECT count(*) as callcount FROM hgsf_conversations a JOIN user b ON a.user_id=b.id
            // where a.call_type_id = 1 and date(entry_date)= '{$today}' and a.user_id = '{$userId}'")->queryOne();
            ?>
            <tbody>
              <tr>
                <td>Call Count For <?= Yii::$app->user->identity->first_name; ?></td>
                <td class="text-right">
                  <?php echo $cca['callcount']; ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- call count per product per category -->
    <div class="row" style="margin-top: 20px">
      <div class="col-md-12 ">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive table-sales">
              <table class="table">
                <thead>
                  <tr style="background-color:#98FB98;">
                    <th colspan="" >Issue</th>
                    <th colspan="" >Category</th>
                    <th class="text-right">Count</th>
                  </tr>
                </thead>
                
                <tbody>
                    <?php $prod_cat = $db->createCommand("SELECT c.product_name prod, b.sub_category cat, count(*) cnt FROM hgsf_conversations a
                                                join hgsf_sub_category b on (a.sub_category = b.id)
                                                join hgsf_product c on (a.product_id = c.id)
                                                where date(a.entry_date) = CURRENT_DATE and a.call_type_id = 1
                                                group by 1,2
                                                order by 3 desc")->queryAll();
                    
                    ?>
                    <?php foreach($prod_cat as $prods) : ?>
                    <tr>
                      <td><?= $prods['prod']; ?></td>
                      <td><?= $prods['cat']; ?></td>
                      <td class="text-right"><?= number_format($prods['cnt']); ?></td>
                    </tr>
                    <?php endforeach; ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- All time call count per category -->
    <div class="row" style="margin-top: 20px">
      <div class="col-md-12 ">
        <div class="card">
          <div class="card-body" >
            <h5 style="color:#228B22"><span class="fa-icon"><i class="fa fa-users"></i></span> All Time Call Count Per Category </h5>

              <?php  $cat = $db->createCommand("SELECT b.category_name cat, count(*) cnt FROM hgsf_conversations a 
                                                join hgsf_category b on a.category_id=b.id 
                                                group by category_id 
                                                order by cnt desc")->queryAll(); 
              ?>

              <?php $product = []; $cnt = []; $prdt=[];?>
              <?php foreach($cat as $cats) : ?>
              <?php
                // $cnt[]= [(int)$cats['cnt']];
                // $caty[]= [$cats['cat']];

                extract($cats);

                $prdt[] = array($cat,(int)$cnt);
              ?>
              <?php endforeach; ?>
                <!--?php echo json_encode($prdt); ?-->
                <?php
                  echo Highcharts::widget([
                    'options' => [
                      'title' => ['text' => ''],
                      'plotOptions' => [
                          'pie' => [
                              'cursor' => 'pointer',
                          ],
                      ],
                      'series' => [
                          [ // new opening bracket
                              'type' => 'pie',
                              'name' => 'Call Count',
                              'data' => $prdt,
                          ] // new closing bracket
                      ],
                    ],
                  ]);
                ?>
             
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

