<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use webvimark\modules\UserManagement\models\User;
use app\assets\front_pageAsset;

front_pageAsset::register($this);
if (isset($_GET['r'])){
  $cur_route = $_GET['r']; //gets current route
} else {
  $cur_route = "";
}
?>
<?php $this->beginPage(); $this->title = "Home | EBIS - CRM"; ?>
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
<?php $this->beginBody(); ?>


<?php if (!Yii::$app->user->isGuest && User::hasRole('Admin') ): ?>
<?php include 'admin-view.php' ?>
<?php //endif ?>
<?php elseif (!Yii::$app->user->isGuest && User::hasRole('supervisor')) :?>
      <?php include 'supervisor-view.php' ?>
      <?php //endif ?>

<?php elseif (Yii::$app->user->id > 1 && User::hasRole('boiBackendTeam')): ?>
      <?php include 'supervisor-view.php' ?>
      <?php //endif ?>

    <?php elseif (!Yii::$app->user->isGuest && User::hasRole('basicUserRole')): ?>
        <?php include 'basic-view.php' ?>
        <?php endif ?>

        <?php echo $content;  ?>

</div>

 <footer id="footer" class="footer">
    <div class="container text-center">


              <p class="pull-left">&copy; EBIS  <?= date('Y') ?></p>

            <p class="pull-right"><a href="<?php echo Yii::$app->request->baseUrl;  ?>/../cms" target="_blank" >EBIS NEWS HUB</a></p>
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
