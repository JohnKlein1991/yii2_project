<?php

namespace frontend\models;

use Yii;
/**
 * This is the model class for table "author".
 *
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{author}}';
    }
    public function rules()
    {
        return [
            [['firstName',  'lastName'], 'required'],
            [['firstName', 'lastName'], 'string', 'max' => 25],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
        ];
    }
}
