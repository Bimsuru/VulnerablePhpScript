<?php

class Home extends Controller{

    public function index($name = ''){
        
        if(!isset($_SESSION["user"]))
        {
            Helpers::redirectTo("phpscript/public/home/login");
        }
        
        $db = Database::getInstance();

        parent::view("index");

    }

    public function single()
    {

        if(!isset($_SESSION["user"]))
        {
            Helpers::redirectTo("phpscript/public/home/login");
        }
        
        parent::view("single");
    }

    public function login()
    {   
        if(isset($_SESSION["user"]))
        {
            Helpers::redirectTo("phpscript/public/home");
        }

        if(isset($_POST["email"]) && isset($_POST["key"]))
        {
            $db = Database::getInstance();

            $response =  $db->dbQuery("SELECT * FROM users WHERE email = '". $_POST['email'] ."' and password = '". $_POST['key'] ."'");

            while($data = $response->fetch())
            {
                $user = new User();

                $user->setFullName($data["name"]);
                $user->setEmail($data["email"]);
                $user->setAbout($date["about"]);

                $_SESSION["user"] =  $user;

                Helpers::redirectTo("phpscript/public/home");

                die();
            }

            $_SESSION["login_error"] = "Login informations are not correct !";

        }

        parent::view("login");
    }

    public function signup()
    {
        if(isset($_SESSION["user"]))
        {
            Helpers::redirectTo("phpscript/public/home");
        }

        if(isset($_POST["email"]) && isset($_POST["key"]) && isset($_POST["fullname"]))
        {
            if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
            {
                $db = Database::getInstance();
                $req = $db->dbPrepare("INSERT INTO users VALUES('','".$_POST["fullname"]."','".$_POST["email"]."','".$_POST["key"]."','')");
                $req->execute();
                
                $user = new User();
                $user->setFullName($_POST["fullname"]);
                $user->setEmail($_POST["email"]);

                $_SESSION["user"] =  $user;

                Helpers::redirectTo("phpscript/public/home");
       
            }
        }

        parent::view("signup");
    }

    public function profile()
    {
        parent::view("profile");
    }

    public function logout()
    {
        session_destroy();

        Helpers::redirectTo("phpscript/public/login");

    }

}