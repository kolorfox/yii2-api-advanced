<?php
/**
 * Created by Navatech.
 * @project btcauto-com
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    30/03/2018
 * @time    12:44 SA
 */

namespace common\components;

use common\models\EmailMessage;
use yii\base\InvalidConfigException;

class EmailManager extends \navatech\email\components\EmailManager {

	/**
	 * Singleton factory for obtaining manager instance
	 *
	 * @return EmailManager
	 * @throws InvalidConfigException
	 */
	public static function getInstance() {
		$instance = \Yii::$app->get('emailManager');
		if (!$instance instanceof static) {
			throw new InvalidConfigException('Missing email component.');
		}
		return $instance;
	}

	/**
	 * Queues email message
	 *
	 * @param       $from
	 * @param       $to
	 * @param       $subject
	 * @param       $text
	 * @param int   $priority
	 * @param array $files
	 * @param null  $bcc
	 *
	 * @return EmailMessage|null
	 */
	public function queue($from, $to, $subject, $text, $priority = 0, $files = [], $bcc = null) {
		if (is_array($bcc)) {
			$bcc = implode(', ', $bcc);
		}
		$model           = new EmailMessage();
		$model->from     = $from;
		$model->to       = $to;
		$model->subject  = $subject;
		$model->text     = $text;
		$model->priority = $priority;
		$model->files    = $files;
		$model->bcc      = $bcc;
		if ($model->save()) {
			return $model;
		} else {
			return null;
		}
	}
}
