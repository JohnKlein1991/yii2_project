<?php


namespace frontend\models;

use Yii;
use frontend\models\News;

class NewsSearch
{
    public function simpleSearch($keyword)
    {
        $keyword = addslashes($keyword);
        $sql = "SELECT * FROM news WHERE content LIKE '%$keyword%' LIMIT 20";
        $stmt = Yii::$app->db->createCommand($sql);
        $stmt->prepare();
        return $stmt->queryAll();
    }
}