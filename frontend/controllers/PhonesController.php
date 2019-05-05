<?php


namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\Phones;
use Yii;

class PhonesController extends Controller
{
    public function actionIndex()
    {
        $model = new Phones();
        $data = [];
        if(Yii::$app->request->isPost){
            $postData = Yii::$app->request->post();
            $data = $model->getDataFromPhonesDBByPhoneNumber($postData['phone']);
        }


        return $this->render('index', ['data' => $data]);
    }
}