<?php
/**
 * Created by PhpStorm.
 * User: coskudemirhan
 * Date: 23/11/14
 * Time: 23:25
 */

class Controller{

    var $template;
    var $layout;


    function view($view, $data = [], $request = false){
        $this->template = new TemplateEngine($view);

        return $this->template->make($data, $request);
    }

}