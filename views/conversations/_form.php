<?php
// page that renders conversations form based on conversations model
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
// https://github.com/2amigos/yii2-date-picker-widget
use dosamigos\datepicker\DatePicker;
use yii\widgets\Pjax; //ajax implentation for Yii2
// use app\models\User;
use app\models\Product;
use kartik\select2\Select2;
use app\models\EntrySource;
use app\models\CallSource;
use app\models\Comment;

/* @var $this yii\web\View */
/* @var $model app\models\Conversations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="conversations-form">

    <h6> Log a conversation about this loan.</h3><hr>

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
      <div class="col-md-6 col-xs-12">
        <?= $form->field($model, 'ticket_number')->textInput(['readonly' => true]) ?>
      </div>
      <div class="col-md-6 col-xs-12" >
        <?= $form->field($model, 'product_id')->dropdownList(ArrayHelper::map(Product::find()->all(), 'id', 'product_name'),
                                                                ['prompt'=>'Select Product..','disabled' => true]) ?>
      </div>
    </div>





    <?= $form->field($model, 'amount_paid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_paid')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        'clientOptions' => [
        'autoclose' => true,
        'format' => 'yyyy-mm-dd'
    ]
]);?>

    <?= $form->field($model, 'entry_category')->dropdownList([
        'Information correct'=>'Information correct',
        'Incorrect payment'=>'Incorrect payment',
        'Incomplete call'=>'Incomplete call','Customer does not have info'=>'Customer does not have info',
        'Upgrade Me'=>'Upgrade Me',
        'Payment made'=>'Payment made',
        'BVN'=>'BVN',
        'TraderMONI Upgrade'=>'TraderMONI Upgrade' ],
        ['prompt'=>'Select a Category...']
        ) ?>

    <?= $form->field($model, 'comment_id')->dropdownList(ArrayHelper::map(Comment::find()
    ->where(['category_id'=>1, 'status'=>1])
    ->all(), 'id', 'comments'),
    ['disabled' => true]) ?>

    <?= $form->field($model, 'other_comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_no')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'entry_source_id')->dropdownList(ArrayHelper::map(EntrySource::find()
    ->all(), 'id', 'source_name'),
    ['prompt' => 'Select Source...']) ?>

    <div id="cs" style="display:none;">
        <?= $form->field($model, 'call_source_id')->dropdownList(ArrayHelper::map(CallSource::find()
          ->where([ 'id'=>[1,2]])
        ->all(), 'id', 'name'),
        ['prompt' => 'Select Call Source...']) ?>
    </div>

    <?= $form->field($model, 'member_id')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'fraud_status')->dropdownList([
        'Not Fraud'=>'Not Fraud',
        'Fraud'=>'Fraud'
      ]) ?>
    <div id="fraud-field" style="display:none;">

      <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'agent_name')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'agent_phone_no')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'association')->textInput(['maxlength' => true]) ?>
      <?= $form->field($model, 'payment_medium')->textInput(['maxlength' => true]) ?>

    </div>

    <?= $form->field($model, 'cc_agent_action')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'ticket_status')->dropdownList(['resolved'=>'Resolved',
                                                                  'open'=>'Open']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn-save']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$script = <<< JS

$('#conversations-fraud_status').change(function () {
  if ($('#conversations-fraud_status').val() == 'Fraud') {
  $('#fraud-field').show();
} else {
  $('#fraud-field').hide();
}
});
$('#conversations-entry_source_id').change(function () {
  if ($('#conversations-entry_source_id').val() == '1') {
  $('#cs').show();
} else {
  $('#cs').hide();
}
});


JS;
$this->registerJs($script)
?>
