<?php


namespace frontend\models;

use yii\db\ActiveRecord;
use frontend\models\Publishers;
use Yii;

class Books extends ActiveRecord
{
    public static function tableName()
    {
        return '{{books}}';
    }
    public function rules()
    {
        return [
            [['name', 'publisher_id', 'isbn', 'date_publisher'], 'required'],
            [['date_publisher'], 'date', 'format' => 'php:Y-m-d']
        ];
    }
    public function getDatePublishing(){
        return $this->date_publisher ? Yii::$app->formatter->format($this->date_publisher, 'date') : 'Date is\'t set';
    }
    public function getPublisher()
    {
        return $this->hasOne(Publishers::className(), ['id' => 'publisher_id'])->one();
    }
    public function getPublisherName()
    {
        if ($publisher = $this->getPublisher()){
            return $publisher->name;
        } else {
            return 'Unknown publisher';
        }
    }
    public function getBookToAuthorRelations()
    {
        return $this->hasMany(BooksToAuthors::className(), [
            'booksId' => 'id'
        ]);
    }
    public function getAuthors()
    {
        return $this->hasMany(Author::className(), [
            'id' => 'authorId'
        ])->via('bookToAuthorRelations')->all();
    }
}