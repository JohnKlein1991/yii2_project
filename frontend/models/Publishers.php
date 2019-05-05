<?php

namespace frontend\models;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "publishers".
 *
 * @property int $id
 * @property string $name
 * @property string $date_registered
 */
class Publishers extends \yii\db\ActiveRecord
{
    static public function getList(){
        $initialArr = self::find()->asArray()->all();
        $list = ArrayHelper::map($initialArr, 'id', 'name');
        return $list;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'publishers';
    }
    public function rules()
    {
        return [
            [['name',  'date_registered'], 'required'],
            [['name'], 'string', 'min' => 3],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'date_registered' => 'Date Registered',
        ];
    }
}
