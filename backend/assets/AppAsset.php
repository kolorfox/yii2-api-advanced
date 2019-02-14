<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle {

	public $basePath  = '@webroot';

	public $baseUrl   = '@web';

	public $css       = [
		'css/fontawesome-all.min.css',
		'css/site.css',
		'css/custom.css',
	];

	public $depends   = [
		'yii\web\YiiAsset',
		'yii\jui\JuiAsset',
		'yii\bootstrap\BootstrapAsset',
	];

	public $jsOptions = [
		'position' => View::POS_HEAD,
	];
}
