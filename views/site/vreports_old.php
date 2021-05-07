<?php
$this->title = 'Verification Reports';
use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
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

        <div class="row">
            <div class="col-sm-3" style="border-radius: 25px; background-color:MediumSeaGreen; background-image: linear-gradient(45deg, #00467f, #a5cc82); margin-bottom:20px;"> 
				<p class="lead">Call Reports List</p>
                <div class="list-group">
				<!--<select class='form-control'   >
					<option value='' selected='selected'>...Select Report</option>
					<option onclick='perDay()'>Count Per Day</option>
					<option onclick='perCategory()'>Count Per Category</option>
					<option onclick='perAgent()'>Count Per Agent</option>
				</select> -->
					<!-- <button class= "btn btn-default" id='perDay' onclick="change_title('Call Count Per Day', 'perDayList')">Count Per Day</button><br> -->
					<div class= "btn btn-default" id="vperMonth">Monthly Records</div><br>
					<div class= "btn btn-default" id="vperDay">Daily Records</div><br>
					<div class= "btn btn-default" id="vperAgent">Agents and Calls</div><br>
					<!-- <div class= "btn btn-default" id="perSubA">Count Per Sub-Aggregators</div><br>
					<div class= "btn btn-default" id="perSource">Count Per Source</div><br>
					<div class= "btn btn-default" id="perAgent">Count Per Agent</div><br>
					<div class= "btn btn-default" id="perLoanRec">Loan Record Issue</div><br>
					<div class= "btn btn-default" id="perComplain">Issues Per Category</div><br>
					<div class= "btn btn-default" id="perGComp">General Complaints</div><br>
					<div class= "btn btn-default" id="perFraud">Suspected Fraud List</div><br>
					<div class= "btn btn-default" id="outbound">Outbound Call Report</div><br> -->

                </div>

                <div class="site-heading text-center" style="background-color: #ffffff;">
					<h2>RealTime Summary</h2><br><br>
					<div id = "vrtSummary" ></div>
				</div>
				<br>
				<div class="site-heading text-center" style="background-color: #ffffff;">
					<h2>Daily Summary</h2><br><br>
					<div id = "vdailySum" ></div>
				</div>
				<br>
				<!-- <div class="site-heading text-center" style="background-color: #ffffff;">
					<h2>TOTAL EMAILS TODAY</h2><br><br>
					<div id = "email_count" ></div>
				</div> -->
				<br>
				<!-- <div class="site-heading text-center" style="background-color: #ffffff;">
					<h2>TOTAL CHATS TODAY</h2><br><br>
					<div id = "chat_count" ></div>
				</div>
				<br> -->
            </div>

            <div class="col-sm-8 pull-right" style="border-radius: 25px; background-color:MediumSeaGreen; background-image: linear-gradient(45deg, #00467f, #a5cc82); margin-bottom:20px;">
                <div id="dashboard" style="font-size: 60px;border-radius: 25px;"><h3>DashBoard</h3>
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
                      <div class="form-group col-sm-4" id='run_report'>

                      </div>
                </div>

                </div>
                <?= Html::img('@web/images/ajax-loader.gif', ['alt'=>'loading...','id'=>'loader', 'class'=>'img-rounded','style'=>'display:none;']);?>
	<div id='time'>
  </div>
   <div id="minutes"></div>
    <div id="result"></div><hr>

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
</script>
    <?php include 'report_scripts.php' ?>