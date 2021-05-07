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
            <a class="nav-link linked" style="color:#fff;" data-toggle="collapse" href="#kb" aria-expanded="false" aria-controls="sample-pages">
                <i class="fas fa-book"></i>
                <span class="menu-title" style="padding-left:10px;">Knowledge Base<i class="fa fa-sort-down" style="padding-left:15px;"></i></span>
            </a>
            <div class="collapse" id="kb" style="background-color:#6B8E23;">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link linked" style="color:#fff" href="" data-toggle='modal' data-target='#myModal1'>What is Coronavirus?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linked" style="color:#fff" href="" data-toggle='modal' data-target='#myModal2'>Symptoms of Coronavirus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linked" style="color:#fff" href="" data-toggle='modal' data-target='#myModal3'>Emergency Helplines</a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- <li class="nav-item">
            <a class="linked nav-link " href="index.php?r=enquiry/create" style="color:#fff;" >
            <i class="fas fa-plus-square"></i>
                <span class="menu-title" style="padding-left:10px;">Create Enquiry</span>
            </a>
        </li> -->
        <li class="nav-item">
            <a class="linked nav-link " href="index.php?r=complaint/create" style="color:#fff;" >
            <i class="fas fa-plus-square"></i>
                <span class="menu-title" style="padding-left:10px;">Create Ticket</span>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="linked nav-link " href="index.php?r=caterers/index" style="color:#fff;" >
            <i class="fas fa-plus-square"></i>
                <span class="menu-title" style="padding-left:10px;">Existing Caterer</span>
            </a>
        </li> -->
        <!-- <li class="nav-item">
            <a class="linked nav-link " href="index.php?r=hgsf/index" style="color:#fff;" >
            <i class="fas fa-plus-square"></i>
                <span class="menu-title" style="padding-left:10px;">Payment Reconciliation</span>
            </a>
        </li> -->
        <li class="nav-item">
            <a class="linked nav-link " href="index.php?r=site/reports" style="color:#fff;" >
            <i class="fas fa-book"></i>
                <span class="menu-title" style="padding-left:10px;">Reports</span>
            </a>
        </li>
        
        <!-- Service management -->
        <li class="nav-item">
          <a class="nav-link linked" style="color:#fff;" data-toggle="collapse" href="#Service-mgt" aria-expanded="false" aria-controls="sample-pages" >
          <i class="fas fa-dharmachakra"></i>
              <span class="menu-title" style="padding-left:10px;">Service Management<i class="fa fa-sort-down" style="padding-left:70px;"></i></span>
          </a>
          <div class="collapse" id="Service-mgt" style="background-color:#6B8E23;">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                      <a class="nav-link linked" style="color:#fff" href="index.php?r=comment/create">Add Comment</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link linked" style="color:#fff" href="index.php?r=category/create">Add Category</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link linked" style="color:#fff" href="index.php?r=sub-category/create">Add SubCategory</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link linked" style="color:#fff" href="index.php?r=product/create">Add Product</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link linked" style="color:#fff" href="index.php?r=call-source/create">Add Call Source</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link linked" style="color:#fff" href="index.php?r=entry-source/create">Add Entry Source</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link linked" style="color:#fff" href="index.php?r=user-management/user-visit-log/index">Agent Activites</a>
                  </li>
              </ul>
          </div>
        </li>

        <li class="nav-item">
        <a class="nav-link linked" data-toggle="collapse" href="#asett" aria-expanded="false" aria-controls="sample-pages" style="color:#fff;">
            <i class="fas fa-cog"></i>
            <span class="menu-title" style="padding-left:10px;">Settings<i class="fa fa-sort-down" style="padding-left:65px;"></i></span>
        </a>
        <div class="collapse" id="asett" style="background-color:#6B8E23;">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link linked" style="color:#fff" href="index.php?r=user-management/user/index">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linked" style="color:#fff" href="index.php?r=user-management/permission/index">Permissions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linked" style="color:#fff" href="index.php?r=user-management/auth-item-group/index">Permission Group</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linked" style="color:#fff" href="index.php?r=user-management/role/index">Roles</a>
                </li>
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
