<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\MainAsset;
use yii\helpers\Url;
use webvimark\modules\UserManagement\models\User;

MainAsset::register($this);
?>

<nav class="bg-white sidebar sidebar-offcanvas" id="sidebar" style="color:#fff; background-image: linear-gradient(45deg, #B5C15B, #32CD32);">

    <ul class="nav" >
        <li class="nav-item" style="padding-top:20px;">
        <a class="linked nav-link" href="<?= Url::home(true) ?>" style="color:#fff;" >
        <i class="fas fa-home"></i>
            <span class="menu-title" style="padding-left:10px;">Dashboard</span>
        </a>
        </li>

        <li class="nav-item">
        <a class="nav-link linked" data-toggle="collapse" href="#avrd" aria-expanded="false" aria-controls="sample-pages" style="color:#fff;">
        <i class="fas fa-eye"></i>
            <span class="menu-title" style="padding-left:10px;">View Records<i class="fa fa-sort-down" style="padding-left:25px;"></i></span>
        </a>
        <div class="collapse" id="avrd" style="background-color:#6B8E23;">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link linked" href="index.php?r=boi/index" style="color:#fff">Loan Reconciliation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linked" href="index.php?r=casetwo/index&sort=-entry_date" style="color:#fff">Loan Processing Issues</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linked" href="index.php?r=enquiry/index&sort=-entry_date" style="color:#fff">Enquiries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linked" href="index.php?r=tradermoni-outgoing/index&sort=-entry_date" style="color:#fff">Tradermoni Outgoing</a>
                </li>
            </ul>
        </div>
        </li>

        <li class="nav-item">
        <a class="nav-link linked" data-toggle="collapse" href="#abops" aria-expanded="false" aria-controls="sample-pages" style="color:#fff;">
        <i class="fas fa-dharmachakra"></i>
            <span class="menu-title" style="padding-left:10px;">Service Management <i class="fa fa-sort-down" style="padding-left:62px;"></i></span>
        </a>
        <div class="collapse" id="abops" style="background-color:#6B8E23;">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link linked" style="color:#fff" href="index.php?r=comment/create">Add New Case Type</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linked" style="color:#fff" href="index.php?r=conversations/admin">Unresolved Tickets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linked" style="color:#fff" href="index.php?r=sla">SLA Rules</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linked" style="color:#fff" href="index.php?r=user-management/user-visit-log/index">Agents Activities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linked" style="color:#fff" href="index.php?r=category/create">Add New Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linked" style="color:#fff" href="index.php?r=product/create">Add New Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linked" style="color:#fff" href="index.php?r=entry-source/create">Add New Entry Source</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linked" style="color:#fff" href="index.php?r=call-source/create">Add New Call Source</a>
                </li>
            </ul>
        </div>
        </li>
        <li class="nav-item">
        <a class="nav-link linked" data-toggle="collapse" href="#arpt" aria-expanded="false" aria-controls="sample-pages" style="color:#fff;">
        <i class="far fa-clipboard"></i>
            <span class="menu-title" style="padding-left:10px;">Reports<i class="fa fa-sort-down" style="padding-left:73px;"></i></span>
        </a>
        <div class="collapse" id="arpt" style="background-color:#6B8E23;">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link linked" style="color:#fff" href="index.php?r=site/reports">Inbound</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linked" style="color:#fff" href="index.php?r=site/vreports">Verification</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link linked" style="color:#fff" href="index.php?r=site/recovery-reports">Recovery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linked" style="color:#fff" href="http://196.200.119.205/tm-reports/">Operations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linked" style="color:#fff" href="http://196.200.119.205/audit1/web/">Audit</a>
                </li> -->
            </ul>
        </div>
        </li>
        
        <?php include 'knowledge-base.php' ?>

        <li class="nav-item">
        <a class="nav-link linked" data-toggle="collapse" href="#aset" aria-expanded="false" aria-controls="sample-pages" style="color:#fff;">
            <i class="fas fa-cog"></i>
            <span class="menu-title" style="padding-left:10px;">Settings<i class="fa fa-sort-down" style="padding-left:65px;"></i></span>
        </a>
        <div class="collapse" id="aset" style="background-color:#6B8E23;">
            <ul class="nav flex-column sub-menu">
               
                <li class="nav-item">
                <a class="nav-link linked" style="color:#fff" href="index.php?r=user-management/auth/change-own-password">Change Password</a>
                </li>
            </ul>
        </div>
        </li>

        <li class="nav-item fixed-bottom">
            <a class="nav-link linked" href="#" style="color:#fff;">
            <?= Html::beginForm(['/user-management/auth/logout'], 'post').'<i class="glyphicon glyphicon-log-out"></i>'
            .Html::submitButton('<span class="menu-title">Logout</span>',['class'=>'btn btn-link','style'=>'color:#fff; ']).Html::endForm(); ?>
            </a>
        </li>

    </ul>
  </nav>

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
