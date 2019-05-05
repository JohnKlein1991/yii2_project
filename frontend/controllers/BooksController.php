<?php


namespace frontend\controllers;

use yii\helpers\Html;
use yii\web\Controller;
use frontend\models\Books;
use frontend\models\Publishers;
use Yii;
use yii\helpers\ArrayHelper;

class BooksController extends Controller
{
    public function actionIndex()
    {
        $query = Books::find();
        $bookList = $query->select('*')->all();
        return $this->render('bookList', [
            'bookList' => $bookList
        ]);
        return $this->render('index');
    }
    public function actionCreate()
    {
        $publishers = Publishers::getList();
        $book = new Books();
        if($book->load(Yii::$app->request->post()) && $book->save()){
            Yii::$app->session->setFlash('success', 'The new book has been added succesfully!');
            //return $this->redirect(['books/index']);
            return $this->refresh();
        }
        return $this->render('create', [
            'book' => $book,
            'publishers' => $publishers

        ]);
    }
    public function actionQuery()
    {
        $query = Books::find();
        $bookList = $query->select('*')->all();
        return $this->render('bookList', [
           'bookList' => $bookList
        ]);
    }
}