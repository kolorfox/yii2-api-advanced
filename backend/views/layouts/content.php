<?php
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

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
                    echo \yii\helpers\Html::encode($this->title);
                } else {
                    echo \yii\helpers\Inflector::camel2words(
                        \yii\helpers\Inflector::id2camel($this->context->module->id)
                    );
                    echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
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
        <?php try{
	        echo Alert::widget();
        }catch (\Exception $e){

        }?>
        <?= $content ?>
    </section>
</div>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; <?=date("Y")?> <a href="#">Navatech</a>.</strong> All
    rights
    reserved.
</footer>

