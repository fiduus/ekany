<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language'=>'fr', 
    'components' => [
        'urlManager' => [
          'showScriptName' => false,
          'enablePrettyUrl' => true
                  ],   
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'UWDphkdjDCJxEA74R3noMrQUQaFPHuBG',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [         
        'class' => 'webvimark\modules\UserManagement\components\UserConfig',
          //'enableUnconfirmedLogin' => true,
           // 'confirmWithin' => 21600,
           // 'cost' => 12,                
            
        // Comment this if you don't want to record user logins
        'on afterLogin' => function($event) {
                \webvimark\modules\UserManagement\models\UserVisitLog::newVisitor($event->identity->id);
            }
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
    ],
    'params' => $params,
    'modules'=>[
    'user-management' => [
        'class' => 'webvimark\modules\UserManagement\UserManagementModule',

        // 'enableRegistration' => true,

        // Here you can set your handler to change layout for any controller or action
        // Tip: you can use this event in any module
        'on beforeAction'=>function(yii\base\ActionEvent $event) {
                if ( $event->action->uniqueId == 'user-management/auth/login' )
                {
                    $event->action->controller->layout = 'loginLayout.php';
                };
            },
    ],
],
        
  
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
