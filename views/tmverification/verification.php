<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AgentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Verification';
$this->params['breadcrumbs'][] = $this->title;
$formType = "verification";

?>

<div class="result-log" style="">

    <h2 align="center"><?= Html::encode($this->title) ?></h2>
    

<div class="row">
	<div class="col-md-4" ></div>
	<div class="col-md-8">
		<?php $form = ActiveForm::begin(); ?>
		
		<?=  Html::input('number', 'candidate_phone', null, ['placeholder' => 'Enter a phone number to search','class'=>'textbox col-md-12','id'=>'formatic'])   ?>

		<?= Html::submitButton('<span class="glyphicon glyphicon-search"></span>', ['class' => 'button','name'=>'agent_submit']) ?>

		<?php ActiveForm::end(); ?>
	</div>
</div>

<br>

<!-- Knowledge base session -->
	<div class="container">
		<div class="row">
		 	<div class="col-md-4">
		 		<a href="#" data-toggle="modal" data-target="#myopg"><span class="glyphicon glyphicon-user"></span> Opening Greetings </a>
		 	</div>
		 	<div class="col-md-4">
			 	<a href="#" data-toggle="modal" data-target="#mykb"><span class="glyphicon glyphicon-book"></span> knowledge Base </a>
			</div>
			<div class="col-md-4">
			 	<a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-info-sign"></span> FAQ </a>
			</div>
		 	<!-- Modal -->
		  	<?php include 'modalbody.php'?>
		</div>
	</div>
<hr style="border: 2px solid white;">

 <div class='row' id="result" style="display: none;"></div>
    
    
    <?php if (!empty($model)) {
      include 'candidatedata.php';
    } ?>

    <?php if ($not_found){
      echo "<h3 style='color:red;'>" . $not_found ."</h3>";
      echo "<hr>";
    } ?>

    
<?php include 'style.php' ?>
<?php
$script = <<< JS

$("#myform").click(function() {

  $('#result').load("index.php?r=tmverification/candidatedata&q=" + $('#candidate_phone').val().trim())
  if ($('#candidate_phone').val().trim().length==11){
       $("#result").fadeIn('600');
  }
});

JS;
$this->registerJs($script);
?>
</div>
