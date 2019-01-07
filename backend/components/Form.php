<?php

namespace backend\components;

use common\models\User;
use Yii;
use yii\base\Model as BaseForm;

/**
 * ActivePinForm
 */
class Form extends BaseForm {

	/**@var User $user */
	public $user;

	public function __construct(array $config = []) {
		parent::__construct($config);
		$this->user = Yii::$app->user->identity;
	}
}