<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

 ?>



<div class="navbar navbar-default navbar-fixed-top" style="background-color: #5fcf80;">
<div class="container">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
        <a style="color:#ffff" class="navbar-brand" href="<?= Url::home(true) ?>"><?= Html::img('@web/images/ebislogo1.jpg', ['alt'=>Yii::$app->name, 'style'=>'width:80px;height:45px; display:inline-block']). " G.E.E.P" ?></a>
  </div>
  <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav navbar-right">

      <!-- Notification dopdown -->
      <li class="dropdown">

    <a href="index.php?r=conversations/sla" class=""  aria-expanded="true"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>

    <!-- <ul class="dropdown-menu"></ul> -->

    </li>

      <li class="dropdown">
        <a style="color:#ffff" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Create New Records <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="index.php?r=boi/index">Loan Reconciliation</a></li>
          <li class="divider"></li>
          <li><a href="index.php?r=casetwo/create">Dta/Aggregator</a></li>
          <li class="divider"></li>
          <li><a href="index.php?r=enquiry/create">Enquiries</a></li>
          <li class="divider"></li>
          <li><a href="index.php?r=tradermoni-outgoing/create">Tradermoni Outgoing</a></li>
          <li class="divider"></li>
	<li><a href="index.php?r=tmverification/verification">Tradermoni verification</a></li>
  <li class="divider"></li>
  <li><a href="index.php?r=wlist%2Findex">TraderMoni Recovery</a></li>
  <li class="divider"></li>
        </ul>
      </li>

        <li class="dropdown">
          <a style="color:#ffff" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">View Records <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="index.php?r=conversations/index&sort=-entry_date">Loan Reconciliation</a></li>
            <li class="divider"></li>
            <li><a href="index.php?r=casetwo/index&sort=-entry_date">Dta/Aggregator</a></li>
            <li class="divider"></li>
            <li><a href="index.php?r=enquiry/index&sort=-entry_date">Enquiries</a></li>
            <li class="divider"></li>
            <li><a href="index.php?r=tradermoni-outgoing/index&sort=-entry_date">Tradermoni Outgoing</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a style="color:#ffff" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Backend Operations <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="index.php?r=conversations/admin">Unresolved</a></li>
            <li class="divider"></li>
            <li><a href="index.php?r=user-management/user-visit-log/index">View Visit Logs</a></li>
            <li class="divider"></li>
            <li><a href="index.php?r=site/reports">Reports</a></li>
            <li><a href="index.php?r=site/vreports">Reports(Verification)</a></li>
	    <li><a href="index.php?r=site/recovery-reports">Reports(Recovery)</a></li>
            <li class="divider"></li>
            <div class="dropdown-header"></div>
            <li><a href="index.php?r=comment/create">Add New Comments</a></li>
          </ul>
        </li>

      <li class="dropdown">
        <a style="color:#ffff" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"> <?= 'Welcome'. ' ' .  Yii::$app->user->identity->first_name ?> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">

          <li><a href="index.php?r=user-management/auth/change-own-password"><i class="glyphicon glyphicon-lock">&nbsp;&nbsp;</i>Change Password</a></li>
          <li style="padding-left:25px;"><?= Html::beginForm(['/user-management/auth/logout'], 'post').'<i class="glyphicon glyphicon-log-out"></i>'.' '.Html::submitButton('???ign out',['class'=>'btn btn-link']).Html::endForm(); ?>
          </li>
        </ul>
      </li>
      <!-- <li><a href="#" data-target="#login" data-toggle="modal">Sign in</a></li>
      <li class="btn-trial"><a href="#footer">Free Trail</a></li> -->
    </ul>
  </div>


</div>
</div>

<?php
$script = <<< JS


function load_notifications() {
  var view = '';
  $.ajax({
  url:"index.php?r=sla/fetch",
  method:"POST",
  data:{view:view},
  dataType:"json",
  success:function(data)
  {
    console.log(data);
  // $('.dropdown-menu').html(data.notification);
   if(data > 0)
   {
    $('span.count').html(data);
    console.log('counted');
  } else {
    console.log('no data');
  }
  }
 });
}
load_notifications();
JS;
$this->registerJs($script);
 ?>
