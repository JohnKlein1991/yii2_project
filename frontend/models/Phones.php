<?php


namespace frontend\models;

use yii\base\Model;
use Yii;


class Phones extends Model
{
    public function getDataFromPhonesDBByPhoneNumber($number)
    {
        $needToAdd = false;
        $needToUpdate = false;
        $data = $this->prepareMobileNumberForRequest($number);
        if(!$data){
            return 'неподходящий формат номера';
        }
        /*
        $inOurDB = $this->searchNumberInOurDB($data['number']);
        if($inOurDB){
            if(!$inOurDB['needToUpdate']){
                return $inOurDB['timezone'];
            } else {
                $needToUpdate = true;
            }
        } else {
            $needToAdd = true;
        }
        */
        $def = $data['def'];
        $lastPart = $data['lastPart'];
        $sql = 'SELECT * FROM '.$data['table'].' WHERE defcode='.$def.' AND code_from<='.$lastPart.' AND code_to>='.$lastPart;

        $informationAboutNumber = Yii::$app->db->createCommand($sql)->queryOne();

        if(!$informationAboutNumber){
            return 'Sorry, we didn\'t get timezone of this region';
        }
        $region = $informationAboutNumber['region'];
        $regionBefore = $informationAboutNumber['region'];
        $regionNamePreparedForRequest = $this->prepareNameOfRegionForRequest($region);

        if($regionNamePreparedForRequest){
            $region = $regionNamePreparedForRequest;
        }
        $geonameId = $this->requestForGeonameId($region);
        if(!$geonameId){
            return 'Sorry, we didn\'t get timezone of this region';
        }
        $timezone = $this->requestForTimezone($geonameId);
        if(!$timezone){
            return 'Sorry, we didn\'t get timezone of this region';
        }
        if ($needToAdd) $this->addNumberToOurDB($data['number'], $timezone);
        if ($needToUpdate) $this->updateNumberInfoInOurDB($data['number'], $timezone);
        return [$timezone, $region, $regionBefore];
    }

    public function addNumberToOurDB($number, $timezone)
    {
        $currentTime = time();
        $sql = 'INSERT INTO intr_numbers_db (number, time, timezone) VALUES ('.$number.', '.$currentTime.', '.$timezone.')';
        Yii::$app->db->createCommand($sql)->execute();
    }
    public function updateNumberInfoInOurDB($number, $timezone)
    {
        $currentTime = time();
        $sql = 'UPDATE intr_numbers_db SET time = '.$currentTime.' WHERE (number = '.$number.')';
        Yii::$app->db->createCommand($sql)->execute();
    }

    public function prepareNameOfRegionForRequest($region)
    {
        $paterns = [
            '/.*г\. +([а-яА-ЯёЁё]+ +[а-яА-ЯёЁё]{2,})/ui',
            '/.*г\. +([а-яА-ЯёЁё]+ *- *[а-яА-ЯёЁё]{2,})/ui',
            '/.*г\. +([а-яА-ЯёЁё]+)/ui',
            '/([а-яА-ЯёЁё]+ +край)/ui',
            '/([а-яА-ЯёЁё]+) +обл\./ui',
            '/([а-яА-ЯёЁё]+ +область)/ui',
            '/(республика +[а-яА-ЯёЁё]+ +[а-яА-ЯёЁё]+)/ui',
            '/(республика +[а-яА-ЯёЁё]+-[а-яА-ЯёЁё]+)/ui',
            '/(республика +[а-яА-ЯёЁё]+)/ui',
            '/([а-яА-ЯёЁё]+-[а-яА-ЯёЁё]+ +республика)/ui',
            '/([а-яА-ЯёЁё]+ +республика)/ui',
            '/р-ны +([а-яА-ЯёЁёйЙз]+)/ui',
            '/([а-яА-ЯёЁё]+)/ui',

        ];
        foreach ($paterns as $patern){
            if(preg_match($patern, $region, $arr)){
                return $arr[1];
            };
        }
        return false;
    }
    public function searchNumberInOurDB($number){
        $sql = 'SELECT * FROM intr_numbers_db WHERE number='.$number;
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        if (!$result){
            return false;
        }
        $timeInDB = (int) $result['time'];
        $currentTime = time();
        if(($currentTime - $timeInDB) < 86400){
            return [
                'timezone' => $result['timezone'],
                'needToUpdate' => false
            ];
        } else {
            return [
                'timezone' => $result['timezone'],
                'needToUpdate' => true
            ];
        }
    }
    public function requestForTimezone($geonameId)
    {
        $url = 'http://api.geonames.org/getJSON?formatted=true&geonameId='.urlencode($geonameId).'&username=introvert&style=full';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($curl), true);
        curl_close($curl);

        if(!(is_array($result) && !empty($result['timezone']) && is_array($result['timezone']) && isset($result['timezone']['dstOffset']))){
            return false;
        }
        $timezone = $result['timezone']['dstOffset'];
        return $timezone;
    }

    public function requestForGeonameId($region){
        $url = 'http://api.geonames.org/searchJSON?q='.urlencode($region).'&maxRows=1&username=introvert';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($curl), true);
        curl_close($curl);
        if(!(is_array($result) && isset($result['totalResultsCount']))){
            return false;
        }
        if($result['totalResultsCount'] === 0){
            return false;
        } else {
            $geoname = $result['geonames'][0]['geonameId'];
            return $geoname ? $geoname : false;
        }
    }
    public function prepareMobileNumberForRequest($number){
        $pattern = '/^(8|\+7)\d{9,10}$/';
        if (!preg_match($pattern, $number)){
            return false;
        } else {
            $number = preg_replace('/(^8|\+7)/', '', $number);
        }
        $def = substr($number, 0, 3);
        $lastPart = substr($number, 3);
        $table = $this->selectTableForNumber($def);
        return [
            'def' => $def,
            'lastPart' => $lastPart,
            'number' => $number,
            'table' => $table
        ];
    }
    public function selectTableForNumber($def){
        $code = $def[0];
        switch ($code) {
            case '3': return 'ABC_3xx';
                break;

            case '4': return 'ABC_4xx';
                break;

            case '8': return 'ABC_8xx';
                break;

            case '9': return 'DEF_9xx';
                break;
        }

    }
}