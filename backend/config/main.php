<?php
$baseUrl = str_replace('/web', '', (new \yii\web\Request())->getBaseUrl());
$params  = array_merge(require __DIR__ . '/../../common/config/params.php', require __DIR__ . '/../../common/config/params-local.php', require __DIR__ . '/params.php', require __DIR__ . '/params-local.php');
return [
	'id'                  => 'app-backend',
	'basePath'            => dirname(__DIR__),
	'controllerNamespace' => 'backend\controllers',
	'bootstrap'           => ['log'],
	'components'          => [
		'view'         => [
			'class' => 'backend\components\View',
			'theme' => [
				'pathMap' => [
					'@dektrium/user/views'    => '@backend/views/user',
//					'@navatech/email/views'   => '@backend/views/mailer',
					'@navatech/setting/views' => '@backend/views/setting',
				],
			],
		],
		'assetManager' => [
			'bundles' => [
				'yii\web\JqueryAsset'     => ['js' => ['https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js']],
				'dmstr\web\AdminLteAsset' => [
					'skin' => 'skin-black',
				],
			],
		],
		'request'      => [
			'csrfParam' => '_csrf-backend',
			'baseUrl'   => $baseUrl,
		],
		'user'         => [
			'identityClass'   => 'common\models\User',
			'enableAutoLogin' => true,
			'identityCookie'  => [
				'name'     => '_identity-backend',
				'httpOnly' => true,
			],
		],
		'session'      => [
			// this is the name of the session cookie used for login on the backend
			'name' => 'advanced-backend',
		],
		'log'          => [
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets'    => [
				[
					'class'  => 'yii\log\FileTarget',
					'levels' => [
						'error',
						'warning',
					],
				],
			],
		],
		'errorHandler' => [
			'errorAction' => 'site/error',
		],
		'urlManager'   => [
			'enablePrettyUrl' => true,
			'showScriptName'  => false,
			'rules'           => [],
		],
	],
	'modules'             => [
		'user'     => [
			'class'                  => 'dektrium\user\Module',
			'admins'                 => $params['admins'],
			'enablePasswordRecovery' => false,
			'enableRegistration'     => true,
			'enableConfirmation'     => false,
			'controllerMap'          => [
				'admin'    => 'backend\controllers\user\AdminController',
				'security' => 'backend\controllers\user\SecurityController',
				'recovery' => 'backend\controllers\user\RecoveryController',
				'settings' => 'backend\controllers\user\SettingsController',
			],
			'modelMap'               => [
				'LoginForm'    => '\backend\models\form\LoginForm',
				'RecoveryForm' => '\backend\models\form\RecoveryForm',
				'Profile'      => '\backend\models\Profile',
				'User'         => '\backend\models\User',
			],
		],
		'setting'  => [
			'class'               => 'navatech\setting\Module',
			'controllerNamespace' => 'navatech\setting\controllers',
			'enableMultiLanguage' => false,
		],
		'gridview' => [
			'class' => '\kartik\grid\Module',
		],
		'roxymce'  => [
			'class' => '\navatech\roxymce\Module',
		],
		'mailer'   => [
			'class'         => 'navatech\email\Module',
			'controllerMap' => [
				'template' => '\backend\controllers\mailer\TemplateController',
				'message'  => '\backend\controllers\mailer\MessageController',
			],
		],
	],
	'params'              => $params,
];
