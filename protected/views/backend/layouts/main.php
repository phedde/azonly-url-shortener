<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<link type="text/css" rel="stylesheet" href="<?= Yii::app()->request->getBaseUrl(true); ?>/css/backend.css" />
<? Yii::app()->clientScript->registerCoreScript('jquery') ?>
<? Yii::app()->clientScript->registerScriptFile(Yii::app()->request->getBaseUrl().'/js/backend.js'); ?>
<title>Shortlink Admin</title>
</head>
<body>

<?php echo $content; ?>

</body>
</html>