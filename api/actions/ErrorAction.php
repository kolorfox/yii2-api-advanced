<?php
/**
 * Created by Navatech.
 * @project yii2-api-advanced
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    1/21/2019
 * @time    5:27 PM
 */

namespace api\actions;

use Yii;

class ErrorAction extends \yii\web\ErrorAction {

	/**
	 * Runs the action.
	 *
	 * @return array result content
	 */
	public function run() {
		if ($this->layout !== null) {
			$this->controller->layout = $this->layout;
		}
		Yii::$app->getResponse()->setStatusCodeByException($this->exception);

		return $this->getViewRenderParams();
	}
}
