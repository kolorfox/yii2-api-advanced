<?php
/**
 * Created by PhpStorm.
 * User: phuon
 * Date: 25/07/2017
 * Time: 12:38 CH
 */

namespace common\models;

use BadMethodCallException;
use navatech\email\components\EmailManager;
use Yii;
use yii\helpers\VarDumper;

class EmailTemplate extends \navatech\email\models\EmailTemplate {

	/**
	 * @param string $shortcut
	 * @param string $language
	 *
	 * @return self
	 * @throws \yii\base\InvalidConfigException
	 */
	public static function findByShortcut($shortcut, $language = null) {
		if ($language == null) {
			$language = Yii::$app->language;
		}
		$template = static::findOne([
			'shortcut' => $shortcut,
			'language' => $language,
		]);
		if ($template === null) {
			$manager      = EmailManager::getInstance();
			$languageCode = $language;
			$list         = [
				$language,
				$manager->defaultLanguage,
				'en-US',
				'en',
			];
			foreach ($list as $l) {
				$template     = static::findOne([
					'shortcut' => $shortcut,
					'language' => $l,
				]);
				$languageCode = $l;
				if ($template) {
					return $template;
				}
			}
		} else {
			return $template;
		}
		if (YII_ENV_DEV) {
			return new self();
		}
		throw new BadMethodCallException('Template not found: ' . VarDumper::dumpAsString($shortcut) . ', language ' . $languageCode);
	}

	/**
	 * Queues current template for sending with the given priority
	 *
	 * @param       $to
	 * @param array $params
	 * @param int   $priority
	 * @param array $files
	 * @param null  $bcc
	 *
	 * @return bool
	 * @throws \yii\base\InvalidConfigException
	 */
	public function queue($to, array $params = [], $priority = 0, $files = [], $bcc = null) {
		$text    = $this->renderAttribute('text', $params);
		$subject = $this->renderAttribute('subject', $params);
		EmailManager::getInstance()->queue($this->from, $to, $subject, $text, $priority, $files, $bcc);
		return true;
	}

	/**
	 * Queues current template for sending with the given priority
	 *
	 * @param       $to
	 * @param array $params
	 * @param array $files
	 * @param null  $bcc
	 *
	 * @return bool
	 * @throws \yii\base\InvalidConfigException
	 */
	public function send($to, array $params = [], $files = [], $bcc = null) {
		$text            = ($this->renderAttribute('text', $params));
		$subject         = $this->renderAttribute('subject', $params);
		$model           = new EmailMessage();
		$model->from     = $this->from;
		$model->to       = $to;
		$model->subject  = $subject;
		$model->text     = $text;
		$model->priority = 1;
		$model->files    = $files;
		$model->bcc      = $bcc;
		$model->status   = 2;
		$model->save();
		EmailManager::getInstance()->send($this->from, $to, $subject, $text, $files, $bcc);
		return true;
	}
}
