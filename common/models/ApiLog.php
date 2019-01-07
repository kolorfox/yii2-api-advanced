<?php

namespace common\models;

use common\components\Model;
use yii\helpers\Json;

/**
 * This is the model class for table "api_log".
 *
 * @property int    $id
 * @property string $name
 * @property int    $data
 * @property string $type
 * @property string $created_at
 */
class ApiLog extends Model {

	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'api_log';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[
				[
					'data',
					'name',
				],
				'required',
			],
			[
				[
					'type',
					'name',
				],
				'string',
			],
			[
				[
					'data',
					'created_at',
				],
				'safe',
			],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'id'         => 'ID',
			'data'       => 'Data',
			'type'       => 'Type',
			'created_at' => 'Created At',
		];
	}

	/**
	 * @param $name
	 * @param $data
	 */
	public static function send($name, $data) {
		if (YII_ENV_DEV) {
			$model = new self();
			if (is_array($data)) {
				$model->data = Json::encode($data);
			} else {
				$model->data = $data;
			}
			$model->name = $name;
			$model->type = 'send';
			$model->save();
		}
	}

	/**
	 * @param $name
	 * @param $data
	 */
	public static function receive($name, $data) {
		if (YII_ENV_DEV) {
			$model = new self();
			if (is_array($data)) {
				$model->data = Json::encode($data);
			} else {
				$model->data = $data;
			}
			$model->name = $name;
			$model->type = 'receive';
			$model->save();
		}
	}
}
