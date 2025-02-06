<?php

include __DIR__ ."/../db/database.php";
include __DIR__ . "./UsersController.php";

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

    public function Admin_Login_Validation($name, $password) {
        try {
            $sql_adm = "SELECT idAdm,senhaAdm FROM Adm WHERE loginUser = :name_Adm";
            $db_adm = $this->conn->prepare($sql_adm);
            $db_adm->bindParam(":name_Adm", $name);
            $db_adm->execute(); 
            $Adm = $db_adm->fetch(PDO::FETCH_ASSOC);

            if ($Adm) {

                if (password_verify($password, $Adm['senhaAdm'])) {
                    session_start();
                    $_SESSION["id_Adm"] = $Adm["idAdm"];
                    return true;
                } else {
                    return false; 
                }
            } 
            
            else {
                return false; 
            }
        } 
        catch (\Throwable $th) {
            return false;
        }
    }



    
}