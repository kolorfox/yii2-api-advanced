<?php
/**
 * Created by Navatech.
 * @project visionlink-io
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    7/31/2018
 * @time    3:57 PM
 */

namespace backend\models\form;
class LoginForm extends \dektrium\user\models\LoginForm {

	/**
	 * @return bool
	 */
	public function login() {
		return parent::login();
	}
}
