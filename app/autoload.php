<?php

/**
 * Created by PhpStorm.
 * User: coskudemirhan
 * Date: 23/11/14
 * Time: 22:04
 */
class autoload
{

    public static $loader;

    public static function init()
    {
        if (self::$loader == null)
            self::$loader = new self();

        return self::$loader;
    }

    public function __construct()
    {
        spl_autoload_register(array($this, 'controllers'));
        spl_autoload_register(array($this,'model'));
        spl_autoload_register(array($this,'helper'));
    }


    public function controllers($class)
    {
        set_include_path('./app/controllers/');
        spl_autoload($class);
    }

    public function model($class)
    {
        set_include_path('./app/models/');
        spl_autoload($class);
    }

    public function helper($class)
    {
        set_include_path('./app/helpers/');
        spl_autoload($class);
    }

}
