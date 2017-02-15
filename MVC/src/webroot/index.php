<?php
define('MVC',dirname(__FILE__));
define('ROOT', dirname(MVC));
define('DS', DIRECTORY_SEPARATOR);
define('core', ROOT.DS.'core');
define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME'])) );
ECHO BASE_URL;
?>
