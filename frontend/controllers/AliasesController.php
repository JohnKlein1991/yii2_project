<?php


namespace frontend\controllers;

use yii\web\Controller;
use Yii;

class AliasesController extends Controller
{
    public function actionMkdir(){

        //Yii::setAlias('@controllers', '/var/www/introvert/frontend/controllers');
        //echo mkdir(Yii::getAlias('@controllers').'/testtest');
        echo Yii::getAlias('@app');
    }
}