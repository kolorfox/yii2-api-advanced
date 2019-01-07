<?php
/**
 * Created by Navatech.
 * @project cp-bestbuyiptv-com
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    10/17/2018
 * @time    10:25 AM
 */

namespace common\models;

use common\helpers\NetworkHelper;
use dektrium\user\helpers\Password;
use dektrium\user\models\Token;
use RuntimeException;
use Yii;

/**
 */
class User extends \dektrium\user\models\User {

	/**
	 * This method is used to register new user account. If Module::enableConfirmation is set true, this method
	 * will generate new confirmation token and use mailer to send it to the user.
	 * @return self|bool
	 *
	 * @throws \Exception
	 */
	public function register() {
		if ($this->getIsNewRecord() == false) {
			throw new RuntimeException('Calling "' . __CLASS__ . '::' . __METHOD__ . '" on existing user');
		}
		$transaction = Yii::$app->db->beginTransaction();
		try {
			$this->confirmed_at    = $this->module->enableConfirmation ? null : time();
			$this->password        = $this->module->enableGeneratingPassword ? Password::generate(8) : $this->password;
			$this->registration_ip = NetworkHelper::realIP();
			$this->trigger(self::BEFORE_REGISTER);
			if (!$this->save()) {
				$transaction->rollBack();
				return false;
			}
			if ($this->module->enableConfirmation) {
				/** @var Token $token */
				$token = Yii::createObject([
					'class' => Token::class,
					'type'  => Token::TYPE_CONFIRMATION,
				]);
				$token->link('user', $this);
			}
			//TODO KOLORFOX edit email if needed
			EmailTemplate::findByShortcut('welcome_user')->queue($this->email, [
				'username' => $this->username,
				'password' => $this->password,
			]);
			$this->trigger(self::AFTER_REGISTER);
			$transaction->commit();
			return $this;
		} catch (\Exception $e) {
			$transaction->rollBack();
			Yii::warning($e->getMessage());
			throw $e;
		}
	}
}
