<?php

namespace backend\models\search;

use backend\models\User;
use yii\data\ActiveDataProvider;

/**
 * UserSearch represents the model behind the search form of `backend\models\User`.
 */
class UserSearch extends User {

	/** @inheritdoc */
	public function rules() {
		return [
			'fieldsSafe'       => [
				[
					'id',
					'username',
					'email',
					'registration_ip',
					'created_at',
					'last_login_at',
				],
				'safe',
			],
			'createdDefault'   => [
				'created_at',
				'default',
				'value' => null,
			],
			'lastloginDefault' => [
				'last_login_at',
				'default',
				'value' => null,
			],
		];
	}

	/**
	 * @param $params
	 *
	 * @return ActiveDataProvider
	 */
	public function search($params) {
		$query        = $this->finder->getUserQuery();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'sort'  => ['defaultOrder' => ['created_at' => SORT_DESC]],
		]);
		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}
		$modelClass = $query->modelClass;
		$table_name = $modelClass::tableName();
		if ($this->created_at !== null) {
			$date = strtotime($this->created_at);
			$query->andFilterWhere([
				'between',
				$table_name . '.created_at',
				$date,
				$date + 3600 * 24,
			]);
		}
		$query->andFilterWhere([
			'like',
			$table_name . '.username',
			$this->username,
		])->andFilterWhere([
			'like',
			$table_name . '.email',
			$this->email,
		])->andFilterWhere([$table_name . '.id' => $this->id])->andFilterWhere([$table_name . '.registration_ip' => $this->registration_ip]);
		return $dataProvider;
	}
}
