<?php

namespace backend\assets;

use yii\web\AssetBundle;

class AdminLtePluginAsset extends AssetBundle {

	public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';

	public $js         = [
		'datatables/dataTables.bootstrap.min.js',
		'jvectormap/jquery-jvectormap-1.2.2.min.js',
		'jvectormap/jquery-jvectormap-world-mill-en.js',
		'bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
	];

	public $css        = [
		'datatables/dataTables.bootstrap.css',
		// more plugin CSS here
	];

	public $depends    = [
		'dmstr\web\AdminLteAsset',
	];
}
