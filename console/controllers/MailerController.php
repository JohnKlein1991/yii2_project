<?php
namespace console\controllers;

use yii\console\Controller;
use Yii;

class MailerController extends  Controller {

    public function actionSend($address){
        $result = Yii::$app->mailer->compose()
            ->setFrom('mail3fortest@yandex.ru')
            ->setTo($address)
            ->setSubject('Тема сообщения')
            ->setTextBody('Текст сообщения')
            ->setHtmlBody('<b>текст сообщения в формате HTML</b>')
            ->send();
        if($result){
            echo "mail to $address was sent";
        }
    }
}