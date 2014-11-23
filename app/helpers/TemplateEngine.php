<?php

/**
 * Created by PhpStorm.
 * User: coskudemirhan
 * Date: 23/11/14
 * Time: 23:27
 */
class TemplateEngine
{

    var $template;
    var $layout;
    var $view;
    var $data = [];

    function __construct($layout)
    {
        $this->layout = $layout;
    }

    private function getLayout()
    {

        $this->template = $this->loadView($this->layout);

    }

    private function loadView($view)
    {
        ob_start();

        include('./app/views/' . $view . '.php');

        $buff = ob_get_contents();
        @ob_end_clean();
        return $buff;
    }

    private function setData()
    {
        foreach ($this->data as $key => $value) {
            if (!is_array($value))
                 $this->setSingular($key, $value);
            else
                $this->template = strtr($this->template, $this->setPair($key, $value));

        }
    }

    private function setPair($key, $value, $template = false){
        if(!$template)
            $template = $this->template;

        preg_match_all(
            '#'.preg_quote("{{".$key."}}").'(.+?)'.preg_quote("{{/".$key."}}").'#s',
            $template,
            $matches,
            PREG_SET_ORDER
        );

        $replace = [];
            foreach ($matches as $match)
            {
                $str = '';
                foreach ($value as $row)
                {
                    $temp = array();
                    foreach ($row as $key => $val)
                    {
                        if (is_array($val))
                        {
                            $pair = $this->setPair($key, $val, $match[1]);
                            if ( ! empty($pair))
                            {
                                $temp = array_merge($temp, $pair);
                            }
                            continue;
                        }
                        $temp["{{".$key."}}"] = $val;

                    }
                    $str .= strtr($match[1], $temp);

                $replace[$match[0]] = $str;
            }
        }

        return $replace;
    }

    private function setSingular($key, $value ){
        $this->template = str_replace('{{' . $key . '}}', $value, $this->template);
    }

    public function make($data = [], $request = false)
    {
        $this->getLayout();
        $this->data = $data;
        $this->setData();

        if ($request)
            echo $this->template;
        else
            return $this->template;

    }


}
