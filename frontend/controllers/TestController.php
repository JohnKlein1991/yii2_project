<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Test;
use frontend\models\User;

class TestController extends Controller {
    public function actionIndex(){
        echo '<h1>Test</h1>';
        $user = new User();
    }
    public function actionView($id){
        $data = Test::getNewsById($id);
        return $this->render('news',[
            'data' => $data
        ]);
    }
    public function actionMail() {
        Yii::$app->mailer->compose()
            ->setFrom('mail3fortest@yandex.ru')
            ->setTo('buk2018irinam@gmail.com')
            ->setSubject('Тема сообщения')
            ->setTextBody('Текст сообщения')
            ->setHtmlBody('<b>текст сообщения в формате HTML</b>')
            ->send();
    }
}