<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'phone')->textInput([
        'maxlength' => true,
        'autocomplete' => 'off'
    ]) ?>

    <?= $form->field($model, 'password')->passwordInput(['autocomplete' => 'off']) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'father_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput([
        'maxlength' => true,
        'autocomplete' => 'off'
    ]) ?>

    <?= $form->field($model, 'status')->widget(\kartik\select2\Select2::className(), [
        'data' => \common\models\User::getStatusList()
    ]) ?>

    <?= $form->field($model, 'role')->widget(\kartik\select2\Select2::className(), [
        'data' => \common\models\User::getRoleList()
    ]) ?>

	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
