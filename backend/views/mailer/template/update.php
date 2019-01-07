<?php
use yii\helpers\Html;

/**
 * @var yii\web\View                        $this
 * @var navatech\email\models\EmailTemplate $model
 */
$this->title                   = Yii::t('email', 'Update Email Template') . ': ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = [
	'label' => $this->title,
	'url'   => ['index'],
];
$this->params['breadcrumbs'][] = [
	'label' => $model->subject,
	'url'   => [
		'view',
		'id' => $model->id,
	],
];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="navatech-email">
	<div class="row">
		<div class="col-sm-12">
			<div class="box">
				<div class="box-header with-border">
					<i class="fa fa-plus"></i>

					<h3 class="box-title"><?= $this->title ?></h3>
				</div>
				<div class="box-body">
					<div class="mailer-update">
						<?= $this->render('_form', [
							'model' => $model,
						]) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
