<?php

namespace frontend\models;


use yii\base\Model;
use yii\db;

class Subscribe extends Model
{
    public $email;

    public function rules(){
        return [
            [['email'], 'required'],
            [['email'], 'email']
        ];
    }
    public function  save(){
        $sql = 'INSERT INTO subscribers(id,email) VALUES(null, \''.$this->email.'\')';
        return \Yii::$app->db->createCommand($sql)->execute();
    }
}