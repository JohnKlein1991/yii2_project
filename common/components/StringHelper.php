<?php

namespace common\components;

use Yii;

class StringHelper {
    public function __construct()
    {
        $this->stringLimit = Yii::$app->params['shortTextLimit'];
    }

    public function getShort($string, $count = null){
        if($count === null){
            $count = intval($this->stringLimit);
        }
        intval($count);
        return substr($string, 0, $count);
    }
}