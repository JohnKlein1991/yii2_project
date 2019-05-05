<?php


namespace frontend\controllers;

use common\components\EmailService;
use frontend\models\forms\SigninForm;
use frontend\models\User;
use yii\web\Controller;
use frontend\models\forms\SignUpForm;
use Yii;

class UserController extends Controller
{
    public function actionSignUp()
    {
        $model = new SignUpForm();

        $post = Yii::$app->request->post();
        /* @var $user User */
        if($post && $model->load($post) && $user = $model->save()){
            Yii::$app->user->login($user);
            Yii::$app->session->setFlash('success', 'Welcome to our portal!');
            return $this->redirect(['site/index']);
        }
        return $this->render('signUp', [
            'model' => $model
        ]);
    }
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionLogin()
    {
        $model = new SigninForm();
        if($model->load(Yii::$app->request->post()) && $model->login()){
            return $this->redirect(['site/index']);
        }
        return $this->render('login',[
            'model' => $model
        ]);
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['site/index']);
    }
}