<?php

use yii\db\Migration;
use yii\db\Schema;

class m190107_090915_email_template extends Migration {

	public function safeUp() {
		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		$this->createTable('{{%email_template}}', [
			'id'       => Schema::TYPE_PK . '',
			'shortcut' => Schema::TYPE_STRING . '(255) NOT NULL',
			'from'     => Schema::TYPE_STRING . '(255) NOT NULL',
			'subject'  => Schema::TYPE_STRING . '(255)',
			'text'     => Schema::TYPE_TEXT . ' NOT NULL',
			'language' => Schema::TYPE_STRING . '(255)',
		], $tableOptions);
		$this->createIndex('shortcut', '{{%email_template}}', 'shortcut,language', 1);
		$this->insert('{{%email_template}}', [
			'id'       => '1',
			'shortcut' => 'welcome_user',
			'from'     => 'support@navatech.vn',
			'subject'  => 'Welcome new user',
			'text'     => 'Please edit this template',
			'language' => 'en',
		]);
	}

	public function safeDown() {
		$this->dropIndex('shortcut', '{{%email_template}}');
		$this->dropTable('{{%email_template}}');
	}
}
