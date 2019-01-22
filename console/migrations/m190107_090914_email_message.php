<?php

use yii\db\Migration;
use yii\db\Schema;

class m190107_090914_email_message extends Migration {

	public function safeUp() {
		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		$this->createTable('{{%email_message}}', [
			'id'         => Schema::TYPE_PK . '',
			'status'     => Schema::TYPE_INTEGER . '(11) NOT NULL DEFAULT "0"',
			'priority'   => Schema::TYPE_INTEGER . '(11) NOT NULL DEFAULT "0"',
			'from'       => Schema::TYPE_STRING . '(255)',
			'to'         => Schema::TYPE_STRING . '(255)',
			'subject'    => Schema::TYPE_STRING . '(255)',
			'text'       => Schema::TYPE_TEXT . '',
			'created_at' => Schema::TYPE_INTEGER . '(11)',
			'sent_at'    => Schema::TYPE_INTEGER . '(11)',
			'bcc'        => Schema::TYPE_TEXT . '',
			'files'      => Schema::TYPE_TEXT . '',
			'try_time'   => Schema::TYPE_INTEGER . ' DEFAULT 0',
		], $tableOptions);
	}

	public function safeDown() {
		$this->dropTable('{{%email_message}}');
	}
}
