<?php


namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\forms\SearchForm;
use Yii;

class SearchController extends Controller
{
    public function actionIndex()
    {
        $form = new SearchForm();
        $post = Yii::$app->request->post();
        $result = null;
        if($form->load($post)){
            $result = $form->search();
        }
        return $this->render('index', [
            'model' => $form,
            'result' => $result
        ]);
    }
}