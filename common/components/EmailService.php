<?php


namespace common\components;

use yii\base\Component;
use common\components\UserNotificationInterface;
use Yii;

class EmailService extends Component
{
    public function sendNotifyToAdmin(UserNotificationInterface $event)
    {

        return Yii::$app->mailer->compose()
            ->setFrom(Yii::$app->params['workEmail'])
            ->setTo(Yii::$app->params['adminEmail'])
            ->setSubject($event->getSubject())
            ->setTextBody('New user on Your portal')
            ->send();
    }
    public function sendNotifyToUser(UserNotificationInterface $event)
    {
        return Yii::$app->mailer->compose()
            ->setFrom(Yii::$app->params['workEmail'])
            ->setTo($event->getEmail())
            ->setSubject($event->getSubject())
            ->setTextBody('New user on Your portal')
            ->send();
    }
}