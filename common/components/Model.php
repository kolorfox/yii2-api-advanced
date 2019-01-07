<?php
/**
 * Created by DungTT.
 *
 * @project diasky-us
 * @email   dungtt[at]gmail.com
 * @date    18/07/2016
 * @time    5:05 CH
 */

namespace common\components;

use yii\db\ActiveRecord;

class Model extends ActiveRecord {

	const STATUS_ENABLE  = 1;

	const STATUS_DISABLE = 0;

	const STATUS         = [
		self::STATUS_DISABLE => 'Disable',
		self::STATUS_ENABLE  => 'Enable',
	];

	/**
	 * @param null|array $data
	 * @param int        $index
	 *
	 * @return array|string
	 */
	public static function statusLabels($index = 1, $data = null) {
		if ($data == null) {
			$data = [
				'danger',
				'info',
				'warning',
				'success',
			];
		}
		return $data[$index];
	}
}
