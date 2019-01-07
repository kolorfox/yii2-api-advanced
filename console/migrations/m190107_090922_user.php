<?php

use yii\db\Migration;
use yii\db\Schema;

class m190107_090922_user extends Migration {

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
			'id'                => '2',
			'username'          => 'admin',
			'email'             => 'admin@gmail.com',
			'password_hash'     => '$2y$10$8DBurm8XHBsYZF.I16fO7Opj1emFlKV4bbTuCiMevrRgYTusyzfoW',
			'auth_key'          => 'h8T0DF9yqGKqEooDaoCkAaBL_WVjhm36',
			'confirmed_at'      => '1546850311',
			'unconfirmed_email' => '',
			'blocked_at'        => '',
			'registration_ip'   => '127.0.0.1',
			'created_at'        => '1546850311',
			'updated_at'        => '1546850311',
			'flags'             => '0',
			'last_login_at'     => '1546850562',
		]);
	}

	public function safeDown() {
		$this->dropIndex('user_unique_username', '{{%user}}');
		$this->dropIndex('user_unique_email', '{{%user}}');
		$this->dropTable('{{%user}}');
	}
}
