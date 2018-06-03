<?php

/**
 * 入口文件
 * @author Kyrie.Liu
 */

define('PATH_ROOT', dirname(__FILE__));
include PATH_ROOT . '/protected/config/defines.php';
include PATH_ROOT . '/../framework/yii.php';
$config = PATH_ROOT . '/protected/config/main.php';
$app = Yii::createWebApplication($config);
$app->onBeginRequest = function ($event) { };
$app->run();