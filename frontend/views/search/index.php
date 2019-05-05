<?php
/* @var $model \frontend\models\forms\SearchForm */
/* @var $result []*/
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use frontend\components\HighlightHelper;

echo  Html::tag('h1', 'Search on the site');
$form = ActiveForm::begin();

echo $form->field($model, 'string');
echo Html::submitButton('Search', ['class' => 'btn btn-primary']);
ActiveForm::end();
if($result){
    echo '<hr>';
    echo Html::beginTag('div', [
        'class' => 'col-12'
    ]);
    foreach ($result as $item) {
        echo Html::tag('h3', $item['title']);
        $text = HighlightHelper::highlight($item['content'], $model->string);
        echo Html::tag('p', $text);
    }
    echo Html::endTag('div');
}
