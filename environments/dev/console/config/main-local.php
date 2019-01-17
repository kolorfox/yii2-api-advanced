<?php
return [
	'bootstrap' => ['gii'],
	'modules'   => [
		'gii' => [
			'class'      => 'yii\gii\Module',
			'generators' => [
				'kartikgii-crud' => ['class' => 'warrence\kartikgii\crud\Generator'],
			],
		],
	],
];
