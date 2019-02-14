<?php
/* @var $this \backend\components\View */

use dmstr\widgets\Menu;

/* @var $directoryAsset false|string */
?>
<aside class="main-sidebar">

	<section class="sidebar">

		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?= $this->user->profile->getAvatarUrl() ?>" class="img-circle" alt="User Image"/>
			</div>
			<div class="pull-left info">
				<p><?= $this->user->profile->name ?></p>

				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<!-- /.search form -->

		<?php
		try {
			echo Menu::widget([
				'options' => [
					'class'       => 'sidebar-menu tree',
					'data-widget' => 'tree',
				],
				'items'   => [
					[
						'label'   => 'Dashboard menu',
						'options' => ['class' => 'header'],
					],
					[
						'label' => 'Dashboard',
						'icon'  => 'dashboard',
						'url'   => ['/'],
					],
					[
						'label' => 'User management',
						'icon'  => 'users',
						'items' => [
							[
								'label' => 'List users',
								'url'   => ['/user/admin'],
							],
						],
					],
					[
						'label' => 'Email',
						'icon'  => 'envelope',
						'items' => [
							[
								'label' => 'History',
								'url'   => ['/mailer/message'],
							],
							[
								'label' => 'Template',
								'url'   => ['/mailer/template'],
							],
						],
					],
					[
						'label' => 'Backup manager',
						'icon'  => 'cloud',
						'items' => [
							[
								'label' => 'Configure',
								'url'   => ['/backup/config'],
							],
							[
								'label' => 'History',
								'url'   => ['/backup/history'],
							],
						],
					],
					[
						'label' => 'Setting',
						'icon'  => 'cog',
						'url'   => ['/setting'],
					],
				],
			]);
		} catch (Exception $e) {
		} ?>

	</section>

</aside>
