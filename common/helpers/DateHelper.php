<?php
/**
 * Created by Unknown.
 * @project sgl
 * @author  Unknown
 * @email   admin@example.com
 * @date    6/29/2016
 * @time    3:28 PM
 */

namespace common\helpers;

use DateTime;

class DateHelper {

	/**
	 * @param        $current_date
	 * @param string $source_format
	 * @param string $destination_format
	 *
	 * @return string
	 */
	public static function format($current_date, $source_format = 'Y-m-d', $destination_format = 'd-m-Y') {
		$date = DateTime::createFromFormat($source_format, $current_date);
		if (!$date) {
			return $current_date;
		} else {
			return $date->format($destination_format);
		}
	}

	/**
	 * @param        $time
	 * @param string $format
	 *
	 * @return false|string
	 */
	public static function convert($time, $format = 'd-m-Y') {
		return date($format, $time);
	}

	/**
	 * @param null $seconds
	 *
	 * @return bool
	 */
	public static function isWeekend($seconds = null) {
		if ($seconds == null) {
			$seconds = time();
		}
		return in_array(date('w', $seconds), [
			0,
			6,
		]);
	}

	/**
	 * @param $date
	 *
	 * @return bool
	 */
	public static function isWeekendOfDate($date) {
		return (date('N', strtotime($date)) >= 6);
	}
}
