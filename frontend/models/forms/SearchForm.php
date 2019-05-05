<?php


namespace frontend\models\forms;

use yii\base\Model;
use Yii;
use frontend\models\NewsSearch;

class SearchForm extends Model
{
    public $string;

    public function rules()
    {
        return [
            ['string', 'trim'],
            ['string', 'required'],
            ['string', 'string', 'min' => 3]
        ];
    }
    public function search()
    {
        if($this->validate()){
            $search = new NewsSearch();
            return $search->simpleSearch($this->string);
        }
    }
}