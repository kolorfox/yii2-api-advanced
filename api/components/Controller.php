<?php
/**
 * Created by JavFeed.
 * @project JavFeed
 * @author  JavFeed
 * @email   javstickcom[at]gmail.com
 * @date    2/19/2016
 * @time    4:53 PM
 */

namespace api\components;

use yii\web\Response;

/**
 * {@inheritDoc}
 */
class Controller extends \yii\rest\Controller {

	public $code    = 0;

	public $status  = 200;

	public $message = 'OK';

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		\Yii::$app->response->format = Response::FORMAT_JSON;
	}

	/**
	 * @return array
	 */
	public function behaviors() {
		$behaviors                                 = parent::behaviors();
		$behaviors['contentNegotiator']['formats'] = [
			'application/json' => Response::FORMAT_JSON,
		];
		return $behaviors;
	}

	/**
	 * @param $action
	 * @param $result
	 *
	 * @return mixed
	 */
	public function afterAction($action, $result) {
		$response['status']  = $this->status;
		$response['code']    = $this->code;
		$response['message'] = $this->message;
		$response['result']  = $result;
		return parent::afterAction($action, $response);
	}
}
