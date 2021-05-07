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
            <p class="card-text text-dark">Total Calls Tody</p>
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
            
              $tca = $db->createCommand("SELECT count(*) as total FROM `hgsf_conversations` where user_id = '{$userId}'")->queryAll();

                foreach($tca as $tca)
                {
                  echo '<h4 class="bold-text">'.number_format($tca['total']).'</h4>';
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
                $unra = $db->createCommand("SELECT count(*) as total FROM `hgsf_conversations` where ticket_status = 'open' and user_id = '{$userId}'")->queryAll();
                foreach($unra as $unra)
                {
                  echo '<h4 class="bold-text">'.number_format($unra['total']).'</h4>';
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

      
        <!--?php  $csa = $db->createCommand("SELECT * from hgsf_monthly_statistics limit 6")->queryAll(); ?-->
        <?php $csa = $db->createCommand("SELECT date_format(entry_date,'%Y%m') AS date_format,
                                                date_format(entry_date,'%b-%Y') AS month_year,
                                                count(phone_no) AS cnt
                                          from hgsf_conversations
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
                    <th colspan="" >Product</th>
                    <th colspan="" >Category</th>
                    <th class="text-right">Count</th>
                  </tr>
                </thead>
                
                <tbody>


                    <?php $aprod_cat = $db->createCommand("SELECT c.product_name prod, b.category_name cat, count(*) cnt FROM hgsf_conversations a
                                            join hgsf_category b on (a.category_id = b.id)
                                            join hgsf_product c on (a.product_id = c.id)
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

                <?php $acat = $db->createCommand("SELECT b.category_name cat, count(*) cnt FROM hgsf_conversations a 
                                                join hgsf_category b on a.category_id=b.id 
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
            </div>
          </div>
        </div>
      </div>
    </div>

</div>

