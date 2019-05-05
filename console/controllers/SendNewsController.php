<?php
namespace console\controllers;

use yii\console\Controller;
use Yii;
use console\models\News;
use console\models\Subscribers;
use console\models\Sender;

class SendNewsController extends Controller{
    public function actionSend(){
        $newsList = News::getNews();
        $subscribers = Subscribers::getAll();
        Sender::run($newsList, $subscribers);
    }
}