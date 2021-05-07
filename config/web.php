<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'EBIS CIMS',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'timeZone' => 'UTC',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'sumtinLight',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
   //      'view' => [
   //     'theme' => [
   //       //pathmap overrides the default path for themes
   //         'pathMap' => ['@app/views' => '@app/themes/jungle'],
   //         'baseUrl' => '@web/../themes/jungle',
   //     ],
   // ],
        'user' => [
            //'identityClass' => 'app\models\User',
            'class' => 'webvimark\modules\UserManagement\components\UserConfig',

		// Comment this if you don't want to record user logins
		'on afterLogin' => function($event) {
                \webvimark\modules\UserManagement\models\UserVisitLog::newVisitor($event->identity->id);
                
                $db = Yii::$app->db; 
                $current_user = Yii::$app->user->id;
                $type = $db->createCommand("UPDATE user set login_status = 1 
                where id = '{$current_user}' ")->execute();
			}
      //'enableAutoLogin' => false,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mail.yourhost.com',
                'username' => 'no-reply@your-host.com',
                'password' => 'your-password-here',
                'port' => '465',
                'encryption' => 'ssl',
            ],
            'messageConfig' => [
                'from' => ['admin@ebis.com.ng' => 'Admin'], // this is needed for sending emails
                'charset' => 'UTF-8',
            ]
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
        'db' => $db,
        // 'authManager' => [
        //   'class' => 'yii\rbac\DbManager',
        //   'defaultRoles' => ['basicUserRole'],
        // ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    //     'urlManager' => [
    //         'class' => 'yii\web\UrlManager',
    //         // Disable index.php
    //         'showScriptName' => false,
    //         // Disable r= routes
    //         'enablePrettyUrl' => true,
    //         'rules' => array(
    //         '<controller:\w+>/<id:\d+>' => '<controller>/view',
    //         '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
    //         '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
    // ),
    //     ],
    ],
    'modules' => [
      'user-management' => [
  		'class' => 'webvimark\modules\UserManagement\UserManagementModule',

  		'enableRegistration' => false,

  		// Add regexp validation to passwords. Default pattern does not restrict user and can enter any set of characters.
  		// The example below allows user to enter :
  		// any set of characters
  		// (?=\S{8,}): of at least length 8
  		// (?=\S*[a-z]): containing at least one lowercase letter
  		// (?=\S*[A-Z]): and at least one uppercase letter
  		// (?=\S*[\d]): and at least one number
  		// $: anchored to the end of the string

  		// 'passwordRegexp' => '^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$',


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
'on afterAction' => function ($event) {

        $exception = Yii::$app->errorHandler->exception;

        if ($exception instanceof \yii\db\IntegrityException) {

            $event->handled = true;

            Yii::$app->getSession()->setFlash('danger', 'oops!! There seems to be a duplicate.');

            return Yii::$app->getResponse()->redirect(Yii::$app->request->referrer)->send();

        }

    },
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.30.8'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.30.8'],
    ];
}

return $config;
