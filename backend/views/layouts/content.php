<?php

use common\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\widgets\Breadcrumbs;

/**
 * @var string $content
 */
?>
<div class="content-wrapper">
	<section class="content-header">
		<?php if (isset($this->blocks['content-header'])) { ?>
			<h1><?= $this->blocks['content-header'] ?></h1>
		<?php } else { ?>
			<h1>
				<?php
				if ($this->title !== null) {
					echo Html::encode($this->title);
				} else {
					echo Inflector::camel2words(Inflector::id2camel($this->context->module->id));
					echo ($this->context->module->id !== Yii::$app->id) ? '<small>Module</small>' : '';
				} ?>
			</h1>
		<?php } ?>

		<?php try {
			echo Breadcrumbs::widget([
				'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			]);
		} catch (Exception $e) {
		} ?>
	</section>

	<section class="content">
		<?php try {
			echo Alert::widget();
		} catch (Exception $e) {
		} ?>
		<?= $content ?>
	</section>
</div>

<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<b>Version</b> 2.0
	</div>
	<strong>Copyright &copy; <?= date("Y") ?> <a href="#">Navatech</a>.</strong> All
	rights
	reserved.
</footer>

