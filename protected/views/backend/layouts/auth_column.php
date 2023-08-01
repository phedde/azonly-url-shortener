<?php $this->beginContent('/layouts/main'); ?>
<div id="wrapper">
<h1 class="greeting">Welcome <?= Yii::app()->user->name ?></h1>
<div id="menu" class="gradient round-top">
<ul>
<li class="menu"><a href="<?= Yii::app()->createAbsoluteUrl("admin")?>">Urls</a></li>
<li class="menu logout"><a href="<?= Yii::app()->createAbsoluteUrl("admin/logout")?>">Logout</a></li>
</ul>

</div>

<div class="inner_wrap">
	<div class="clear-fix"></div>
	<? include "flash.php" ?>
	<?= $content ?>
</div>
</div>
<?php $this->endContent('/layouts/main'); ?>