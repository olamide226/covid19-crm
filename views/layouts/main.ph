<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use webvimark\modules\UserManagement\models\User;
use app\assets\dashboardAsset;

dashboardAsset::register($this);
if (isset($_GET['r'])){
  $cur_route = $_GET['r']; //gets current route
} else {
  $cur_route = "";
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="<?= Yii::getAlias('@web')?>/images/ebislogo1.jpg" rel="shortcut icon" type="image/x-icon">
</head>
<body class = "">
<?php $this->beginBody();  ?>

<div class="navbar navbar-default navbar-fixed-top">
<div class="container">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
        <a  class="navbar-brand" href="<?= Url::base(true); ?>"><?= Html::img('@web/images/ebislogo1.jpg', ['alt'=>Yii::$app->name, 'style'=>'width:80px;height:45px; display:inline-block']). " G.E.E.P" ?></a>
  </div>
  <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav navbar-right">

      <?php if (!Yii::$app->user->isGuest && User::hasRole('supervisor')): ?>
          <?php include 'supervisor-view.php' ?>
      <?php endif ?>
      <?php if (!Yii::$app->user->isGuest && User::hasRole('basicUserRole')): ?>
      <?php include 'basic-view.php' ?>
      <?php endif; ?>
      <?php if (!Yii::$app->user->isGuest && User::hasRole('Admin')): ?>
        <?php include 'admin-view.php' ?>
      <?php endif ?>



      <li class="dropdown">
        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"> <?= 'Welcome'. ' ' .  Yii::$app->user->identity->first_name ?> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">

          <li><a href="index.php?r=user-management/auth/change-own-password"><i class="glyphicon glyphicon-lock">&nbsp;&nbsp;</i>Change Password</a></li>
          <li style="padding-left:25px;"><?= Html::beginForm(['/user-management/auth/logout'], 'post').'<i class="glyphicon glyphicon-log-out"></i>'.' '.Html::submitButton('Ṣign out',['class'=>'btn btn-link']).Html::endForm(); ?>
          </li>
        </ul>
      </li>
      <!-- <li><a href="#" data-target="#login" data-toggle="modal">Sign in</a></li>
      <li class="btn-trial"><a href="#footer">Free Trail</a></li> -->
    </ul>
  </div>

</div>
</div>
<!-- Main Body Content -->
<div class="container">
    <br><br><br><br>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
  <?php  if ($cur_route=='boi/view' || $cur_route=='enquiry/create' || $cur_route=='casetwo/create' || $cur_route=='fraud/create') {
               ?>
              <div class="row container">
                <div class="col-md-3 col-sm-3" style= 'background-color:#eeee;padding:9px 9px;'>
                  <h3 style="text-align: center;">Knowledge Base</h3>
                  <div style="margin:10px 15px;">


              <button type='button' class='btn btn-default form-control'
              data-toggle='modal' data-target='#myModal1'>HOW TO REGISTER</button><br>
              <button type='button' class='btn btn-default form-control '
              data-toggle='modal' data-target='#myModal2'>LOAN RECONCILIATION</button><br>
              <button type='button' class='btn btn-default form-control '
              data-toggle='modal' data-target='#myModal3'>LOAN OFFER SMS</button><br>
              <button type='button' class='btn btn-default form-control'
              data-toggle='modal' data-target='#myModal4'>AGGREGATOR AND DTA</button><br>
              <button type='button' class='btn btn-default form-control'
              data-toggle='modal' data-target='#myModal5'>FRAUD CASE</button><br>
              <button type='button' class='btn btn-default form-control'
              data-toggle='modal' data-target='#myModal6'>BOI INFORMATION</button><br>
              <button type='button' class='btn btn-default form-control'
              data-toggle='modal' data-target='#myModal7'>BANKS FOR PAY DIRECT</button><br>
              <button type='button' class='btn btn-default form-control'
              data-toggle='modal' data-target='#myModal8'>PAYMENTS USING ATM</button><br>
              <button type='button' class='btn btn-default form-control'
              data-toggle='modal' data-target='#myModal9'>TRADERMONI</button>
              <br>
</div>
          </div><!-- ends col 3-->
            <div class="col-md-8 col-sm-8 pull-right" style="background-color:#eeee;">

            <?= $content ?>
          </div><!--main content column -->
        </div>  <!-- ends the if statement for row  -->
        <?php include 'modal.php'; ?>
        <br><br><br><br>
        <?php } else {
        echo $content;
        } ?>
</div>

 <footer id="footer" class="footer">
    <div class="container text-center">

        <p style="padding-bottom: 10px" class="pull-left">&copy; EBIS  <?= date('Y') ?></p>

      <p style="padding-bottom: 10px" class="pull-right"><a href="<?php echo Yii::$app->request->baseUrl;  ?>/../cms" target="_blank" >EBIS NEWS HUB</a></p>
      <br>
    </div>
</footer>


<?php $this->endBody() ?>

<?php
$script = <<< JS

$('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});

JS;
$this->registerJs($script);
 ?>
</body>
</html>
<?php $this->endPage() ?>
