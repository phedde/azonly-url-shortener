<div class="gradient round-top">
<h1 class="heading">Edit #<?= $model['UrlID'] ?> record</h1>
</div>

<div class="inner_wrap edit-form">
<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($model); ?>

<div class="row">
<?php echo CHtml::activeLabel($model,'UrlShort'); ?>
<?php echo CHtml::activeTextField($model,'UrlShort', array(
	'value'=>$this->createAbsoluteUrl("/{$model['UrlShort']}"),
	'disabled'=>'disabled',
)); ?>
</div>

<div class="row">
<?php echo CHtml::activeLabel($model,'Url'); ?>
<?php echo CHtml::activeTextField($model,'Url', array(
	'value'=>$model['Url'],
	
)); ?>
</div>

<div class="row">
<?php echo CHtml::activeLabel($model,'Hits'); ?>
<?php echo CHtml::activeTextField($model,'Hits', array(
	'value'=>$model['Hits'],
)); ?>
</div>

<div class="row submit">
<?php echo CHtml::submitButton('Edit'); ?>
</div>

<?php echo CHtml::endForm(); ?>
</div>