<?php
/**
 * Created by Navatech.
 *
 * @project html
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    12/17/2017
 * @time    12:52 AM
 */

namespace backend\controllers\mailer;

use yii\filters\AccessControl;

class TemplateController extends \navatech\email\controllers\TemplateController {

	/**
	 * @return array
	 */
	public function behaviors() {
		$behaviors           = parent::behaviors();
		$behaviors['access'] = [
			'class' => AccessControl::class,
			'rules' => [
				[
					'actions' => [
						'index',
						'view',
						'update',
						'create',
						'delete',
					],
					'allow'   => true,
					'roles'   => ['@'],
				],
			],
		];
		return $behaviors;
	}
}
