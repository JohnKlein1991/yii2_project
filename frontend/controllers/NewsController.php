<?php


namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\News;
use Faker;
use Yii;


class NewsController extends Controller
{
    public function actionGenerate()
    {
        $faker = Faker\Factory::create();
        $newsArr = [];
        for($j = 0; $j < 10000; $j++){
            for ($i = 0; $i < 100; $i++){
                $newsArr[] = [
                    $faker->realText(20),
                    $faker->realText(rand(1000, 2000)),
                    rand(0,1)
                ];
            }
            Yii::$app->db->createCommand()->batchInsert(
                'news',
                ['title', 'content', 'status'],
                $newsArr
            )->execute();
        }
    }
}