<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use webvimark\modules\UserManagement\models\User;
use scotthuangzl\googlechart\GoogleChart;

// include 'data.php';
// include 'gmap.php';
$this->title = 'Dashboard';

?>
<!-- partial -->
<title><?= Html::encode($this->title) ?></title>

<style>
  #mapContainer{
    position: absolute;
    top:30px;
    right: 10px;
    bottom: 10px;
    left:10px;
  }
  #map {
    width: 100%;
    height: 100%;
    border: 0px solid blue;
  }
  #data, #allData {
    display: none;
  }
  .carddy{
    box-shadow: 0 10px 15px rgba(0,0,0,0.25), 0 3px 3px rgba(0,0,0,0.22)
  }
  .carddy:hover{
    box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
    /* height: 110px;
    width:100%; */

  }
  .crdsize:hover{
    /* width: 60px;
    height: 60px; */
  }
</style>
  <h3 class="page-heading mb-4">Overview</h3>
  <div class="container" id="loadDashboard">
  <center>
  <?= Html::img('@web/images/loader2.gif', ['alt'=>'loading...','id'=>'loader', 'class'=>'img-rounded','style'=>'display:none;']);?>
  </center>
  </div>


<?php
$script = <<< JS

$(document).ready(function(){

  setTimeout(function(){
    loadDashboard();
  }, 1000);
  

  function loadDashboard(){ 
    $.ajax({
      url:"index.php?r=site/ajax",
      method:"GET",
      beforeSend: function(){
        // Show image container
        $("#loader").show();
      },
      success:function(data){
        $('#loadDashboard').html(data);
      },
      complete:function(){
          // Hide image container
          $("#loader").hide();
        }
    });
  }

});

JS;
$this->registerJs($script);
?>