<?php
$this->title = 'Recovery Reports';
use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
date_default_timezone_set('Africa/Lagos');
 ?>
<style media="screen">
#myBtn {
  display: none; /* Hidden by default */
   position: fixed; /* Fixed/sticky position */
   bottom: 45px; /* Place the button at the bottom of the page */
   right: 30px; /* Place the button 30px from the right */
   z-index: 99; /* Make sure it does not overlap */
   border: none; /* Remove borders */
   outline: none; /* Remove outline */
   background-color: grey; /* Set a background color */
   color: white; /* Text color */
   cursor: pointer; /* Add a mouse pointer on hover */
   padding: 15px; /* Some padding */
   border-radius: 10px; /* Rounded corners */
   font-size: 18px; /* Increase font size */
}

#myBtn:hover {
background-color: #555;
}
</style>
<div class="">

    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <div class="row" style="margin-top:10px;">
        <div class="col-sm-3">
            <div class="panel panel-success">
                <div class="panel-heading text-center"><h5><b>TM Recovery Reports</b></h5></div>
                <div class="panel-body">
                    <div class="list-group">
                        <div class= "btn btn-success r-btn"  id="cPerDay">Call Count Per Day</div>
                        <div class= "btn btn-success r-btn"  id="amtRecovery">Amount Recovered</div>
                        <div class= "btn btn-success r-btn"  id="paid">Total Count of Paid</div>
                        <div class= "btn btn-success r-btn"  id="paidState">Count of Paid per State</div>
                        <div class= "btn btn-success r-btn" id="paidReg">Count of Paid per Region</div>
                        <div class= "btn btn-success r-btn" id="paidLoc">Count of Paid per Location</div>
                        <div class= "btn btn-success r-btn"  id="paidPayType">Count of Paid per PaymentType</div>
                        <div class= "btn btn-success r-btn"  id="paidGen">Count of Paid per Gender</div>
                        <div class= "btn btn-success r-btn" id="paidTT">Count of Paid per TradeType</div>
                        <div class= "btn btn-success r-btn"  id="paidBackll">Will to Payback</div>
                    </div>
                </div>
            </div>
            <?php $db = Yii::$app->db; 
                  $today = date('Y-m-d');
                  $realtime_sum = $db->createCommand("SELECT count(*) as total,
                                        sum(case when call_status = 1 then 1 else 0 end) completed,
                                        sum(case when call_status = 0 then 1 else 0 end) incomplete 
                                        FROM tm_conversations
                                        where date(entry_date)= '".$today."' ")->queryAll();
                    //agent call count
                   $agent_sum = $db->createCommand("SELECT b.first_name as name, count(a.phone) as count FROM tm_conversations a
                                join user b on b.id = a.user_id where date(entry_date)='".$today."' group by 1 order by 2 desc")->queryAll();
            ?>

            <div class="panel panel-success">
                <div class="panel-heading text-center"><h6><b>RealTime Summary</b></h6></div>
                <div class="panel-body">
                    <div id = "rtSummary" ><?php echo  "Date: ".date('jS M Y'). "<br> Time: ".date('h:i a')."<br>"; ?></div>
                    <table class="table">
                    <?php foreach ($realtime_sum as $row): ?>
                        <tr>
                            <th>Total Call Processed:</th>
                            <td><?= number_format($row['total']); ?></td>
                        </tr>
                        <tr>
                            <th>Completed:</th>
                            <td><?= number_format($row['completed']); ?></td>
                        </tr>
                        <tr>
                            <th>Incompleted:</th>
                            <td><?= number_format($row['incomplete']); ?></td>
                        </tr>
                        <?php endforeach; ?> 
                    </table> 
                </div>              
            </div>


            <div class="panel panel-success">
                <div class="panel-heading text-center"><h6><b>Daily Summary</b></h6></div>
                <div class="panel-body">
                    <div id = "dailySum" class="text-center">Good day all.<br> Recovery Reports for<br> <?php echo  date('l,jS M Y'). "<br> Time: ".date('h:i a'); ?></div>
                    <div></div>
                    <table class="table">
                    
                <!-- <?php //$newrow = $agent_sum;
                        //if(number_format($newrow['count']) > 0 ){ echo 'Call Agents Records';} ?>  -->
                    <?php foreach ($agent_sum as $rows): ?>
                        <tr>
                            <th><?= $rows['name']; ?></th>
                            <td><?= number_format($rows['count']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-sm-8 pull-right">
            <div class="panel panel-success">
                <div class="panel-heading text-center" ><h5>DashBoard</h5></div>
                <div class="panel-body">
                    <div id="dashboard"><h3 style="font-size:20px;"></h3>
                        <div class="row">
                            <div class='form-group col-sm-4'>
                                <h5>Start Date:</h5>
                                <?= DatePicker::widget([
                                    'name' => 'sdate',
                                    'value' => date('Y-m-d'),
                                    'template' => '{addon}{input}',
                                    'clientOptions' => [
                                    'autoclose' => true,
                                    'format' => 'yyyy-mm-dd'
                                    ]
                                ]);?>
                            </div>
                            <div class='form-group col-sm-4'>
                                <h5>End Date:</h5>
                                <?= DatePicker::widget([
                                    'name' => 'edate',
                                    'value' => date('Y-m-d'),
                                    'template' => '{addon}{input}',
                                    'clientOptions' => [
                                    'autoclose' => true,
                                    'format' => 'yyyy-mm-dd'
                                ]
                                ]);?>
                            </div>
                    <div class="form-group col-sm-4" id='run_report'></div>
                    </div>
                </div>
                <?= Html::img('@web/images/ajax-loader.gif', ['alt'=>'loading...','id'=>'loader', 'class'=>'img-rounded','style'=>'display:none;']);?>
                <div id='time'></div>
                <div id="minutes"></div>
                <div id="result"></div><hr>
            </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

function timedRefresh(timeoutPeriod){
    setTimeout("location.reload(true);",timeoutPeriod);
}
//window.onload= timedRefresh(50000);
</script>