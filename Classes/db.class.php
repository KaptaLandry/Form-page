<?php

class Db
{
    
    protected function connect(){
        try {
           $username = "root";
           $password = "";
           $db = new PDO('mysql:host=localhost;dbname=Login', $username, $password);
           return $db;
        } catch (PDOException $e) {
            print "Error!:" . $e->getMessage() . "<br>";
            die();
        }
    }

}
    // private $host = "localhost";
    // private $user = "root";
    // private $pass = "";
    // private $dbName = "Login";


    // protected function connect()
    // {
    //     $dbn = 'mysql:host=' . $this->host . ';dbname=' .  $this->dbName;
    //     $pdo = new PDO($dbn, $this->user, $this->pass);
    //     $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    //     return $pdo;
    // }
