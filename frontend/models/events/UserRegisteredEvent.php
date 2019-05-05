<?php

namespace frontend\models\events;

use yii\base\Event;
use common\components\UserNotificationInterface;


class UserRegisteredEvent extends Event implements UserNotificationInterface
{
    /* User */
    public $user;

    /* string */
    public $subject;

    public function getUser()
    {
        return $this->user;
    }
    public function getSubject()
    {
        return $this->subject;
    }
    public function getEmail()
    {
        return $this->user->email;
    }
}
