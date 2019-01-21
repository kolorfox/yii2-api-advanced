<?php
/**
 * Created by Navatech.
 * @project free-ebooks-web
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    1/8/2019
 * @time    12:56 PM
 */

namespace api\models;
class User extends \common\models\User {

	/**
	 * @param      $token
	 * @param null $type
	 *
	 * @return User
	 */
	public static function findIdentityByAccessToken($token, $type = null) {
		return self::findOne(['auth_key' => $token]);
	}
}
