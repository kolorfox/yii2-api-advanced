<?php
/**
 * Created by Navatech.
 * @project visionlink-io
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    8/8/2018
 * @time    5:32 PM
 */

namespace backend\controllers\user;

use backend\models\search\UserSearch;
use Yii;

class AdminController extends \dektrium\user\controllers\AdminController {

	/**
	 * Lists all User models.
	 *
	 * @return mixed
	 * @throws \yii\base\InvalidConfigException
	 */
	public function actionIndex() {
		$searchModel  = Yii::createObject(UserSearch::class);
		$dataProvider = $searchModel->search(Yii::$app->request->get());
		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel'  => $searchModel,
		]);
	}
}
