<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?= Yii::app()->params['app.default_language'] ?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link type="text/css" rel="stylesheet" href="<?= Yii::app()->baseUrl ?>/css/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="<?= Yii::app()->baseUrl ?>/css/frontend.css" />
<? Yii::app()->clientScript->registerCoreScript('jquery') ?>
<?= Yii::app()->params['template.head'] ?>
<title><?php echo CHtml::encode($this->title) ?></title>
</head>
<body class="d-flex flex-column min-vh-100">
<?= $content ?>
</body>
</html>
