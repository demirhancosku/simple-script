<?php
/**
 * Created by PhpStorm.
 * User: coskudemirhan
 * Date: 23/11/14
 * Time: 18:39
 */
include_once "autoload.php";
include_once "config.php";

class App extends autoload
{
    var $appName;
    var $appUrl;
    var $route;
    var $controller;
    var $action;
    var $parameters;
    var $config;

    var $controllerFolder = "app/controllers";

    function __construct($config)
    {
        $this->config = $config;
        $this->appName = $config['appName'];
        $this->appUrl = $config['appUrl'];

    }


    public function addRoute($route)
    {
        $this->route = $route;
        $this->controller = $this->getController();
        $this->action = $this->getAction();
        $this->parameters = $this->getParameters();
    }


    public function run()
    {
        if ($this->ifController()) {
            autoload::init();

            $actionName = $this->getAction();
            $parameters = $this->parameters;

            $Controller = new $this->controller();
            $Controller->$actionName($parameters);
        }

    }


    public function getController()
    {
        return $this->route->controller;
    }


    public function getAction()
    {
        return $this->route->action;
    }


    public function getParameters()
    {
        return $this->route->parameters;

    }


    private function ifController()
    {
        if ($this->checkControllerExist())
            return true;
        else
            $this->throwError("Controller not found baby");

    }

    private function checkControllerExist()
    {
        if (file_exists($this->controllerFolder . '/' . $this->controller . ".php"))
            return true;
        else
            return false;
    }


    private function throwError($err)
    {
        die($err);
    }
}