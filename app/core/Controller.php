<?php

class Controller{

    public function view($view,$data = ''){

        require_once("../app/views/".$view.".view.php");

    }

    public function model($name)
    {
        $model = require_once("../app/models/".$name.".php");
        
        return new $model();
    }


}