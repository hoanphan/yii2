<?php

$params = require(__DIR__ . '/params.php');

$config = [

    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language'   => 'en',
    'components' => [
        'request' => [

            'enableCookieValidation' => true,
            'cookieValidationKey' => '43refdfgf',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),

        'urlManager' => [
            'enablePrettyUrl'     => true,
            'showScriptName'      => false,
            'enableStrictParsing' => false,

            'rules' => [
            ],
        ],
        /*'setting' => [
            'class' => 'navatech\setting\Setting',
        ],*/
    ],
    'modules' => [
        'admin' => ['class'=>'app\modules\admin\Admin'],
        'setting'  => [
            'class'               => 'navatech\setting\Module',
            'controllerNamespace' => 'navatech\setting\controllers',
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module',

        ],
        'roxymce'  => [
            'class' => '\navatech\roxymce\Module',

        ],
        'language' => [
            'class'    => '\navatech\language\Module',]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
