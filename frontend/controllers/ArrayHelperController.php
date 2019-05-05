<?php


namespace frontend\controllers;


use yii\web\Controller;
use frontend\models\Employee;

class ArrayHelperController extends Controller
{
    public function actionIndex()
    {
        $subs = Employee::find();
        return $this->render('index',[
            'subs' => $subs,
        ]);
    }
}