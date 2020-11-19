<?php
use MVC\Dispatcher;
use MVC\Request;
use MVC\Router;
use MVC\Config\Core;
use MVC\Models\Task;

require __DIR__ . '../../vendor/autoload.php';


define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

$dispatch = new Dispatcher();
$dispatch->dispatch();

