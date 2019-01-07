<?php

namespace common\swiftmailer;

use Yii;

/**
 * Created by PhpStorm.
 * User: phuon
 * Date: 20/07/2017
 * Time: 12:54 SA
 */
class Mailer extends \navatech\email\swiftmailer\Mailer {

	/**
	 * {@inheritDoc}
	 * @throws \yii\base\InvalidConfigException
	 */
	public function init() {
		parent::init();
		$configure              = [
			'class'         => 'Swift_SmtpTransport',
			'host'          => Yii::$app->setting->get('smtp_host'),
			'username'      => Yii::$app->setting->get('smtp_user'),
			'password'      => Yii::$app->setting->get('smtp_password'),
			'port'          => Yii::$app->setting->get('smtp_port'),
			'encryption'    => Yii::$app->setting->get('smtp_encryption'),
			'streamOptions' => [
				'ssl' => [
					'allow_self_signed' => true,
					'verify_peer'       => false,
					'verify_peer_name'  => false,
				],
			],
		];
		$this->useFileTransport = false;
		$this->setTransport($configure);
	}
}
