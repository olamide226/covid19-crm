<?php

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use webvimark\modules\UserManagement\models\User;

/**
 * @var $this \yii\base\View
 * @var $content string
 */
 use app\assets\AppAsset;

 AppAsset::register($this);
// $this->registerAssetBundle('app');
if (isset($_GET['r'])){
  $cur_route = $_GET['r']; //gets current route
} else {
  $cur_route = "";
}
?>
<?php $this->beginPage(); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?php echo Html::encode(\Yii::$app->name); ?> - EBIS</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $this->theme->baseUrl ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="<?php echo $this->theme->baseUrl ?>/css/mdb.min.css" rel="stylesheet">

    <!-- Template styles -->
    <link href="<?php echo $this->theme->baseUrl ?>/css/style.css" rel="stylesheet">

    <style>
      @import 'https://fonts.googleapis.com/css?family=VT323';

      body {
        background-image: url(<?php echo $this->theme->baseUrl ?>/images/pexel1.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        //background-color: #d4e4fc;
      }

      .primary-color-dark {
        background-color: rgba(113, 165, 242,0.75) !important;
      }

main div.row:first-child {
  color: #000;
}

main div.row:first-child h2 {
 font-family: 'VT323', monospace;
  font-size: 48px;
  color: rgb(0,64,0);
}

main div.row:first-child p {
  background-color: rgba(255,255,255,0.75);
  padding: 5px;
}

    </style>

</head>

<body>

<?php $this->beginBody() ?>

    <header>

        <!--Navbar-->
        <nav class="navbar navbar-dark primary-color-dark">

            <!-- Collapse button-->
            <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx">
                <i class="fa fa-bars"></i>
            </button>

            <div class="container">

                <!--Collapse content-->
                <div class="collapse navbar-toggleable-xs" id="collapseEx">
                    <!--Navbar Brand-->
                    <a class="navbar-brand" href="#" target="_blank"><?php echo Html::encode(\Yii::$app->name); ?></a>
                    <!--Links-->
                     <?php
      				        echo Menu::widget([
      				          'options' => [
      				            "id"  => "nav",
      				            "class" => "nav navbar-nav"
      				          ],
    				            'items' => [
    				              ['label' => 'Home', 'url' => ['site/index'], "options" => [ "class" => "nav-item"]],
    				              ['label' => 'Loan Reconciliation', 'url' => ['boi/index'], "options" => [ "class" => "nav-item"]],
    				              ['label' => 'Contact', 'url' => ['site/contact'], "options" => [ "class" => "nav-item"]],
    				              ['label' => 'Login', 'url' => ['site/login'], "options" => [ "class" => "nav-item"], 'visible' => Yii::$app->user->isGuest],

    ],
    'itemOptions'=>array('id'=>'item_id', 'class'=>'item_class', 'style'=>''),

      				        ]);
	  		            ?>



                    <!--Search form-->
                    <form class="form-inline">
                        <input class="form-control" type="text" placeholder="Search">
                    </form>
                </div>
                <!--/.Collapse content-->

            </div>

        </nav>
        <!--/.Navbar-->

    </header>

    <main>

        <!--Main layout-->
        <div class="container">

            <div class="row">
    <?php  if ($cur_route=='boi/view' || $cur_route=='enquiry/create' || $cur_route=='casetwo/create' || $cur_route=='fraud/create') {
                 ?>
                 <div class="row" >
                   <div class="col-md-3 col-sm-4 pull-left" style="background-color: rgba(113, 165, 242,0.75);
                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                     <h3 style="text"><span class="badge badge-secondary" style="padding:10px 10px;">Knowledge Base</span></h3><hr>

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
                 <br>

             </div><!-- ends col 3-->
             <div class="col-md-8 col-sm-8 pull-right" style="
             margin-left:50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >

     <?= $content ?>
   </div><!--main content column -->
 </div>  <!-- ends the if statement for row  -->
 <?php include 'modal.php'; ?>
<?php } else { ?>
                <div class="col-md-12">
                  <?php echo $content; ?>
                </div> <!-- page content -->
              <?php } ?>
            </div> <!-- third row -->
        </div>
        <!--/.Main layout-->

    </main>

    <!--Footer-->
    <footer class="page-footer center-on-small-only primary-color-dark">

        <!--Footer Links-->
        <div class="container-fluid">
            <div class="row">

                <!--First column-->
                <div class="col-md-3 col-md-offset-1">
                    <h5 class="title">ABOUT MATERIAL DESIGN</h5>
                    <p>Material Design (codenamed Quantum Paper) is a design language developed by Google. </p>

                    <p>Material Design for Bootstrap is a powerful Material Design UI KIT for most popular HTML, CSS, and JS framework - Bootstrap.</p>
                </div>
                <!--/.First column-->

                <hr class="hidden-md-up">


                <hr class="hidden-md-up">

                <hr class="hidden-md-up">

                <!--Fourth column-->
                <div class="col-md-2">
                    <h5 class="title">Third column</h5>
                    <ul>
                        <li><a href="#!">Link 1</a></li>
                        <li><a href="#!">Link 2</a></li>
                        <li><a href="#!">Link 3</a></li>
                        <li><a href="#!">Link 4</a></li>
                    </ul>
                </div>
                <!--/.Fourth column-->

            </div>
        </div>
        <!--/.Footer Links-->

        <hr>

        <!--Call to action-->
        <div class="call-to-action">
            <h4><?php echo Html::encode(\Yii::$app->name); ?></h4>
        </div>
        <!--/.Call to action-->

        <!--Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
               Copyright &copy; 2018 - made with <span style="color:red;">&#9829;</span> by <a href="">EBIS</a>

            </div>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->


    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="<?php echo $this->theme->baseUrl ?>/js/jquery-2.2.3.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo $this->theme->baseUrl ?>/js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo $this->theme->baseUrl ?>/js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo $this->theme->baseUrl ?>/js/mdb.min.js"></script>

    <script>
      // FIX for MDB http://i.imgur.com/WFl7fkh.jpg
      $(function(){
        $("#nav li a").addClass("nav-link");
      });
    </script>

    <?php $this->endBody(); ?>
</body>

</html>

<?php $this->endPage(); ?>
