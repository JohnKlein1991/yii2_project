<?php
use yii\helpers\Html;
/* @var $comments array */

echo Html::tag('p', 'Escape output');
var_dump($comments[0]['author']);
foreach ($comments as $comment){
    echo Html::tag('h3', Html::encode($comment['author']));
    echo Html::tag('p', Html::encode($comment['text']));
    echo Html::beginTag('hr');
}