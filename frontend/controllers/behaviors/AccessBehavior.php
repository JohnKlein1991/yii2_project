<?php
namespace frontend\controllers\behaviors;

use yii\base\Behavior;
use Yii;
use yii\web\Controller;

class AccessBehavior extends Behavior
{
    public function events()
    {
        return [
            Controller::EVENT_BEFORE_ACTION => 'checkAccess'
        ];
    }

    public function checkAccess()
    {
        if(Yii::$app->user->isGuest){
            Yii::$app->controller->redirect(['site/for-guest']);
        }
    }
}