<?php

use kartik\datecontrol\Module;

return [
	'name'       => 'Kolor Fox API Backend',
	'aliases'    => [
		'@bower' => '@vendor/bower-asset',
		'@npm'   => '@vendor/npm-asset',
	],
	'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
	'components' => [
		'cache'        => [
			'class' => 'yii\caching\FileCache',
		],
		'setting'      => [
			'class' => 'navatech\setting\Setting',
		],
		'emailManager' => [
			'class'            => '\common\components\EmailManager',
			'defaultTransport' => 'yiiMailer',
			'transports'       => [
				'yiiMailer' => [
					'class' => '\navatech\email\transports\YiiMailer',
				],
			],
		],
	],
	'modules'    => [
		'user'        => [
			'class'    => 'dektrium\user\Module',
			'modelMap' => [
				'User'    => 'common\models\User',
				'Profile' => 'common\models\Profile',
			],
		],
		'datecontrol' => [
			'class'              => 'kartik\datecontrol\Module',
			'displaySettings'    => [
				Module::FORMAT_DATE     => 'php: dd-MM-yyyy',
				Module::FORMAT_TIME     => 'HH:mm:ss a',
				Module::FORMAT_DATETIME => 'php: Y-m-d H:i:s',
			],
			'saveSettings'       => [
				Module::FORMAT_DATE     => 'php:yyyy-MM-dd',
				Module::FORMAT_TIME     => 'php:H:i:s',
				Module::FORMAT_DATETIME => 'php:Y-m-d H:i:s',
			],
			'displayTimezone'    => 'UTC',
			'saveTimezone'       => 'UTC',
			'autoWidget'         => true,
			'ajaxConversion'     => true,
			'autoWidgetSettings' => [
				Module::FORMAT_DATE     => [
					'type'          => 2,
					'pluginOptions' => ['autoclose' => true],
				],
				Module::FORMAT_DATETIME => [],
				Module::FORMAT_TIME     => [],
			],
			'widgetSettings'     => [
				Module::FORMAT_DATE => [
					'class'   => 'yii\jui\DatePicker',
					'options' => [
						'dateFormat' => 'php:d-M-Y',
						'options'    => ['class' => 'form-control'],
					],
				],
			],
		],
		'backup'      => [
			'class'         => 'navatech\backup\Module',
			'clearAfterDay' => 10,
			'backupPath'    => '@console/runtime/backup',
			'backup'        => [
				'directory' => [
					'enable' => true,
					'data'   => [
						'@api/web',
					],
				],
			],
			'transport'     => [
				'mail' => [
					'class' => '\common\transports\Mail',
				],
				'ftp'  => [
					'class' => '\common\transports\FTP',
				],
			],
		],
	],
];
