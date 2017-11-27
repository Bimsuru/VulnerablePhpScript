<?php

class Helpers{

    public static function loadAssets($name)
    {
        return getcwd()."$name";
    }

    public static function redirectTo($url)
    {
        header("location: http://".$_SERVER['SERVER_NAME']."/". $url);

      echo 

        die();
    }

}