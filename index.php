<?php
mb_internal_encoding('UTF-8');
error_reporting(E_ALL & ~(E_NOTICE | E_DEPRECATED | E_STRICT));

$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';
//defined('YII_DEBUG') or define('YII_DEBUG',true);
require_once($yii);
Yii::createWebApplication($config)->runEnd('frontend');
