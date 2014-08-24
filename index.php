<?php

if(!file_exists('production.lock')) {

    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    defined('YII_DEBUG') or define('YII_DEBUG',true);
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

    $config = dirname(__FILE__)  . '/protected/config/development.php';

} else {

    error_reporting(0);
    ini_set('display_errors', 'off');

    $config = dirname(__FILE__)  . '/protected/config/production.php';

}

require_once(__DIR__ . '/protected/vendor/autoload.php');
require_once(__DIR__ . '/protected/vendor/yiisoft/yii/framework/yii.php');

Yii::createWebApplication($config)->run();
