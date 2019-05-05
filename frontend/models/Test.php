<?php

namespace frontend\models;

use Yii;

class Test{
    public static function getDataFromTestDB($max){
        $max = intval($max);
        $sql = 'SELECT * FROM news LIMIT '.$max;
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        $strhelp = Yii::$app->stringHelper;
        if(!is_array($result) && $result){
            return false;
        }
        foreach ($result as $key => &$item){
            $item['content'] = $strhelp->getShort($item['content']);
        }
        return $result;
    }
    public static function getNewsById($id){
        $id = intval($id);
        $sql = 'SELECT * FROM news WHERE id='.$id;
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        return $result;
    }
}
