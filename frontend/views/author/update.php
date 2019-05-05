<?php
/* @var $this yii\web\View */
/* @var $author \frontend\models\Author */

use yii\widgets\ActiveForm;
use yii\helpers\Html;


echo Html::tag('h1', 'Update authors');

$form = ActiveForm::begin();

echo $form->field($author, 'firstName');
echo $form->field($author, 'lastName');
echo Html::submitButton('Update');

ActiveForm::end();