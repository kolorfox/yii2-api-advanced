<?php
/**
 * Created by Navatech.
 * @project office
 * @author  Duongnh
 * @email   duongnh.nava[at]gmail.com
 * @date    3/26/2018
 * @time    10:45 AM
 */


namespace common\traits;

use yii\base\Model;
use yii\bootstrap\ActiveForm;
use yii\web\Response;

trait UserAjaxValidationTrait {

	/**
	 * Performs ajax validation.
	 *
	 * @param Model $model
	 *
	 * @throws \yii\base\ExitException
	 */
	protected function performAjaxValidation(Model $model) {
		if (\Yii::$app->request->isAjax && $model->load(\Yii::$app->request->post()) && !isset($_POST['submit'])) {
			\Yii::$app->response->format = Response::FORMAT_JSON;
			\Yii::$app->response->data   = ActiveForm::validate($model);
			\Yii::$app->response->send();
			\Yii::$app->end();
		}
	}
}
