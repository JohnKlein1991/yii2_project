<?php


namespace frontend\models\forms;

use frontend\models\User;
use yii\base\Model;
use Yii;

class SigninForm extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['password', 'required'],
            ['password', 'validatePassword']
        ];
    }
    public function login()
    {
        if($this->validate()){
            $user = User::searchByUsername($this->username);
            return Yii::$app->user->login($user);
        } else {
            return false;
        }
    }
    public function validatePassword($attribute, $params){
        $user = User::searchByUsername($this->username);
        if($user && $user->checkPassword($this->password)){
            Yii::$app->session->setFlash('success', 'You are welcome!');
        } else {
            Yii::$app->session->setFlash('danger', 'Incorrect login or password!');
            $this->addError($attribute, 'Incorrect login or password!');
        }
    }
}