<?php

namespace api\controllers;

use api\components\Controller;
use Yii;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends Controller {

	/**
	 * Displays homepage.
	 *
	 * @return mixed
	 */
	public function actionIndex() {
		return [];
	}

	/**
	 * {@inheritdoc}
	 */
	public function actionError() {
		if (($exception = Yii::$app->getErrorHandler()->exception) === null) {
			$exception = new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
		}
		$this->status  = $exception->statusCode;
		$this->message = $exception->getMessage();
		$this->code    = - 1;
		return [
			'line'     => $exception->getLine(),
			'file'     => $exception->getFile(),
			'name'     => $exception->getName(),
			'trace'    => $exception->getTrace(),
			'previous' => [
				'message' => $exception->getPrevious()->getMessage(),
				'line'    => $exception->getPrevious()->getLine(),
				'file'    => $exception->getPrevious()->getFile(),
				'trace'   => $exception->getPrevious()->getTrace(),
			],
		];
	}
}
