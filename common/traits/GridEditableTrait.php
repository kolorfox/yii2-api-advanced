<?php
/**
 * Created by Navatech.
 * @project cp-bestbuyiptv-com
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    11/9/2018
 * @time    11:38 AM
 */

namespace common\traits;

use common\components\Model;
use ReflectionClass;
use Yii;
use yii\helpers\Json;

trait GridEditableTrait {

	/**
	 * @param string $class
	 *
	 * @throws \ReflectionException
	 */
	protected function editable($class) {
		if (Yii::$app->request->post('hasEditable')) {
			$reflect = new ReflectionClass($class);
			$timeId  = Yii::$app->request->post('editableKey');
			/**@var Model $class */
			$model                          = $class::findOne($timeId);
			$out                            = [
				'output'  => '',
				'message' => '',
			];
			$post                           = [];
			$posted                         = current($_POST[$reflect->getShortName()]);
			$post[$reflect->getShortName()] = $posted;
			if ($model->load($post) && $model->save()) {
				Yii::$app->response->format = 'json';
				if (isset($posted['status'])) {
					$out['output'] = $class::STATUS[$model->getAttribute('status')];
				}
			}
			echo Json::encode($out);
			die;
		}
	}
}
