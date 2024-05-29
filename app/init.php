<?php

use App\Config\Config;
use App\Core\Routes;

if(!session_id()) session_start();

// require_once "../app/Config/default.php";
// require_once "../app/Core/Autoload.php";

require_once '../vendor/autoload.php';
Config::load();

$routes = new Routes();
$routes->run();
// echo BASEURL;