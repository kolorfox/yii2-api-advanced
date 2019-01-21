<?php

namespace api\components;

use api\models\User;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\web\Response;

/**
 * {@inheritDoc}
 */
class AuthController extends Controller {

	/**
	 * @return array
	 */
	public function behaviors() {
		$behaviors                                 = parent::behaviors();
		$behaviors['contentNegotiator']['formats'] = [
			'application/json' => Response::FORMAT_JSON,
		];
		$behaviors['authenticator']                = [
			'class'       => CompositeAuth::class,
			'authMethods' => [
				[
					'class' => HttpBasicAuth::class,
					'auth'  => function($username, $password) {
						$userAccount = User::findOne([
							'username' => $username,
							'password' => $password,
						]);
						return $userAccount;
					},
				],
				[
					'class'      => QueryParamAuth::class,
					'tokenParam' => 'secret_key',
				],
				[
					'class' => HttpBearerAuth::class,
				],
			],
		];
		return $behaviors;
	}
}
