<?php


namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\Dbjoining;
use Yii;

class DbjoiningController extends Controller
{
    public function actionIndex()
    {
        $model = new Dbjoining();
        $model->test();
        return $this->render('index');
    }
}