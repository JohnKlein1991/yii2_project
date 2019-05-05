<?php
namespace frontend\widgets\newsList;

use frontend\models\Test;
use Yii;
use yii\base\Widget;

class NewsList extends Widget
{
    public $newsAmount = null;

    public function run()
    {
        if ($this->newsAmount != null){
            $max = $this->newsAmount;
        } else {
            $max = Yii::$app->params['max'];
        }

        $data = Test::getDataFromTestDB($max);

        return $this->render('block',
            [
                'data' => $data
            ]
        );
    }
}