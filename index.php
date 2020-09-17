<?php

use GuzzleHttp\Psr7\Request;

session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');


$controller = isset($_GET['controller']) ? $_GET['controller'] : 'product';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controller = ucfirst($controller);

$controller .= 'Controller';

$path_controller = "controllers/$controller.php";

if(!file_exists($path_controller)){
    die("File is not exist");
}

require_once "$path_controller";

$object = new $controller();

$object->$action();


?>
