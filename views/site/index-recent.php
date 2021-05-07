<style media="screen">
  body{
    background-image: url('<?php echo Yii::$app->request->baseUrl;  ?>/images/bg-img1.jpg');
  }
</style>
<link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <section class="bg-primary text-white" style="background-image: url('<?php echo Yii::$app->request->baseUrl;  ?>/images/image1.png');
      color:black;background-position: center; font-family: 'Slabo 37px', serif;">
      <div class="container text-center">
        <div class="row">
            <h1>Welcome to the EBIS CRM </h1>
      </div>
    </div>
    </section>


    <header id="services" style="background-color:#ffffff;" >
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
              <h2>Total calls today by <?= Yii::$app->user->identity->first_name; ?></h2>
  <div id="counter-agent">

  </div>
        </div>
          <div class="col-lg-6">
              <h2>Total Calls Today </h2>

              <div id = "counter" ></div>

          </div>
        </div>
      </div>
    </header>

    <header id="contact"  style="background-color:#eee;" >
      <div class="container">
        <div class="row">
          <div class = "" id="chart_div" style="width: 900px; height: 600px;"></div>
      </div>
    </header>



<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
<?php
$today_count = 0;
$script = <<< JS
// $.noConflict();
//setInterval($today_count=todayCount(), 1000);

todayCount();
agentCount();
// setInterval('todayCount()', 1000);


          var chartC3 = c3.generate({
        bindto: '#chart',
        data: {
          columns: [
            ['data1', 30, 200, 100, 400, 150, 250],
          ]
        },
        axis: {
          y: {
            label: { // ADD
              text: 'Number Of Calls For The Week',
              position: 'outer-middle'
            }
          }
          },
    });

    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
                var pid = 3;
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
