<?php
/**
 * Created by PhpStorm.
 * User: phuon
 * Date: 25/07/2017
 * Time: 11:09 CH
 */

namespace common\helpers;
class ArrayHelper extends \yii\helpers\ArrayHelper {

	/**
	 * @param $array
	 * @param $from
	 * @param $to
	 * @param $attribute
	 *
	 * @return array
	 */
	public static function mapAttribute($array, $from, $to, $attribute) {
		$data     = self::map($array, $from, $to);
		$response = [];
		foreach ($data as $key => $datum) {
			$response[$key] = [$attribute => $datum];
		}
		return $response;
	}

	/**
	 * @param array  $source
	 * @param array  $destination
	 * @param string $attribute
	 *
	 * @return array
	 */
	public static function optionAttribute($source, $destination, $attribute) {
		$response = [];
		foreach ($source as $key => $datum) {
			$response[$key] = [$attribute => $destination[$key]];
		}
		return $response;
	}

	/**
	 * @param $array
	 *
	 * @return array
	 */
	public static function whoCanDepositArrayKeys($array) {
		$response = [];
		foreach ($array as $key => $item) {
			if (is_array($item)) {
				foreach ($item as $subKey => $value) {
					$response[] = $subKey;
				}
			} else {
				$response[] = $key;
			}
		}
		return array_unique($response);
	}
}
