<?php

use kartik\grid\GridView;
use yii\helpers\Html;

/**
 * @var yii\web\View                $this
 * @var yii\data\ActiveDataProvider $dataProvider
 */
$this->title                   = 'Email template';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-template-index">

	<p>
		<?= Html::a('<i class="glyphicon glyphicon-plus"></i> Create new', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?php try {
		echo GridView::widget([
			'dataProvider'     => $dataProvider,
			'export'           => false,
			'pjax'             => true,
			'hover'            => true,
			'bordered'         => true,
			'striped'          => true,
			'condensed'        => true,
			'responsive'       => true,
			'persistResize'    => false,
			'panel'            => [
				'type'    => 'primary',
				'heading' => Yii::t('setting', 'Setting configure'),
			],
			'containerOptions' => ['style' => 'overflow: auto'],
			'headerRowOptions' => ['class' => 'kartik-sheet-style'],
			'filterRowOptions' => ['class' => 'kartik-sheet-style'],
			'columns'          => [
				'shortcut',
				'language',
				'from',
				'subject',
				[
					'class'    => 'yii\grid\ActionColumn',
					'template' => '{test} {update} {delete}',
					'buttons'  => [
						'test' => function($url, $model, $key) {
							return Html::a('<span class="glyphicon glyphicon-upload"></span>', [
								'test',
								'shortcut' => $model->shortcut,
								'language' => $model->language,
							]);
						},
					],
				],
			],
		]);
	} catch (Exception $e) {
	} ?>

</div>
