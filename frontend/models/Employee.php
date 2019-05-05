<?php

namespace frontend\models;

use yii\base\Model;
use Yii;
use yii\helpers\ArrayHelper;

class Employee extends Model{

    const SCENARIO_EMPLOYEE_REGISTER = 'employee_register';
    const SCENARIO_EMPLOYEE_UPDATE = 'employee_update';

    public $firstName;
    public $lastName;
    public $middleName;
    public $birthday;
    public $city;
    public $hiringDate;
    public $position;
    public $department;
    public $idCode;
    public $email;


    public function scenarios()
    {
        return [
            self::SCENARIO_EMPLOYEE_REGISTER => [
                'firstName', 'lastName', 'middleName','birthday', 'hiringDate',
                'city', 'position', 'idCode', 'email'
            ],
            self::SCENARIO_EMPLOYEE_UPDATE => ['firstName', 'lastName', 'middleName'],
        ];
    }
    public function rules(){
        return [
            [['firstName', 'lastName', 'email', 'birthday'], 'required'],
            [['email'], 'email'],
            [['firstName'], 'string', 'min' => 2],
            [['lastName'], 'string', 'min' => 3] ,
            [['middleName'], 'required', 'on' => self::SCENARIO_EMPLOYEE_UPDATE],
            [['birthday', 'hiringDate'], 'date', 'format' => 'php:Y-m-d'],
            [['city'], 'integer'],
            [['position'], 'string'],
            [['idCode'], 'string', 'length' => 10],
            [['hiringDate', 'position', 'idCode'], 'required', 'on' => self::SCENARIO_EMPLOYEE_REGISTER],
        ];
    }

    public function save(){
        return true;
    }
    public function update(){
        return true;
    }
    static public function find()
    {
        $sql = 'SELECT * FROM subscribers';
        return Yii::$app->db->createCommand($sql)->queryAll();
    }
    public function getCitiesList()
    {
        $sql = 'SELECT * FROM cities';
        $result =  Yii::$app->db->createCommand($sql)->queryAll();
        return ArrayHelper::map($result,'id', 'name');
    }
}