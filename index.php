<?php
/**
 * Created by PhpStorm.
 * User: coskudemirhan
 * Date: 23/11/14
 * Time: 17:30
 */

include 'vendor/autoload.php';


include_once 'routing.php';
include_once 'app/app.php';



$App = new App($config);
$App->addRoute($router->translate($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']));


$App->run();





