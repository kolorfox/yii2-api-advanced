<?php
/**
 * Created by Unknown.
 * @project dashboard
 * @author  Unknown
 * @email   notteen[at]gmail.com
 * @date    16/08/2017
 * @time    1:37 SA
 */

namespace common\helpers;
class NumberHelper {

	/**
	 * @param int $length
	 *
	 * @return string
	 */
	public static function random($length = 6) {
		$characters       = '0123456789';
		$charactersLength = strlen($characters);
		$randomString     = '';
		for ($i = 0; $i < $length; $i ++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	/**
	 * @param $amount
	 *
	 * @return float
	 */
	public static function amount($amount) {
		return round($amount / 10000, 3);
	}

	/**
	 * @param $nums
	 *
	 * @return int
	 */
	public static function sum_of_digits($nums) {
		$digits_sum = 0;
		for ($i = 0; $i < strlen($nums); $i ++) {
			$digits_sum += $nums[$i];
		}
		return $digits_sum;
	}
}