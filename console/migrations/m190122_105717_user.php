<?php

use yii\db\Migration;
use yii\db\Schema;

class m190122_105717_user extends Migration {

	public function safeUp() {
		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		$this->createTable('{{%user}}', [
			'id'                => Schema::TYPE_PK . '',
			'username'          => Schema::TYPE_STRING . '(255) NOT NULL',
			'email'             => Schema::TYPE_STRING . '(255) NOT NULL',
			'password_hash'     => Schema::TYPE_STRING . '(60) NOT NULL',
			'auth_key'          => Schema::TYPE_STRING . '(32) NOT NULL',
			'confirmed_at'      => Schema::TYPE_INTEGER . '(11)',
			'unconfirmed_email' => Schema::TYPE_STRING . '(255)',
			'blocked_at'        => Schema::TYPE_INTEGER . '(11)',
			'registration_ip'   => Schema::TYPE_STRING . '(45)',
			'created_at'        => Schema::TYPE_INTEGER . '(11) NOT NULL',
			'updated_at'        => Schema::TYPE_INTEGER . '(11) NOT NULL',
			'flags'             => Schema::TYPE_INTEGER . '(11) NOT NULL DEFAULT "0"',
			'last_login_at'     => Schema::TYPE_INTEGER . '(11)',
		], $tableOptions);
		$this->createIndex('user_unique_username', '{{%user}}', 'username', 1);
		$this->createIndex('user_unique_email', '{{%user}}', 'email', 1);
		$this->insert('{{%user}}', [
			'id'                => '1',
			'username'          => 'admin',
			'email'             => 'admin@gmail.com',
			'password_hash'     => '$2y$10$TwhFrxRcMHIO9o87v4HupO9LLW./DlAD1IUDbweN.h2v3tI2wecki',
			'auth_key'          => 'fM7LPEA9dQ4y5R2762xi5pYEJxqbFuoQ',
			'confirmed_at'      => '1548154080',
			'unconfirmed_email' => '',
			'blocked_at'        => '',
			'registration_ip'   => '127.0.0.1',
			'created_at'        => '1548154080',
			'updated_at'        => '1548154080',
			'flags'             => '0',
			'last_login_at'     => '',
		]);
	}

	public function safeDown() {
		$this->dropIndex('user_unique_username', '{{%user}}');
		$this->dropIndex('user_unique_email', '{{%user}}');
		$this->dropTable('{{%user}}');
	}
}
