<?php
/**
 * Created by Navatech.
 * @project yii2-api-advanced
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    1/21/2019
 * @time    6:06 PM
 */

namespace common\transports;
class Mail extends \navatech\backup\transports\Mail {

	public $enable    = true;

	public $fromEmail = 'support@gmail.com';

	public $toEmail   = 'phuong17889@gmail.com';
}
