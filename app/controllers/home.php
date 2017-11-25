<?php

class Home extends Controller{

    public function index($name = ''){
        
        parent::view("index");

    }

    public function single()
    {
        parent::view("single");
    }

}