<?php
/* @var $bookList[]  frontend\model\Books*/
use yii\helpers\Html;
use yii\helpers\Url;

echo '<h1>List of books</h1>';
echo '<a href="'.Url::to(['books/create']).'">Add new book</a>';

foreach ($bookList as $book){
    echo Html::tag('h3', $book->name);
    foreach ($book->getAuthors() as $author){
        echo Html::tag('p', $author->firstName.' '.$author->lastName);
    }
    echo Html::tag('p', $book->isbn);
    echo Html::tag('p', $book->getDatePublishing());
    echo Html::tag('p', $book->getPublisherName());
    echo Html::endTag('hr');
}