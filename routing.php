<?php
/**
 * Created by PhpStorm.
 * User: coskudemirhan
 * Date: 23/11/14
 * Time: 17:30
 */


use Fuel\Routing\Router;

$router = new Router;
$router->setType('string', Router::MATCH_ANY);
$router->setType('num', Router::MATCH_NUM);
$router->setType('int', Router::MATCH_NUM);



$router->get('/')->filters([
    'controller' => 'HomeController',
    'action' => 'index',
]);


$router->get('admin')->filters([
    'controller' => 'AdminController',
    'action' => 'index',
]);


$router->get('kullanici/{int:id}')->filters([
    'controller' => 'HomeController',
    'action' => 'user',
]);