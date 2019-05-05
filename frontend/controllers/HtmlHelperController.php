<?php


namespace frontend\controllers;

use yii\web\Controller;
use Yii;

class HtmlHelperController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionEscapeOutput()
    {
        $comments = [
            [
                'id' => 10,
                'author' => 'Student',
                'text' => 'Hello!,'
            ],
            [
                'id' => 11,
                'author' => 'Tutor',
                'text' => 'Hello Student!<script>console.log("Surprise!")</script>'
            ]
        ];
        return $this->render('escapeOutput', [
            'comments' => $comments
        ]);
    }
}