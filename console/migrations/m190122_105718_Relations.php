<?php

use yii\db\Migration;

class m190122_105718_Relations extends Migration {

	public function safeUp() {
		$this->addForeignKey('fk_profile_user_id', '{{%profile}}', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_social_account_user_id', '{{%social_account}}', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_token_user_id', '{{%token}}', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
	}

	public function safeDown() {

		$this->dropForeignKey('fk_profile_user_id', '{{%profile}}');
		$this->dropForeignKey('fk_social_account_user_id', '{{%social_account}}');
		$this->dropForeignKey('fk_token_user_id', '{{%token}}');
	}
}
