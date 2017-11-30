<?php

class Home extends Controller{

    public function index($name = ''){
        
        if(!isset($_SESSION["user"]))
        {
            Helpers::redirectTo("home/login");
        }
        
        if(isset($_POST['question']) && isset($_POST['category']))
        {

            $db = Database::getInstance();
            $req = $db->dbPrepare("INSERT INTO questions VALUES('','".$_POST['question']."','".$_POST['category']."',NOW(),'". $_SESSION["user"]->getId() ."')");
            $req->execute();

            Helpers::redirectTo("home/index");

        }

        $db = Database::getInstance();

        $catyResponse = $db->dbQuery("SELECT * FROM category");
        
        $categories = Helpers::cursorToArray($catyResponse);

        $quesResponse = $db->dbQuery("SELECT q.id,u.name,q.contenu,c.category FROM questions q JOIN users u ON u.id = q.user_id JOIN category c ON q.categorie_id = c.id");

        parent::view("index",["categories"=>$categories,"questions"=>$quesResponse]);

    }

    public function single($id)
    {

        if(!isset($_SESSION["user"]))
        {
            Helpers::redirectTo("home/login");
        }
        
        
        $db = Database::getInstance();

        $quesResponse = $db->dbQuery("SELECT q.id,u.name,q.contenu,c.category FROM questions q JOIN users u ON u.id = q.user_id JOIN category c ON q.categorie_id = c.id WHERE q.id = '".$id."'");
        
        $question = Helpers::cursorToArray($quesResponse);

        $catyResponse = $db->dbQuery("SELECT * FROM category");
        
        $categories = Helpers::cursorToArray($catyResponse);

        parent::view("single",["categories"=>$categories,"question"=>$question[0]]);
    }

    public function login()
    {   
        if(isset($_SESSION["user"]))
        {
            Helpers::redirectTo("home");
        }

        if(isset($_POST["email"]) && isset($_POST["key"]))
        {
            $db = Database::getInstance();

            $response =  $db->dbQuery("SELECT * FROM users WHERE email = '". $_POST['email'] ."' and password = '". $_POST['key'] ."'");

            while($data = $response->fetch())
            {
                $user = new User();

                $user->setFullName($data["name"]);
                $user->setId($data["id"]);
                $user->setEmail($data["email"]);
                $user->setAbout($date["about"]);

                $_SESSION["user"] =  $user;

                Helpers::redirectTo("home");

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
            Helpers::redirectTo("home");
        }

        if(isset($_POST["email"]) && isset($_POST["key"]) && isset($_POST["fullname"]))
        {
            if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
            {
                $db = Database::getInstance();
                $req = $db->dbPrepare("INSERT INTO users VALUES('','".$_POST["fullname"]."','".$_POST["email"]."','".$_POST["key"]."','')");
                $req->execute();
                
                $user = new User();
                $user->setId($db->lastInsertId());
                $user->setFullName($_POST["fullname"]);
                $user->setEmail($_POST["email"]);

                $_SESSION["user"] =  $user;

                Helpers::redirectTo("home");
       
            }

            $_SESSION["login_error"] = "Login informations are not correct !";
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
        Helpers::redirectTo("login");
    }

}