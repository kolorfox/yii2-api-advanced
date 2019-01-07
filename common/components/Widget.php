<?php
/**
 * Created by DungTT.
 * @project diasky-us
 * @email   dungtt[at]gmail.com
 * @date    18/07/2016
 * @time    5:05 CH
 */

namespace common\components;
class Widget extends \yii\base\Widget {

	/**@var \common\models\User $user */
	public $user;

	/**
	 * {@inheritDoc}
	 */
	public function init() {
		parent::init();
		if (!\Yii::$app->user->isGuest) {
			$this->user = \Yii::$app->user->identity;
		} else {
			$this->user = null;
		}
	}
}