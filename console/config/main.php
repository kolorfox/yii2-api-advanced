<?php

use common\transports\FTP;
use common\transports\Mail;

$params = array_merge(require __DIR__ . '/../../common/config/params.php', require __DIR__ . '/../../common/config/params-local.php', require __DIR__ . '/params.php', require __DIR__ . '/params-local.php');
return [
	'id'                  => 'app-console',
	'basePath'            => dirname(__DIR__),
	'bootstrap'           => ['log'],
	'controllerNamespace' => 'console\controllers',
	'aliases'             => [
		'@bower' => '@vendor/bower-asset',
		'@npm'   => '@vendor/npm-asset',
	],
	'controllerMap'       => [
		'fixture' => [
			'class'     => 'yii\console\controllers\FixtureController',
			'namespace' => 'common\fixtures',
		],
		'backup'  => [
			'class' => 'navatech\backup\commands\BackupController',
		],
	],
	'components'          => [
		'log' => [
			'targets' => [
				[
					'class'  => 'yii\log\FileTarget',
					'levels' => [
						'error',
						'warning',
					],
				],
			],
		],
	],
	'modules'             => [
		'mailer' => [
			'class'         => 'navatech\email\Module',
			'controllerMap' => [
				'template' => '\backend\controllers\mailer\TemplateController',
				'message'  => '\backend\controllers\mailer\MessageController',
			],
		],
		'backup' => [
			'class'     => 'navatech\backup\Module',
			'backup'    => [
				'folder' => [
					'enable' => false,
					'data'   => [
						'@api/web/uploads',
						'@backend/web/uploads',
					],
				],
			],
			'transport' => [
				'mail' => [
					'class' => Mail::class,
				],
				'ftp'  => [
					'class' => FTP::class,
				],
			],
		],
	],
	'params'              => $params,
];
