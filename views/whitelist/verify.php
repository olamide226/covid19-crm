<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Comment;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Verify */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="verify-form">

    <?php $form = ActiveForm::begin(); ?>
<br>
    <?= $form->field($verifier, 'candidate_id')->hiddenInput(['value' => $model->id])->label(false) ?>

    <div class="[ form-group ]">
            <br/><input type="checkbox" name="validator[]" id="fancy-checkbox-success" value="NM" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-success" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-success" class="[ btn btn-default active ]">
                    Fullname
                </label>
            </div><br>
            <input type="checkbox" name="validator[]" id="fancy-checkbox-success2" value="ST" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-success2" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-success2" class="[ btn btn-default active ]">
                    State
                </label>
            </div><br>

              <input type="checkbox" name="validator[]" id="fancy-checkbox-success3" value='LGA' />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-success3" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-success3" class="[ btn btn-default active ]">
                    LGA
                </label>
            </div><br>

              <input type="checkbox" name="validator[]" id="fancy-checkbox-success4" value='PHN' />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-success4" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-success4" class="[ btn btn-default active ]">
                    Phone Number
                </label>
            </div><br>

              <input type="checkbox" name="validator[]" id="fancy-checkbox-success5" value='GEN' />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-success5" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-success5" class="[ btn btn-default active ]">
                    Gender
                </label>
            </div><br>

              <input type="checkbox" name="validator[]" id="fancy-checkbox-success6" value='DOB' />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-success6" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-success6" class="[ btn btn-default active ]">
                    DOB
                </label>
            </div><br>

              <input type="checkbox" name="validator[]" id="fancy-checkbox-success7" value='TYP' />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-success7" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-success7" class="[ btn btn-default active ]">
                    Tradetype
                </label>

        </div><br>

              <input type="checkbox" name="validator[]" id="fancy-checkbox-success8" value='SUB' />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-success8" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-success8" class="[ btn btn-default active ]">
                    Trade SUBtype
                </label>
            </div>
        <br>

              <input type="checkbox" name="validator[]" id="fancy-checkbox-success9" value='ADD' />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-success9" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-success9" class="[ btn btn-default active ]">
                    Address
                </label>
            </div>
        </div>

  <?php  $list = [1 => 'Accept', 0 => 'Reject'];
 echo $form->field($verifier, 'status')->radioList($list,['id' => 'rad']); ?>

    <?= $form->field($verifier, 'comment_id')->dropdownList(ArrayHelper::map(Comment::find()
    ->where(['category_id'=>6, 'product_id'=>2, 'status'=>0])
    ->all(), 'id', 'comments'),['prompt'=>'Select Reason..', 'disabled' => true] )?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<style media="screen">
.form-group input[type="checkbox"] {
  display: none;
}

.form-group input[type="checkbox"] + .btn-group > label span {
  width: 20px;
}

.form-group input[type="checkbox"] + .btn-group > label span:first-child {
  display: none;
}
.form-group input[type="checkbox"] + .btn-group > label span:last-child {
  display: inline-block;
}

.form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
  display: inline-block;
}
.form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
  display: none;
}
</style>

<?php
$script = <<< JS


$('input:radio').change(
    function(){
        if ($(this).is(':checked') && $(this).val() == '0') {
            document.getElementById("verify-comment_id").disabled = false;
            console.log('now enabled');
        } else {
          document.getElementById("verify-comment_id").disabled = true;
        }
    });

JS;
$this->registerJs($script)
?>
