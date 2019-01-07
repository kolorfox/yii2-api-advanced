<?php
/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace backend\controllers\user;

use common\traits\UserAjaxValidationTrait;
use dektrium\user\models\RegistrationForm;
use dektrium\user\traits\EventTrait;
use yii\web\NotFoundHttpException;

/**
 * RegistrationController is responsible for all registration process, which includes registration of a new account,
 * resending confirmation tokens, email confirmation and registration via social networks.
 *
 * @property \dektrium\user\Module $module
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class RegistrationController extends \dektrium\user\controllers\RegistrationController {

	use UserAjaxValidationTrait;
	use EventTrait;

	/**
	 * Displays the registration page.
	 * After successful registration if enableConfirmation is enabled shows info message otherwise
	 * redirects to home page.
	 *
	 * @return string
	 * @throws \yii\base\ExitException
	 * @throws \yii\base\InvalidConfigException
	 * @throws NotFoundHttpException
	 */
	public function actionRegister() {
		if (!$this->module->enableRegistration) {
			throw new NotFoundHttpException();
		}
		/** @var RegistrationForm $model */
		$model = \Yii::createObject(RegistrationForm::class);
		$event = $this->getFormEvent($model);
		$this->trigger(self::EVENT_BEFORE_REGISTER, $event);
		$this->performAjaxValidation($model);
		if ($model->load(\Yii::$app->request->post()) && $model->register()) {
			$this->trigger(self::EVENT_AFTER_REGISTER, $event);
			return $this->redirect(['/user/security/login']);
		}
		return $this->render('register', [
			'model'  => $model,
			'module' => $this->module,
		]);
	}
}
