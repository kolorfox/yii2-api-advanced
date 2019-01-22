<?php

use backend\assets\AppAsset;
use backend\components\View;
use dmstr\helpers\AdminLteHelper;
use dmstr\web\AdminLteAsset;
use yii\helpers\Html;

/* @var $this View */
/* @var $content string */
AdminLteAsset::register($this);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>
<body class="<?= AdminLteHelper::skinClass() ?>">
<?php $this->beginBody() ?>
<div class="wrapper">
	<?= $this->render('header') ?>

	<?= $this->render('left') ?>

	<?= $this->render('content', [
		'content' => $content,
	]) ?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
