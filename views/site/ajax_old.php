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
              $sql = ("SELECT count(*) as total FROM `boi` ");
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
              select count(*) c from ecrm_conversations a WHERE date(a.entry_date) = CURRENT_DATE AND a.call_type_id = 1 UNION ALL
              select count(*)  c from ecrm_conversations_history b WHERE b.cbflag = 'Y' AND date(b.updated_date) = CURRENT_DATE ) as tot")->queryAll();

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
              $totalCalls = $db->createCommand("SELECT sum(c) + 934631 total from (
        select count(*) c from ecrm_conversations union all
        select count(*)  c from `ecrm_conversations_history` where cbflag = 'Y' ) as tot")->queryAll();

              if(!Yii::$app->user->isGuest && User::hasRole('Admin') || User::hasRole('boiBackendTeam'))
              {
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
              }elseif(Yii::$app->user->id > 1 && User::hasRole('basicUserRole') || User::hasRole('supervisor'))
              {
              $tca = $db->createCommand("SELECT count(*) as total FROM `ecrm_conversations` where user_id = '{$userId}'")->queryAll();

                foreach($tca as $tca)
                {
                  echo '<h4 class="bold-text">'.number_format($tca['total']).'</h4>';
                }
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
              $unresolved = $db->createCommand("SELECT count(*) as total FROM `ecrm_conversations` where ticket_status = 'open'")->queryAll();

              if(!Yii::$app->user->isGuest && User::hasRole('Admin') || User::hasRole('boiBackendTeam'))
              {
                foreach($unresolved as $unresolved)
                {
                  echo '<h4 class="bold-text">'.number_format($unresolved['total']).'</h4>';
                }
              }elseif(Yii::$app->user->id > 1 && User::hasRole('basicUserRole') || User::hasRole('supervisor'))
              {
              $unra = $db->createCommand("SELECT count(*) as total FROM `ecrm_conversations` where ticket_status = 'open' and user_id = '{$userId}'")->queryAll();
                foreach($unra as $unra)
                {
                  echo '<h4 class="bold-text">'.number_format($unra['total']).'</h4>';
                }
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

        <?php if(!Yii::$app->user->isGuest && User::hasRole('Admin') ) : ?>
          <!--?php $callstats = $db->createCommand("SELECT * from ecrm_monthly_statistics order by month(date_format) limit 6")->queryAll();  ?-->
          <?php $callstats = $db->createCommand("SELECT * FROM `ecrm_monthly_statistics` where date_format > 201812 limit 2,6")->queryAll();  ?>

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
        <?php endif; ?>

        <!-- basic user -->
        <?php if(Yii::$app->user->id > 1 && User::hasRole('basicUserRole') || User::hasRole('supervisor')) : ?>
        <!--?php  $csa = $db->createCommand("SELECT * from ecrm_monthly_statistics limit 6")->queryAll(); ?-->
        <?php $csa = $db->createCommand("SELECT date_format(entry_date,'%Y%m') AS date_format,
                                                date_format(entry_date,'%b-%Y') AS month_year,
                                                count(phone_no) AS cnt
                                          from ecrm_conversations
                                          where call_type_id = 1 and user_id = '{$userId}' and date_format(entry_date,'%Y%m') > 201812
                                          group by date_format(entry_date,'%Y%m'),
                                                    date_format(entry_date,'%b-%Y')
                                          order by date_format(entry_date,'%Y%m')
                                          limit 1,6")->queryAll();
        ?>

        <!-- for basic user view -->
        <?php $acnt = []; $amnth = []; $acs=[]; ?>
        <?php foreach($csa as $csas) : ?>
        <?php
          $acnt[]= [(int)$csas['cnt']];
          $amnth[]= [$csas['month_year']];
        ?>
        <?php endforeach; ?>
        <?php
        $amnth = json_encode($amnth);
        $acnt = json_encode($acnt);
        echo Highcharts::widget([
          'options'=>'{
              "title": { "text": "" },
              "xAxis": {
                "categories": '.$amnth.'
              },
              "yAxis": {
                "title": { "text": "Count" }
              },
              "series": [
                { "name": "Monthly Call Count",
                  "data": '.$acnt.',
                  "type": "areaspline",
                  "color": "#32CD32"
                }
              ]
          }'
        ]);
        ?>
        <?php endif; ?>
      </div>
    </div>

    <?php if(!Yii::$app->user->isGuest && User::hasRole('Admin') || User::hasRole('boiBackendTeam')): ?>
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
                (select count(*) from ecrm_conversations x where x.call_type_id = 1 and date(x.entry_date)= date(a.entry_date) and (a.user_id = x.user_id)) as inbound,
                (select count(*) from ecrm_conversations y where y.call_type_id = 2 and date(y.entry_date)= date(a.entry_date) and (a.user_id = y.user_id)) as outbound,
                count(*) as total
              FROM ecrm_conversations a join user c 
              on (c.id = a.user_id)
              where date(a.entry_date) = CURRENT_DATE 
              group by c.first_name 
              union all                                   
              SELECT 
                c.first_name,
                (select count(*) from ecrm_conversations_history x where x.call_type_id = 1 and cbflag = 'Y' and (a.user_id = x.user_id)) inbound,
                (select count(*) from ecrm_conversations_history y where y.call_type_id = 2 and cbflag = 'Y' and (a.user_id = y.user_id)) outbound,
                count(*) total
              FROM ecrm_conversations_history a join user c 
              on (c.id = a.user_id)
              where cbflag = 'Y'    
              group by c.first_name     
                ) as tbl                      
              group by first_name 
              order by 4 desc")->queryAll();
            ?>
            <h5 style="color:#228B22"><span class="fa-icon"><i class="fa fa-user-friends"></i></span> Agents Daily Summary</h5>
            <table class="table table-striped">
              <thead>
                <tr class="" style="background-color:#98FB98;">
                  <th>#</th>
                  <th >Name</th>
                  <th >Inbound</th>
                  <th >Verification</th>
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
                  <td><?=  number_format($ags['outbound']); ?></td>
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
    <?php endif; ?>
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
            select count(*) c from ecrm_conversations a WHERE date(a.entry_date) = CURRENT_DATE AND a.call_type_id = 1 AND a.user_id = '{$userId}' UNION ALL
            select count(*)  c from ecrm_conversations_history b WHERE b.cbflag = 'Y' AND date(b.updated_date) = CURRENT_DATE AND b.user_id = '{$userId}'  ) as tot")->queryOne();

            // $cca = $db->createCommand("SELECT count(*) as callcount FROM ecrm_conversations a JOIN user b ON a.user_id=b.id
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
                    <th colspan="" >Product</th>
                    <th colspan="" >Category</th>
                    <th class="text-right">Count</th>
                  </tr>
                </thead>
                
                <tbody>

                  <?php if(!Yii::$app->user->isGuest && User::hasRole('Admin') || User::hasRole('boiBackendTeam')): ?>

                  
                    <?php $prod_cat = $db->createCommand("SELECT c.product_name prod, b.category_name cat, count(*) cnt FROM ecrm_conversations a
                                                join ecrm_category b on (a.category_id = b.id)
                                                join ecrm_product c on (a.product_id = c.id)
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

                  <?php endif; ?>

                  <?php if(Yii::$app->user->id > 1 && User::hasRole('basicUserRole') || User::hasRole('supervisor')) : ?>

                    <?php $aprod_cat = $db->createCommand("SELECT c.product_name prod, b.category_name cat, count(*) cnt FROM ecrm_conversations a
                                            join ecrm_category b on (a.category_id = b.id)
                                            join ecrm_product c on (a.product_id = c.id)
                                            where date(a.entry_date) = CURRENT_DATE and a.call_type_id = 1 and a.user_id = '{$userId}'
                                            group by 1,2
                                            order by 3 desc")->queryAll();
                    ?>
                    <?php foreach($aprod_cat as $aprods) : ?>
                    <tr>
                      <td><?= $aprods['prod']; ?></td>
                      <td><?= $aprods['cat']; ?></td>
                      <td class="text-right"><?= number_format($aprods['cnt']); ?></td>
                    </tr>
                    <?php endforeach; ?>

                  <?php endif; ?>

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
            <h5 style="color:#228B22"><span class="fa-icon"><i class="fa fa-users"></i></span> All Time Call Count per Category </h5>

            <?php if(!Yii::$app->user->isGuest && User::hasRole('Admin') ) : ?>

              <?php  $cat = $db->createCommand("SELECT b.category_name cat, count(*) cnt FROM ecrm_conversations a 
                                                join ecrm_category b on a.category_id=b.id 
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
              <?php endif;?>

              <?php if(Yii::$app->user->id > 1 && User::hasRole('basicUserRole') || User::hasRole('supervisor')) : ?>

                <?php $acat = $db->createCommand("SELECT b.category_name cat, count(*) cnt FROM ecrm_conversations a 
                                                join ecrm_category b on a.category_id=b.id 
                                                where user_id = '{$userId}'
                                                group by category_id 
                                                order by cnt desc")->queryAll(); 
                ?>
                <?php $aprdt=[];?>
                <?php foreach($acat as $acats) : ?>
                <?php extract($acats);

                  $aprdt[] = array($cat,(int)$cnt);
                ?>
                <?php endforeach; ?>
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
                              'data' => $aprdt,
                          ] // new closing bracket
                      ],
                    ],
                  ]);
                ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Customers By State -->
    <!-- <div class="row" style="margin-top: 20px">
      <div class="col-md-12 ">
        <div class="card">
          <div class="card-body" >
            <h5 style="color:#228B22"><span class="fa-icon"><i class="fa fa-users"></i></span> Customers Called By State </h5>
            <div class="" style="height:400px; "> -->
              <?php
                // $gps = $db->createCommand("SELECT * FROM boi WHERE lat IS NULL AND lng IS NULL limit 1")->queryAll();
                // $gps = json_encode($gps, true);
                // echo '<div id="data">' . $gps . '</div>';

              //   $shw_gps = $db->createCommand("SELECT * FROM boi WHERE lat IS NOT NULL AND lng IS NOT NULL")->queryAll();
                // $shw_gps = $db->createCommand("SELECT state, lat, lng, count(*) cnt FROM boi
                //                                 where phone_number in (select phone_no from ecrm_conversations) group by state, lat, lng")
                //               ->queryAll();
                // $shw_gps = json_encode($shw_gps, true);
              //   echo '<div id="allData">' . $shw_gps . '</div>';
                // echo '<div id="allData"></div>';
              ?>
              <!-- <div id="map"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>-->
</div>



<!-- google map api -->
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB54ZIGA9BaTZKqLkZvUV6vb1UHSsvoKBc&callback=loadMap"></script> -->
<!-- script for map stats -->
<!-- <script>

  var map;
  var geocoder;

  function loadMap(){
    var nig = {lat: 9.077751, lng: 8.6774567};
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 5.4,
      center: nig
    });

    //to show all data
    var allData = JSON.parse(document.getElementById('allData').innerHTML);
    geocoder = new google.maps.Geocoder();
    showStateMarker(allData);
  }

  //function to show all data
  function showStateMarker(allData){
     var infoWind = new google.maps.InfoWindow;
    Array.prototype.forEach.call(allData, function(data){
      // var infoWind = new google.maps.InfoWindow;
      var content = document.createElement('div');
      var strong = document.createElement('strong');

      strong.textContent = data.state;
      strong.textContent += ' ';
      strong.textContent += data.cnt;
      content.appendChild(strong);

      var marker = new google.maps.Marker({
        position: new google.maps.LatLng(data.lat, data.lng),
        map: map
      });

      marker.addListener('mouseover', function(){
        infoWind.setContent(content);
        infoWind.open(map, marker);
      })

    })
  }
</script> -->
