<?php

namespace backend\controllers\user;

use backend\models\User;
use common\traits\UserAjaxValidationTrait;

class SecurityController extends \dektrium\user\controllers\SecurityController {

	use UserAjaxValidationTrait;

	/**
	 * @return \yii\web\Response
	 * @throws \Throwable
	 * @throws \yii\base\InvalidConfigException
	 */
	public function actionLogout() {
		$event = $this->getUserEvent(\Yii::$app->user->identity);
		$this->trigger(self::EVENT_BEFORE_LOGOUT, $event);
		/**@var User $user */
		$user = \Yii::$app->getUser()->getIdentity();
		if (\Yii::$app->getUser()->logout()) {
			$user->updateAttributes(['flags' => 0]);
		}
		$this->trigger(self::EVENT_AFTER_LOGOUT, $event);
		return $this->goHome();
	}
}
