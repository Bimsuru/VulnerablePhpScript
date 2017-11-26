<?php

class Home extends Controller{

    public function index($name = ''){
        
        $db = Database::getInstance();

        parent::view("index");

    }

    public function single()
    {
        parent::view("single");
    }

}