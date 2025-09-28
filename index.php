<?php

include_once __DIR__ . "/vendor/autoload.php";

use Controllers\IndexController;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Cfg\Router;

try{
    echo (new Router())->response();
}catch(HttpRouteNotFoundException $e){
    echo (new IndexController())->getError();
}
?>