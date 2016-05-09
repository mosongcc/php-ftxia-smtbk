<?php
 
//ini_set('session.cookie_domain',".8mob.com");

if (!is_file('./data/install.lock')) {
    header('Location: ./install.php');
    exit;
}
require("./data/config/version.php");
require("./data/config/debug.php");
define('APP_NAME', 'app');
define('APP_PATH', './app/');
define('FTX_DATA_PATH', './data/');
define('EXTEND_PATH',	APP_PATH . 'Extend/');
define('CONF_PATH',		FTX_DATA_PATH . 'config/');
define('RUNTIME_PATH',	FTX_DATA_PATH . 'runtime/');
define('HTML_PATH',		FTX_DATA_PATH . 'html/');

require("./thinkphp/setup.php");