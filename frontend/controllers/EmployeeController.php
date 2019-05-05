<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Employee;

class EmployeeController extends Controller{

    public function actionIndex(){
        $employee1 = new Employee();
        $employee1->firstName = 'Andrew';
        $employee1->lastName = 'Marhai';
        $employee1->middleName = 'Middle Andrew';
        $employee1->salary = '20000';

        echo 'Salary of '.$employee1['firstName'].' '.$employee1['lastName'].' is '.$employee1['salary'].' rub';
        echo '<hr>';
        var_dump($employee1);
        echo '<hr>';
        var_dump($employee1->toArray());

    }

    public function actionAttr(){
        $employee1 = new Employee();
        $employee1->firstName = 'Andrew';
        $employee1->lastName = 'Marhai';
        $employee1->middleName = 'Middle Andrew';
        $employee1->salary = '20000';

        echo '<pre>';
        var_dump($employee1->attributes);
        echo '</pre>';
    }

    public function actionRegistration(){
        $model = new Employee();
        $model->scenario = Employee::SCENARIO_EMPLOYEE_REGISTER;
        if($model->load(Yii::$app->request->post())){
            if($model->validate() && $model->save()){
                Yii::$app->session->setFlash('success', 'Данные добавлены в БД');
            }
        }
        return $this->render('registration', ['model' => $model]);
    }

    public function actionUpdate(){
        $model = new Employee();
        $model->scenario = Employee::SCENARIO_EMPLOYEE_UPDATE;

        if(Yii::$app->request->isPost){
            $model->attributes = Yii::$app->request->post();
            if($model->validate() && $model->update()){
                Yii::$app->session->setFlash('success', 'Данные успешно изменены');
            }
        }


        return $this->render('update', ['model' => $model]);
    }
}