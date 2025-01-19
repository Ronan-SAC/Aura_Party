<?php

include __DIR__ ."/../db/Database.php";

class UsersController{

    private $conn;

    public function __construct(){

        $database = new Database();
        $this->conn = $database ->connect();
    }



 //Adm_Section//   

    public function getALLAdmin(){
        try {
            $sql_Adm = "SELECT * FROM Adm";
            $db_Adm = $this->conn->prepare($sql_Adm);
            $db_Adm -> execute();
            $Adm = $db_Adm ->fetchAll(PDO::FETCH_ASSOC);
            return $Adm;

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function registerAdm($name,$password){
        try {
            $sql_Adm = "INSERT INTO Adm (loginUser,senhaAdm) VALUES(':name',':password');"
            $db_Adm = $this->conn->prepare($sql_Adm);
            $db_Adm->bindParam(":nome",$name)
            $db_Adm->bindParam(":password",$password)

            if($db_Adm->execute()){
                return true;
            }
            else{
                return false;
            }

    

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function getAdmById($id_Adm){
        try {
            $sql_Adm ="SELECT * FROM Adm WHERE idAdm = :id_Adm";
            $db_Adm = $this->conn->prepare($sql_Adm);
            $db_Adm->bindParam(":id_Adm",$id_Adm);
            $db_Adm->execute();
            $Adm = $db_Adm->fetch(PDO::FETCH_ASSOC);

            if($Adm){
                return $Adm;
            }
            else{
                return false;
            }

        } catch (\Throwable $th) {
            //throw $th;
        }

    }


    public function UpdateAdmin($id_Adm,$name,$password){
        try {
            $sql_Adm ="UPDATE Adm SET loginUser = :name, senhaAdm = :password WHERE idAdm = :id_Adm";
            $db_Adm = $this->conn->prepare($sql_Adm);
            $db_Adm->bindParam(":name",$name);
            $db_Adm->bindParam(":password",$password);
            $db_Adm->bindParam(":id_Adm",$id_Adm);

            if($db_Adm->execute()){
                return true;
            }
            else{
                return false;
            }

        } catch (\Throwable $th) {
            //throw $th;
        }

    }   


    public function DeleteAdmin($id_Adm){
        try {
            $sql_Adm ="DELETE FROM Adm WHERE idAdm = :id_Adm";
            $db_Adm = $this->conn->prepare($sql_Adm);
            $db_Adm->bindParam(":id_Adm",$id_Adm);
    
            if($db_Adm->execute()){
                    return true;
                }
                else{
                    return false;
                }
    
            } catch (\Throwable $th) {
                //throw $th;
            }register admin
        }



//Adm Section//




//User Section//

public function getALLUser(){
    try {
        $sql_User = "SELECT * FROM Cliente";
        $db_User = $this->conn->prepare($sql_User);
        $db_User -> execute();
        $Clientes = $db_User ->fetchAll(PDO::FETCH_ASSOC);
        return $Clientes;

    } catch (\Throwable $th) {
        //throw $th;
    }
}

public function registerUser($name,$password){
    try {
        $sql_User = "INSERT INTO Cliente (loginUser,senha) VALUES(':name',':password');"
        $db_User = $this->conn->prepare($sql_User);
        $db_User->bindParam(":nome",$name)
        $db_User->bindParam(":password",$password)

        if($db_User->execute()){
            return true;
        }
        else{
            return false;
        }



    } catch (\Throwable $th) {
        //throw $th;
    }
}

public function getUserById($id_User){
    try {
        $sql_User ="SELECT * FROM Cliente WHERE idUser = :id_User";
        $db_User = $this->conn->prepare($sql_User);
        $db_User->bindParam(":id_User",$id_User);
        $db_User->execute();
        $Clientes = $db_User->fetch(PDO::FETCH_ASSOC);

        if($Clientes){
            return $Clientes;
        }
        else{
            return false;
        }

    } catch (\Throwable $th) {
        //throw $th;
    }

}


public function UpdateUser($id_User,$name,$password){
    try {
        $sql_User ="UPDATE Cliente SET loginUser = :name, senha = :password WHERE idUser = :id_User";
        $db_User = $this->conn->prepare($sql_User);
        $db_User->bindParam(":name",$name);
        $db_User->bindParam(":password",$password);
        $db_User->bindParam(":id_User",$id_User);

        if($db_User->execute()){
            return true;
        }
        else{
            return false;
        }

    } catch (\Throwable $th) {
        //throw $th;
    }

}


public function DeleteUser($id_User){
    try {
        $sql_User ="DELETE FROM Cliente WHERE idUser = :id_User";
        $db_User = $this->conn->prepare($sql_User);
        $db_User->bindParam(":id_User",$id_User);

        if($db_User->execute()){
                return true;
            }
            else{
                return false;
            }

        }
        
        catch (\Throwable $th) {
            //throw $th;
        }
    }



//User Section//


}