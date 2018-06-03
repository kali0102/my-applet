<?php

/**
 * 全局常量
 * @author Kyrie.Liu
 */

defined('DEBUG') || define('DEBUG', true);

defined('YII_DEBUG') || define('YII_DEBUG', DEBUG);

define('YII_TRACE_LEVEL', DEBUG ? 3 : 0);

define('CHARSET', 'utf-8');

DEBUG ? error_reporting(E_ALL | E_STRICT) : '';



