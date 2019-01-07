<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

	<?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

	<nav class="navbar navbar-static-top" role="navigation">

		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>

		<div class="navbar-custom-menu">

			<ul class="nav navbar-nav">
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?= $this->user->profile->getAvatarUrl() ?>" class="user-image" alt="User Image"/>
						<span class="hidden-xs"><?= \Yii::$app->user->identity->profile->name ?></span>
					</a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header">
							<div class="user-avatar">
								<img src="<?= $this->user->profile->getAvatarUrl() ?>" class="img-circle"
								     alt="User Image"/>
							</div>
							<div class="user-profile-info">
								<div class="user-full-name"><?= \Yii::$app->user->identity->profile->name ?></div>
								<div class="user-email"><?= \Yii::$app->user->identity->email ?></div>
							</div>
						</li>
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<a href="<?= \yii\helpers\Url::to(['/user/settings/account']) ?>" class="btn btn-default btn-flat">Tài khoản</a>
							</div>
							<div class="pull-right">
								<?= Html::a('Thoát', ['/user/security/logout'], [
										'data-method' => 'post',
										'class'       => 'btn btn-default btn-flat',
									]) ?>
							</div>
						</li>
					</ul>
				</li>

			</ul>
		</div>
	</nav>
</header>
