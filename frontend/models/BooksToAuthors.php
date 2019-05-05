<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "books_to_authors".
 *
 * @property int $id
 * @property int $booksId
 * @property int $authorId
 */
class BooksToAuthors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books_to_authors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['booksId', 'authorId'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'booksId' => 'Books ID',
            'authorId' => 'Author ID',
        ];
    }
}
