<?php
date_default_timezone_set('PRC');
define('YII_DEBUG',true);
// change the following paths if necessary
$yii=dirname(__FILE__).'/protected/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';
// remove the following line when in production mode

defined('YII_DEBUG') or define('YII_DEBUG',false);
require_once($yii);
Yii::createWebApplication($config)->run();
