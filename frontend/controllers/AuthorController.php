<?php

namespace frontend\controllers;

use frontend\models\Author;
use Yii;
use frontend\controllers\behaviors\AccessBehavior;

class AuthorController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            AccessBehavior::className()
        ];
    }

    public function actionCreate()
    {
        $author = new Author();
        if($author->load(Yii::$app->request->post()) && $author->save()){
            Yii::$app->session->setFlash('success', 'New author has been added');
            return $this->refresh();
        }
        return $this->render('create', [
            'author' => $author
        ]);
    }

    public function actionDelete($id)
    {
        $author = Author::findOne($id);
        if($author->delete()){
            Yii::$app->session->setFlash('success', 'Author has been deleted successfully');
        }
        return $this->redirect(['author/index']);
    }

    public function actionIndex()
    {
        $authors = Author::find()->all();
        return $this->render('index', [
            'authors' => $authors
        ]);
    }

    public function actionUpdate($id)
    {
        $author = Author::findOne($id);
        if($author->load(Yii::$app->request->post()) && $author->update()){
            Yii::$app->session->setFlash('success', 'Author has been updated successfully');
            return $this->redirect(['author/index']);
        }
        return $this->render('update', [
            'author' => $author
        ]);
    }
}
