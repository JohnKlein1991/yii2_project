<?php
/* @var $book \frontend\models\Books*/
/* @var $publishers \frontend\models\Publishers */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

echo Yii::$app->session->getFlash('success');
echo Html::tag('h1', 'This is the page for creating books');

$form = ActiveForm::begin();
echo $form->field($book, 'name');
echo $form->field($book, 'isbn');
echo $form->field($book, 'date_publisher')->widget(DatePicker::className(), [
    'language' => 'en',
    'dateFormat' => 'yyyy-MM-dd',
]);
echo $form->field($book, 'publisher_id')->dropDownList($publishers);
echo Html::submitButton('Add book', [
    'class' => 'btn btn-primary'
]);
ActiveForm::end();
