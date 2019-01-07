<?php
/**
 * Created by Navatech.
 * @project account-aithercoin-com
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    06/07/2018
 * @time    11:32 SA
 */

namespace backend\controllers\user;
class RecoveryController extends \dektrium\user\controllers\RecoveryController {

	public function actionRequest() {
		\Yii::$app->layout = "main-guest";
		return parent::actionRequest();
	}
}
