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

/**
 * @property $apiAttributes
 */
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

	/**
	 * @param $attrs
	 *
	 * @return array
	 */
	public function getApiAttributes($attrs = null) {
		$attributes = $this->attributes;
		if ($this->hasAttribute('created_at')) {
			unset($attributes['created_at']);
		}
		if ($this->hasAttribute('updated_at')) {
			unset($attributes['updated_at']);
		}
		if ($this->hasAttribute('link')) {
			unset($attributes['link']);
		}
		if (!is_array($attrs)) {
			$attrs = [$attrs];
		}
		if ($attrs != null) {
			foreach ($attrs as $attr) {
				if ($this->hasAttribute($attr)) {
					unset($attributes[$attr]);
				}
			}
		}
		foreach ($attributes as $attribute => $value) {
			if ($value === null) {
				$attributes[$attribute] = "";
			}
		}
		return $attributes;
	}
}
