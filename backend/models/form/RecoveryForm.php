<?php
/**
 * Created by Navatech.
 * @project account-aithercoin-com
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    12/07/2018
 * @time    4:21 CH
 */

namespace backend\models\form;

use common\models\EmailTemplate;
use common\models\User;
use dektrium\user\models\Token;

class RecoveryForm extends \dektrium\user\models\RecoveryForm {

	/**
	 * Sends recovery message.
	 *
	 * @return bool
	 * @throws \yii\base\InvalidConfigException
	 */
	public function sendRecoveryMessage() {
		if (!$this->validate()) {
			return false;
		}
		$user = $this->finder->findUserByEmail($this->email);
		if ($user instanceof User) {
			/** @var Token $token */
			$token = \Yii::createObject([
				'class'   => Token::class,
				'user_id' => $user->id,
				'type'    => Token::TYPE_RECOVERY,
			]);
			if (!$token->save(false)) {
				return false;
			}
			EmailTemplate::findByShortcut('forgot_password')->send($user->email, [
				'url' => $token->getUrl(),
			]);
		}
		\Yii::$app->session->setFlash('info', \Yii::t('user', 'An email has been sent with instructions for resetting your password'));
		return true;
	}
}
