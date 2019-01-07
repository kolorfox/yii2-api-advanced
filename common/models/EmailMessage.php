<?php

namespace common\models;
/**
 * This is the model class for table "email_message".
 */
class EmailMessage extends \navatech\email\models\EmailMessage {

	const STATUS = [
		'New',
		'In progress',
		'Sent',
		'Error',
	];
}
