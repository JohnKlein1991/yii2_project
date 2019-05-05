<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Publishers */
/* @var $form yii\widgets\ActiveForm */
$action = Yii::$app->controller->action->id;
?>

<div class="publishers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if(!$action){
        echo $form->field($model, 'id')->textInput();
    }?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_registered')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
