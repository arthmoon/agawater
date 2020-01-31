<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Command */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="command-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'device_id')->textInput() ?>

    <?= $form->field($model, 'input')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'output')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'executed_at')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
