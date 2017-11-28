<?php

class Database{

    private $host = "localhost";
    private $dbname = "db";
    private $user = "root";
    private $password = "";

    public $db;

    private static $instance;

    public function __construct(){

        try{
            
            $this->db = new PDO('mysql:host=localhost;dbname=db;charset=utf8', 'root', '');

        }catch(Exception $e){
      
            die($e->getMessage());
      
        }

    }

    public static function getInstance()
    {
        if(is_null(self::$instance))
        {
            self::$instance = new Database();
        }

        return self::$instance;
    }


    public function dbQuery($query)
    {
        return $this->db->query($query);
    }

    public function dbPrepare($query)
    {
        return $this->db->prepare($query);
    }

    public function lastInsertId()
    {
        return $this->db->lastInsertId();
    }
}