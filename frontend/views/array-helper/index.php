<?php
/* @var $subs array*/
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

echo Html::tag('h2', 'Array Helper');
$test = ArrayHelper::getColumn($subs, 'email');
$test1 = ArrayHelper::map($subs, 'id', 'email');
echo Html::beginTag('pre');
var_dump($test);
var_dump($test1);
echo Html::dropDownList('name', '', $test1);
echo Html::endTag('pre');