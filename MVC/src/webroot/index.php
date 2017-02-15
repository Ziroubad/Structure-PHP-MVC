<?php
//créer le chemin à partir de notre racine de site
define('MVC',dirname(__FILE__));
define('ROOT', dirname(MVC));
define('DS', DIRECTORY_SEPARATOR);
define('CORE', ROOT.DS.'core');
define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME'])) );

//
require CORE.DS.'includes.php';
new Dispatcher();
?>
