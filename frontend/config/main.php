<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'language'=> 'ru',
    'components' => [
        'user' => [
            'identityClass' => 'frontend\models\User',
            'enableAutoLogin' => true,
            // 'loginUrl' => ['user/login'],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.yandex.ru',
                'username' => 'mail3fortest@yandex.ru',
                'password' => 'fanera',
                'port' => '465',
                'encryption' => 'ssl'
            ]
        ],
        'stringHelper' => [
            'class' => 'common\components\StringHelper'
        ],
        'request' => [
            'enableCsrfValidation' => false,
            'csrfParam' => '_csrf-frontend',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'novosti' => 'test/index',
                'send_mail' => 'test/mail',
                'novosti/<id:\d+>' => 'test/view'
            ],
        ]
    ],
    'params' => $params,
    'aliases' => [
        '@controller' => '/var/www/introvert/frontend/controllers/',
        '@test' => '@controller/testaliases',
    ]
];
