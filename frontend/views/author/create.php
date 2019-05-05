<?php
/* @var $this yii\web\View */
/* @var $author \frontend\models\Author*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;

Yii::$app->session->getFlash('success');

echo Html::tag('h1', 'Add new author!');

$form = ActiveForm::begin();
echo $form->field($author, 'firstName');
echo $form->field($author, 'lastName');
echo Html::submitButton('Add', [
        'class' => 'btn btn-primary'
]);
ActiveForm::end();
