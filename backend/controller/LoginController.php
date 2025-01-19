<?php

include __DIR__ ."/../db/database.php";

class LoginController{

    private $conn;

    public function __construct(){

        $database = new Database();
        $this->conn = $database ->connect();

    }

    public function Client_Login_Validation($name,$password){

        $sql_user = "SELECT * FROM Cliente WHERE loginUser = :name_user AND senha = :password_user";
        $db_user = $this->conn->prepare($sql_user);
        $db_user->bindParam(":name_user",$name);
        $db_user->bindParam(":password_user",$password);
        $db_user->execute();
        $Clientes = $db_user->fetchAll(PDO::FETCH_ASSOC);

        if($Clientes){
            session_start();
            $_SESSION["id_User"] = $Clientes[0]["idUser"];
            return true;
        }
        else{
            return false;
        }

            
    }

    public function Admin_Login_Validation($name,$password){

        $sql_adm = "SELECT * FROM Adm WHERE loginUser = :name_Adm AND senhaAdm = :password_Adm";
        $db_adm = $this->conn->prepare($sql_adm);
        $db_adm->bindParam(":name_Adm",$name);
        $db_adm->bindParam(":password_Adm",$password);
        $db_adm->execute();
        $Adm = $db_adm->fetchAll(PDO::FETCH_ASSOC);

        if($Adm){
            session_start();
            $_SESSION["id_Adm"] = $Adm[0]["idAdm"];
            return true;
        }
        else{
            return false;
        }

    }



    
}