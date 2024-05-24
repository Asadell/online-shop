<?php

if(!session_id()) session_start();

require_once "../app/Config/default.php";
require_once "../app/Core/Autoload.php";

$routes = new Routes();
$routes->run();
// echo BASEURL;