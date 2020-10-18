<?php
define('BASE_URL', 'http://localhost/micro-framework');

define('BASE_PATH', dirname(__DIR__) . '/');
define('SUB_DIRECTORY', '/micro-framework');

define('BASE_VIEW_PATH', BASE_PATH . 'views/');


define('IS_DEV_MODE', 1);
define('SANITIZE_ALL_DATA', 0);

//Global middlewares - run for all of requests
define('GLOBAL_MIDDLEWARES', 'FirefoxBlocker');

