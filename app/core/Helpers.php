<?php

class Helpers{

    public static function loadAssets($name)
    {
        return getcwd()."$name";
    }

}