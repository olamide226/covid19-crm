<?php
use app\assets\dashboardAsset;
dashboardAsset::register($this);
// for some reason yii2 wasn't seeing the functions on
//external js files so i wrote them here as a seperate file and included it.
// its still modularity right?
$script = <<< JS

setInterval(function(){
          rtSummary();
          
          dailySummary();
          vdailySummary();
          vrtSummary();
        },60000);//update the data count every minute

//$('html, body').animate({ scrollTop: 0 }, 'slow');

JS;
$this->registerJs($script)
?>
