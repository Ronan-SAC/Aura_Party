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
        $Clientes = $db->fetchAll(PDO::FETCH_ASSOC);
        var_dump($Clientes);

        if($Clientes){
            session_start();
            $_SESSION["id_User"] = $Clientes[0]["idUser"];
            return true;
        }
        else{
            return false;
        }


            
    }


    
}