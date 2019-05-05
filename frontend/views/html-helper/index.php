<?php
use yii\helpers\Html;

echo Html::tag('h1', 'Title of Helpers Page');
echo Html::beginTag('p');
echo 'Test of begin and end methods';
echo Html::endTag('p');

$brandsArr = [
    '1' => 'sony',
    '2' => 'lg',
    '3' => 'apple',
    '4' => 'samsung',
];
echo Html::dropDownList('Simple list', '2', $brandsArr);

echo Html::radioList('Simple list', '2', $brandsArr);

echo Html::checkboxList('Simple list', '1', $brandsArr);

echo Html::img('@images/burger.jpg', ['alt' => 'BURGER!!!!']);
?>

<p>Html helper</p>
