<?php

include __DIR__ ."/../db/database.php";

class LoginController{

    private $conn;

    public function __construct(){

        $database = new Database();
        $this->conn = $database ->connect();

    }

    public function Client_Login_Validation($name,$password){
        $sql = "SELECT * FROM Cliente WHERE loginUser = :name AND senha = :password";
        $db = $this->conn->prepare($sql);
        $db->bindParam(":name",$name);
        $db->bindParam(":password",$password);
        $db->execute();
        $Client = $db->fetchAll(PDO::FETCH_ASSOC);
        var_dump($Client);

        if($Client){
            session_start();
            $_SESSION["id"] = $Client[0]["id"];
            return true;
        }
        else{
            return false;
        }


            
    }


    
}