<?php


namespace frontend\models\forms;

use common\components\EmailService;
use frontend\models\User;
use yii\base\Model;
use frontend\models\events\UserRegisteredEvent;
use Yii;

class SignUpForm extends Model
{
    public $username;
    public $email;
    public $password;

    public function save()
    {
        if($this->validate()){
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->created_at = $time = time();
            $user->updated_at = $time;
            $user->auth_key = Yii::$app->security->generateRandomString();

            $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);

            if($user->save()){
                $event = new UserRegisteredEvent();
                $event->user = $user;
                $event->subject = 'Hello wolrd!New user on your site!';
                $user->trigger(User::USER_REGISTERED, $event);
                return $user;
            }
        }
    }

    public function rules()
    {
        return [
            ['username', 'trim'],
            [['username'], 'unique', 'targetClass' => User::className()],
            ['username', 'required'],
            ['username', 'string', 'min' => 3, 'max' => 255],

            ['email', 'email'],
            [['email'], 'unique', 'targetClass' => User::className()],
            ['email', 'required'],
            ['email', 'trim'],
            ['email', 'string', 'max' => 255],

            ['password', 'required'],
            ['password', 'string', 'min' => 6, 'max' => 60],
        ];
    }
}