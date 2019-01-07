<?php

namespace common\models\search;

use common\models\EmailMessage;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * EmailMessageSearch represents the model behind the search form about `common\models\EmailMessage`.
 */
class EmailMessageSearch extends EmailMessage {

	public function rules() {
		return [
			[
				[
					'id',
					'status',
					'priority',
				],
				'integer',
			],
			[
				[
					'from',
					'to',
					'subject',
					'text',
					'created_at',
					'sent_at',
					'bcc',
					'files',
				],
				'safe',
			],
		];
	}

	public function scenarios() {
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();
	}

	public function search($params) {
		$query        = EmailMessage::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'sort'  => [
				'defaultOrder' => [
					'id' => SORT_DESC,
				],
			],
		]);
		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}
		$query->andFilterWhere([
			'id'         => $this->id,
			'status'     => $this->status,
			'priority'   => $this->priority,
			'created_at' => $this->created_at,
			'sent_at'    => $this->sent_at,
		]);
		$query->andFilterWhere([
			'like',
			'from',
			$this->from,
		])->andFilterWhere([
			'like',
			'to',
			$this->to,
		])->andFilterWhere([
			'like',
			'subject',
			$this->subject,
		])->andFilterWhere([
			'like',
			'text',
			$this->text,
		])->andFilterWhere([
			'like',
			'bcc',
			$this->bcc,
		])->andFilterWhere([
			'like',
			'files',
			$this->files,
		]);
		return $dataProvider;
	}
}
