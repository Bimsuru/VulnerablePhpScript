<?php

class Helpers{

    public static function relativeCwd()
    {   
        $d = "/";
        if(PHP_OS == "WINNT")
        {
            $d = "\\";
        }
        
        $arr = explode($d,getcwd());

        return $arr[sizeof($arr) - 2]."/".$arr[sizeof($arr) -1]."/";
    }

    public static function redirectTo($url)
    {
        header("location: http://".$_SERVER['SERVER_NAME']."/".Helpers::relativeCwd()."". $url);
        die();
    }

    public static function cursorToArray($cursor)
    {
        $array = [];

        while($data = $cursor->fetch())
        {
            array_push($array,$data);
        }

        return $array;

        $cursor->closeCursor();
    }

}