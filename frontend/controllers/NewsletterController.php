<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Subscribe;

class NewsletterController extends Controller
{
    public function actionSubscribe(){
        $formData = Yii::$app->request->post();
        $modelForCheckingEmail = new Subscribe();
        if(Yii::$app->request->isPost){
            $modelForCheckingEmail->email = $formData['email'];
            if($modelForCheckingEmail->validate() && $modelForCheckingEmail->save()){
                //Yii::$app->session->setFlash('statusForSubscriber', 'You are the subscriber now!');
                Yii::$app->session->setFlash('success', 'You are the subscriber now!');
            }
        } else {

        }
        return $this->render('subscribe', array(
            'model' => $modelForCheckingEmail
        ));
    }
}
