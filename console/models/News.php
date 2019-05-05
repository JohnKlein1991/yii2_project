<?php
namespace console\models;

use Yii;
use frontend\components\StringHelper;


class News {
    const STATUS_FOR_NOT_SEND_NEWS = 1;

    public static function getNews(){
        $sql = 'SELECT * FROM news WHERE status='.self::STATUS_FOR_NOT_SEND_NEWS;
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        $result = self::prepareNews($result);
        return $result;
    }
    public static function prepareNews($array){
        $helper = Yii::$app->stringHelper;
        if (!empty($array) || is_array($array)){
            foreach ($array as &$value){
                $value['content'] = $helper->getShort($value['content']);
            }
        }
        return $array;
    }
}