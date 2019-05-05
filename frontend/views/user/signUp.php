<?php
/* @var $model \frontend\models\forms\SignUpForm */
/* @var $this \yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Sign UP';
$this->params['breadcrumbs'][] = $this->title;

echo Html::tag('h1', $this->title);

$form = ActiveForm::begin(['id' => 'signup-form']);

echo $form->field($model, 'username');
echo $form->field($model, 'email');
echo $form->field($model, 'password')->passwordInput();
echo Html::submitButton('Signup', ['class' => 'btn btn-primary']);

ActiveForm::end();