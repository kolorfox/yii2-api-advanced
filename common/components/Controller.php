<?php
/**
 * Created by DungTT.
 * @project diasky-us
 * @email   dungtt[at]gmail.com
 * @date    18/07/2016
 * @time    5:05 CH
 */

namespace common\components;

use common\models\User;
use Yii;

class Controller extends \yii\web\Controller {

	/**@var User */
	public $user;

	/**
	 * {@inheritDoc}
	 */
	public function init() {
		parent::init();
		if (!Yii::$app->session->isActive) {
			Yii::$app->session->open();
		}
		$this->user         = \Yii::$app->user->identity;
		$this->view->params = array_merge_recursive($this->view->params, Yii::$app->params);
	}
}