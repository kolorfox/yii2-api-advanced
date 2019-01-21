<?php

namespace api\modules\v1\controllers;

use api\components\AuthController;

/**
 * Site controller
 */
class SiteController extends AuthController {

	/**
	 * Displays homepage.
	 *
	 * @return mixed
	 */
	public function actionIndex() {
		return [];
	}
}
