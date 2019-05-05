<?php
namespace console\models;

use Yii;

class Subscribers{
    public static function getAll(){
        $sql = 'SELECT * FROM subscribers';
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }
}