<?php
define('DS', DIRECTORY_SEPARATOR);
define('DIR_ROOT', dirname(__FILE__));
define('VENDOR', DIR_ROOT . DS . 'protected' . DS . 'vendor');

if(!file_exists('production.lock')) {

    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    defined('YII_DEBUG') or define('YII_DEBUG',true);
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
    defined('ENVIRONMENT') or define('ENVIRONMENT', 'development');

} else {

    error_reporting(0);
    ini_set('display_errors', 'off');
    defined('ENVIRONMENT') or define('ENVIRONMENT', 'production');

}

$config =  DIR_ROOT  . DS .  'protected' . DS . 'config' . DS . ENVIRONMENT . '.php';
$autoload =  VENDOR  . DS .  'autoload.php';
$yii =  VENDOR  . DS . 'yiisoft' . DS . 'yii' . DS . 'framework' . DS . 'yii.php';

require_once($yii);
require_once($autoload);

Yii::setPathOfAlias('vendor', VENDOR);
Yii::createWebApplication($config)->run();
