<?= CHtml::beginForm() ?>

<?= CHtml::errorSummary($model) ?>

<div class="row">
<?= CHtml::activeLabel($model, 'login') ?>
<?= CHtml::activeTextField($model, 'login') ?>
</div>

<div class="row">
<?= CHtml::activeLabel($model, 'password') ?>
<?= CHtml::activePasswordField($model, 'password') ?>
</div>

<div class="row submit">
<?= CHtml::submitButton('Submit') ?>
</div>

<?= CHtml::endForm() ?>