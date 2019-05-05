<?php

namespace console\models;

use Yii;

class Sender
{
    public static function run($newsList, $subscribers){
        if (!is_array($newsList) || !is_array($subscribers)){
            return false;
        }
        $count = 0;
        foreach ($subscribers as $item){
            $result = Yii::$app->mailer->compose(
                '/email_templates/news_template',
                ['newsList' => $newsList]
            )
                ->setFrom('mail3fortest@yandex.ru')
                ->setTo($item['email'])
                ->setSubject('Breaking news from HLTV.com')
                ->send();
            if($result === true){
                $count++;
            }
        }
        echo $count.' mail(s) was sent';
    }
}