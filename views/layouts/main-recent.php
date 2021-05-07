<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
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
<?php $this->beginBody() ?>

<div class="wrap">
  <?php
  NavBar::begin([
      'brandLabel' => Html::img('@web/images/ebislogo1.jpg', ['alt'=>Yii::$app->name,'class'=>'img-responsive pull-left',
      'style'=>"display:inline; vertical-align: top; height:32px;"]) . "&nbsp;G.E.E.P",
      'brandUrl' => Yii::$app->homeUrl,
      'options' => [
          'class' => 'navbar navbar-fixed-top',
          // 'style' => 'background-color:#5fcf80; color:black;',
      ],
  ]);
  if (!Yii::$app->user->isGuest && User::hasRole('Admin')){
  echo Nav::widget([
      'options' => ['class' => 'navbar-nav navbar-right'],
      'items' => [
          // ['label' => 'Home', 'url' => ['/site/index']],
          ['label' => 'Quick Navigation',
          'items' => [
                 ['label' => 'Loan Reconciliation', 'url' => ['/boi/index']],
                 ['label' => 'Dta/Aggregator', 'url' => ['/casetwo/create']],
                 ['label' => 'Enquiries', 'url' => ['/enquiry/create']],
                 ['label' => 'Tradermoni Outgoing', 'url' => ['/tradermoni-outgoing/create']],
                 // ['label' => 'Fraud', 'url' => ['/fraud/create']],
        ]],

          ['label' => 'Users and permissions',
          'items' => [
                 ['label' => 'Users', 'url' => ['/user-management/user/index']],
                 ['label' => 'Roles', 'url' => ['/user-management/role/index']],
                 ['label' => 'Permissions', 'url' => ['/user-management/permission/index']],
                 ['label' => 'Permission Group', 'url' => ['/user-management/auth-item-group/index']],

        ]],
          ['label' => 'Backend Operations',
          'items' => [
                 ['label' => 'Unresolved', 'url' => ['/conversations/admin']],
                 ['label' => 'View Visit Logs', 'url' => ['/user-management/user-visit-log/index']],
                 ['label' => 'Reports', 'url' => ['/site/reports']],
                 '<div class="dropdown-divider"></div>',
                 '<div class="dropdown-header"><hr>Edit Backend Data</div>',
                 ['label' => 'Add New Comments', 'url' => ['/comment/create']],
                 ['label' => 'Add New Product', 'url' => ['/product/create']],
                 ['label' => 'Add New Entry Source', 'url' => ['/entry-source/create']],
                 ['label' => 'Add New Call Source', 'url' => ['/call-source/create']],
        ]],

          //['label' => 'Contact', 'url' => ['/site/contact']],

          Yii::$app->user->isGuest ? (
              ['label' => 'Login', 'url' => ['/user-management/auth/login']]
          ) : (
              '<li>'
              . Html::beginForm(['/user-management/auth/logout'], 'post')
              . Html::submitButton(
                  'Logout (' . Yii::$app->user->identity->username . ')',
                  ['class' => 'btn btn-link logout']
              )
              . Html::endForm()
              . '</li>'
          )
      ],
  ]);
} elseif(!Yii::$app->user->isGuest && User::hasRole('basicUserRole')){
  echo Nav::widget([
      'options' => ['class' => 'navbar-nav navbar-right'],
      'items' => [
          // ['label' => 'Home', 'url' => ['/site/index']],
          ['label' => 'Main Menu',
          'items' => [
                 ['label' => 'View Loan Reconciliation Issues', 'url' => ['/boi/index']],
                 ['label' => 'View Dta/Aggregator', 'url' => ['/casetwo/index','sort'=>'-entry_date']],
                 ['label' => 'View Enquiries', 'url' => ['/enquiry/index','sort'=>'-entry_date']],
                 // ['label' => 'Tradermoni Outgoing', 'url' => ['/tradermoni-outgoing/index']],
                 // ['label' => 'View Fraud', 'url' => ['/fraud/index','sort'=>'-entry_date']],
        ]],
          ['label' => 'Quick Navigation',
          'items' => [
                 ['label' => 'Loan Reconciliation', 'url' => ['/boi/index']],
                 ['label' => 'Create Dta/Aggregator', 'url' => ['/casetwo/create']],
                 ['label' => 'Create Enquiries', 'url' => ['/enquiry/create']],
                 ['label' => 'Tradermoni Outgoing', 'url' => ['/tradermoni-outgoing/create']],
                 // ['label' => 'Create Fraud', 'url' => ['/fraud/create']],
        ]],
          ['label' => 'Change My Password', 'url' => ['user-management/auth/change-own-password']],
          //['label' => 'Manage Account', 'url' => ['#']],
          Yii::$app->user->isGuest ? (
              ['label' => 'Login', 'url' => ['/user/login']]
          ) : (
              '<li>'
              . Html::beginForm(['/user-management/auth/logout'], 'post')
              . Html::submitButton(
                  'Logout (' . Yii::$app->user->identity->username . ')',
                  ['class' => 'btn btn-link logout']
              )
              . Html::endForm()
              . '</li>'
          )
      ],
  ]);
} elseif(!Yii::$app->user->isGuest && User::hasRole('supervisor')){
  echo Nav::widget([
      'options' => ['class' => 'navbar-nav navbar-right'],
      'items' => [

        ['label' => 'Main Menu',
        'items' => [
               ['label' => 'View Loan Reconciliation Issues', 'url' => ['/boi/index']],
               ['label' => 'View Dta/Aggregator', 'url' => ['/casetwo/index','sort'=>'-entry_date']],
               ['label' => 'View Enquiries', 'url' => ['/enquiry/index','sort'=>'-entry_date']],
               // ['label' => 'Tradermoni Outgoing', 'url' => ['/tradermoni-outgoing/index']],
               // ['label' => 'View Fraud', 'url' => ['/fraud/index','sort'=>'-entry_date']],
      ]],
          ['label' => 'Quick Navigation',
          'items' => [
                 ['label' => 'Loan Reconciliation', 'url' => ['/boi/index']],
                 ['label' => 'Create Dta/Aggregator', 'url' => ['/casetwo/create']],
                 ['label' => 'Create Enquiry', 'url' => ['/enquiry/create']],
                 // ['label' => 'Fraud', 'url' => ['/fraud/create']],
        ]],
          //['label' => 'manage Account', 'url' => ['/user/account']],
          ['label' => 'Backend Operations',
          'items' => [
                 ['label' => 'Unresolved Logs', 'url' => ['/conversations/admin']],

                 ['label' => 'Reports', 'url' => ['/site/reports']],
                 ['label' => 'Add New Comments', 'url' => ['/comment/create']],

        ]],
          // ['label' => 'Manage Account', 'url' => ['#']],
          Yii::$app->user->isGuest ? (
              ['label' => 'Login', 'url' => ['/user/login']]
          ) : (
              '<li>'
              . Html::beginForm(['/user-management/auth/logout'], 'post')
              . Html::submitButton(
                  'Logout (' . Yii::$app->user->identity->username . ')',
                  ['class' => 'btn btn-link logout']
              )
              . Html::endForm()
              . '</li>'
          )
      ],
  ]);
} else {
  echo Nav::widget([
      'options' => ['class' => 'navbar-nav navbar-right'],
      'items' => [
          ['label' => 'Home', 'url' => ['/site/index']],
          ['label' => 'Quick Navigation',
          'items' => [
                 ['label' => 'Loan Reconciliation', 'url' => ['/boi/index']],
                 ['label' => 'Dta/Aggregator', 'url' => ['/casetwo/create']],
                 ['label' => 'Enquiries', 'url' => ['/enquiry/create']],
                 ['label' => 'Fraud', 'url' => ['/fraud/create']],
        ]],
          //['label' => 'Contact', 'url' => ['/site/contact']],

          Yii::$app->user->isGuest ? (
              ['label' => 'Login', 'url' => ['/user/login']]
          ) : (
              '<li>'
              . Html::beginForm(['/user-management/auth/logout'], 'post')
              . Html::submitButton(
                  'Logout (' . Yii::$app->user->identity->username . ')',
                  ['class' => 'btn btn-link logout']
              )
              . Html::endForm()
              . '</li>'
          )
      ],
  ]);
}
  NavBar::end();
  ?>


    <div class="container">
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
    <?php } else {
  echo $content;
    } ?>
    </div>
</div>

<!-- <footer class="footer navbar-fixed-bottom"> -->
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; EBIS  <?= date('Y') ?></p>

        <p class="pull-right"><a href="<?php echo Yii::$app->request->baseUrl;  ?>/../cms" target="_blank" >EBIS NEWS HUB</a></p>
    </div>
</footer>


<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
