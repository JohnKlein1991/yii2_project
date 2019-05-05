<?php


namespace frontend\controllers;

use yii\db\Command;
use yii\db\Connection;
use yii\web\Controller;
use Yii;

class DaoController extends Controller
{
    public function actionIndex()
    {
        //

        echo '<pre>';
        $sql = 'SELECT * FROM cities';
        $res = Yii::$app->db->createCommand($sql)->queryColumn();
        var_dump($res);

        //
        echo '<hr>';
        $sql2 = 'SELECT code FROM countries';
        $res2 = Yii::$app->db2->createCommand($sql2)->queryAll();
        var_dump($res2);

        echo '</pre>';
        die;

        return $this->render('index');
    }
}