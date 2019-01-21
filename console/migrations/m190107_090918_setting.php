<?php

use yii\db\Migration;
use yii\db\Schema;
use yii\helpers\Json;

class m190107_090918_setting extends Migration {

	public function safeUp() {
		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		$this->createTable('{{%setting}}', [
			'id'          => Schema::TYPE_PK . '',
			'parent_id'   => Schema::TYPE_INTEGER . '(11) NOT NULL DEFAULT "0"',
			'code'        => Schema::TYPE_STRING . '(32) NOT NULL',
			'name'        => Schema::TYPE_STRING . '(255)',
			'desc'        => Schema::TYPE_TEXT . '',
			'type'        => Schema::TYPE_STRING . '(255) NOT NULL',
			'store_range' => Schema::TYPE_TEXT . '',
			'store_dir'   => Schema::TYPE_STRING . '(255)',
			'value'       => Schema::TYPE_TEXT . '',
			'sort_order'  => Schema::TYPE_INTEGER . '(11) DEFAULT "50"',
			'store_url'   => Schema::TYPE_STRING . '(255)',
			'icon'        => Schema::TYPE_STRING . '(255) NOT NULL DEFAULT ""',
		], $tableOptions);
		$this->createIndex('parent_id', '{{%setting}}', 'parent_id', 0);
		$this->createIndex('code', '{{%setting}}', 'code', 0);
		$this->createIndex('sort_order', '{{%setting}}', 'sort_order', 0);
		$this->insert('{{%setting}}', [
			'id'          => '1',
			'parent_id'   => '0',
			'code'        => 'smtp',
			'name'        => 'SMTP Configure',
			'desc'        => '',
			'type'        => 'group',
			'store_range' => '',
			'store_dir'   => '',
			'value'       => '',
			'sort_order'  => '1',
			'store_url'   => '',
			'icon'        => 'glyphicon-envelope',
		]);
		$this->insert('{{%setting}}', [
			'id'          => '2',
			'parent_id'   => '1',
			'code'        => 'smtp_host',
			'name'        => 'SMTP Host',
			'desc'        => '',
			'type'        => 'text',
			'store_range' => '',
			'store_dir'   => '',
			'value'       => 'smtp.mailgun.org',
			'sort_order'  => '1',
			'store_url'   => '',
			'icon'        => '',
		]);
		$this->insert('{{%setting}}', [
			'id'          => '3',
			'parent_id'   => '1',
			'code'        => 'smtp_user',
			'name'        => 'SMTP User',
			'desc'        => '',
			'type'        => 'text',
			'store_range' => '',
			'store_dir'   => '',
			'value'       => 'test@mg.navademo.com',
			'sort_order'  => '2',
			'store_url'   => '',
			'icon'        => '',
		]);
		$this->insert('{{%setting}}', [
			'id'          => '4',
			'parent_id'   => '1',
			'code'        => 'smtp_password',
			'name'        => 'SMTP Password',
			'desc'        => '',
			'type'        => 'text',
			'store_range' => '',
			'store_dir'   => '',
			'value'       => '123456',
			'sort_order'  => '3',
			'store_url'   => '',
			'icon'        => '',
		]);
		$this->insert('{{%setting}}', [
			'id'          => '5',
			'parent_id'   => '1',
			'code'        => 'smtp_port',
			'name'        => 'SMTP Port',
			'desc'        => '',
			'type'        => 'number',
			'store_range' => '',
			'store_dir'   => '',
			'value'       => '587',
			'sort_order'  => '4',
			'store_url'   => '',
			'icon'        => '',
		]);
		$this->insert('{{%setting}}', [
			'id'          => '6',
			'parent_id'   => '1',
			'code'        => 'smtp_encryption',
			'name'        => 'SMTP Encryption',
			'desc'        => '',
			'type'        => 'select',
			'store_range' => Json::encode([
				'none' => "None",
				"ssl"  => "SSL",
				"tls"  => "TLS",
			]),
			'store_dir'   => '',
			'value'       => 'tls',
			'sort_order'  => '5',
			'store_url'   => '',
			'icon'        => '',
		]);
	}

	public function safeDown() {
		$this->dropIndex('parent_id', '{{%setting}}');
		$this->dropIndex('code', '{{%setting}}');
		$this->dropIndex('sort_order', '{{%setting}}');
		$this->dropTable('{{%setting}}');
	}
}
