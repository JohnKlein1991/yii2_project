<?php
/* @var $model \frontend\models\forms\SigninForm */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

echo Html::tag('h1', 'Form for signIn');

$form = ActiveForm::begin();

echo $form->field($model, 'username');
echo $form->field($model, 'password');
echo Html::submitButton('Signin');

ActiveForm::end();
