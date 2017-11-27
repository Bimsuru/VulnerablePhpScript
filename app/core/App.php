<?php

class App{

    protected $controller = "Home";
    protected $method = "index";
    protected $params = [];

    public function __construct()
    {       
        $this->startSession();

        $url = $this->parseUrl();

        if(file_exists("../app/controllers/".$url[0].".php"))
        {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once("../app/controllers/".$this->controller.".php");

        if(isset($url[1]))
        {
            if(method_exists($this->controller,$url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller,$this->method],$this->params);

    }

    public function parseUrl()
    {
        if(isset($_GET["url"]))
        {
            return explode("/", rtrim($_GET["url"]));
        }

        return null;
    }

    public function startSession()
    {
        session_start();
    }

}