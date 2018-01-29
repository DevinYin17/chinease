<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'AgwDSTgAXo2wsalkBq2KDFJ2WxNnEkqV',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction'=>'site/error',
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
              '<action:[\w-]+>' => 'site/<action>',
              'topic/<action:[\w-]+>' => 'site/<action>',
            ],
        ],
        'curl' => [
            'class' => 'app\components\Curl',
            'options' => [
                CURLOPT_MAXREDIRS => 1,
            ],
        ],
    ],
    'params' => $params,
];

return $config;
