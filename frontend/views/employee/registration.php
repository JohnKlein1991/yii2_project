<?php
/* @var $model \frontend\models\Employee */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
//use Yii;

if($model->hasErrors()){
    echo '<pre>';
    print_r($model->errors);
    echo '</pre>';
}
if(Yii::$app->session->hasFlash('success')){
    Yii::$app->session->getFlash('success');
}
echo Html::tag('h1', 'Welcome to our company');
$form = ActiveForm::begin();
echo $form->field($model, 'firstName');
echo $form->field($model, 'lastName');
echo $form->field($model, 'middleName');
echo $form->field($model, 'email')->hint('Email');
echo $form->field($model, 'birthday');
echo $form->field($model, 'hiringDate');
echo $form->field($model, 'position');
echo $form->field($model, 'idCode');
echo $form->field($model,'city')->dropDownList($model->getCitiesList());
echo Html::submitButton("Send", ['class' => 'btn btn-primary']);

ActiveForm::end();


/*
<form method="post">
    <p>Email</p>
    <input type="text" name="email">
    <p>First name</p>
    <input type="text" name="firstName">
    <p>Last name</p>
    <input type="text" name="lastName">
    <p>Middle name</p>
    <input type="text" name="middleName">
    <p>Birthday</p>
    <input type="text" name="birthday">
    <p>Hiring Date</p>
    <input type="text" name="hiringDate">
    <p>Position</p>
    <input type="text" name="position">
    <p>ID code</p>
    <input type="text" name="idCode">
    <br><br>
    <input type="submit">
</form>
*/