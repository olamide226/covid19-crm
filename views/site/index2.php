
<!-- <style media="screen">
body{ background-image: url('<?php echo Yii::$app->request->baseUrl; ?>/images/cc.png');
        background-size: cover;
        min-height: 580px;
        position: relative;
}
</style> -->
<div class="banner" >
    <div class="bg-color">
      <div class="container">
        <div class="row">
          <div class="banner-text text-center">
            <div class="text-border">
              <h1 class="text-dec">ebis crm (Verification)</h1>
            </div>
            <div class="intro-para text-center quote">
              <p class="big-text">Welcome</p>
              <p class="small-text"></p>
              <a href="#organisations" class="btn get-quote">GET STARTED</a>
            </div>
            <a href="#feature" class="mouse-hover">
              <div class="mouse"></div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>


 <style media="screen">
  body{
    background-image: url('<?php echo Yii::$app->request->baseUrl;  ?>/images/ccagents.jpeg');
    background-repeat: no-repeat;
    background-position: center top;
    min-height: 580px;
    background-size:1400px 700px;
  }
</style>
<link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
 <!--Organisations-->
  <section id="organisations" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="col-md-12">
            <div class="orga-stru" id="counter-agent">

              <h1>  <div id="counter-agent">

              </div>
            </h1>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="detail-info">
            <hgroup><center>
              <h3 class="det-txt">Total calls today by </h3>
              <h4 class="sm-txt"><?= Yii::$app->user->identity->first_name; ?></h4></center>
            </hgroup>
          </div>
        </div>
      </div>
    </div>
  </section>  <!--/ Organisations-->

  <!--Organisations-->
  <section id="organisations" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-info">
            <hgroup>
              <h3 class="det-txt">Total Calls Today</h3>
            </hgroup>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-md-12">
            <div class="orga-stru" id="counter">
              <h1><div id = "counter" ></div></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><hr>
  <!--/ Organisations-->

<!--work-shop-->
  <section id="work-shop" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div  id="chart_div" style="width: 900px; height: 700px;"></div>
        </div>
      </div>
    </div>
  </section>
<!--/ work-shop-->

    <!-- <header id="contact"  style="background-color:#eee;" >
      <div class="container">
        <div class="row">
          <div class = "" id="chart_div" style="width: 900px; height: 600px;"></div>
      </div>
    </header> -->


<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
<?php
$today_count = 0;
$script = <<< JS

// $.noConflict();
//setInterval($today_count=todayCount(), 1000);

todayCount2();
agentCount2();
// setInterval('todayCount()', 1000);



    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
                var pid = 3.5;
                $.get( "index.php?r=site/stats", { pid: pid },function (result) {
                var parsed_result = JSON.parse(result);

                // Define the chart to be drawn.
                var data = google.visualization.arrayToDataTable(parsed_result);

                var options = {
                  title: 'Overall Calls by Agents',
                   isStacked:true,
                   animation:{
                      duration: 1000,
                      easing: 'out',
                    },
                 };

                // Instantiate and draw the chart.
                var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
                chart.draw(data, options);
                });
             }
             google.charts.setOnLoadCallback(drawChart);
        // setInterval(function () {
        //   google.charts.setOnLoadCallback(drawChart);
        // }, 30000);

JS;
$this->registerJs($script) ?>
