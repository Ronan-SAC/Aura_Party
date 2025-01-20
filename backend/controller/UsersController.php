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
            $sql_Adm = "INSERT INTO Adm (loginUser,senhaAdm) VALUES( :name, :password )";
            $db_Adm = $this->conn->prepare($sql_Adm);
            $db_Adm->bindParam(":name",$name);
            $db_Adm->bindParam(":password",$password);

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


    public function UpdateAdmin($AdmId,$name,$password){
        try {
            $sql_Adm ="UPDATE Adm SET loginUser = :name, senhaAdm = :password WHERE idAdm = :AdmId";
            $db_Adm = $this->conn->prepare($sql_Adm);
            $db_Adm->bindParam(":name",$name);
            $db_Adm->bindParam(":password",$password);
            $db_Adm->bindParam(":AdmId",$AdmId);

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


    public function DeleteAdmin($idAdm){
        try {
            $sql_Adm ="DELETE FROM Adm WHERE idAdm = :idAdm";
            $db_Adm = $this->conn->prepare($sql_Adm);
            $db_Adm->bindParam(":idAdm",$idAdm);
    
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


public function registerUser($name,$password,$telefone,$cpf,$email){
    try {
        $sql_User = "INSERT INTO Cliente (loginUser,senha,telefone,cpf,email) VALUES (:name, :password, :telefone, :cpf, :email )";
        $db_User = $this->conn->prepare($sql_User);
        $db_User->bindParam(":name",$name);
        $db_User->bindParam(":password",$password);
        $db_User->bindParam(":telefone",$telefone);
        $db_User->bindParam(":cpf",$cpf);
        $db_User->bindParam(":email",$email);

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


public function UpdateUser($UserId,$name,$password,$telefone,$cpf,$email){
    try {
        $sql_User ="UPDATE Cliente SET loginUser = :name, senha = :password, telefone = :telefone, cpf = :cpf, email = :email WHERE idUser = :UserId";
        $db_User = $this->conn->prepare($sql_User);
        $db_User->bindParam(":name",$name);
        $db_User->bindParam(":password",$password);
        $db_User->bindParam(":telefone",$telefone);
        $db_User->bindParam(":cpf",$cpf);
        $db_User->bindParam(":email",$email);
        $db_User->bindParam(":UserId",$UserId);

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



//Espaços Section//

public function getALLLocations(){
    try {
        $sql_loc = "SELECT * FROM Espacos";
        $db_loc = $this->conn->prepare($sql_loc);
        $db_loc -> execute();
        $Locations = $db_loc ->fetchAll(PDO::FETCH_ASSOC);
        return $Locations;

    } catch (\Throwable $th) {
        //throw $th;
    }
}


public function registerLocation($name,$endereco,$tipo,$descricaoEspaco,$lotacaoMax,$date_Espaco,$horario_inicio,$horario_fim){
    try {
        $sql_loc = "INSERT INTO Espacos (nomeEspaco,endereco,tipo,descricaoEspaco,lotacaoMax,date_Espaco,horario_inicio,horario_fim) VALUES (:name, :endereco, :tipo, :descricaoEspaco, :lotacaoMax, :date_Espaco, :horario_inicio, :horario_fim )";
        $db_loc = $this->conn->prepare($sql_loc);
        $db_loc->bindParam(":name",$name);
        $db_loc->bindParam(":endereco",$endereco);
        $db_loc->bindParam(":tipo",$tipo);
        $db_loc->bindParam(":descricaoEspaco",$descricaoEspaco);
        $db_loc->bindParam(":lotacaoMax",$lotacaoMax);
        $db_loc->bindParam(":date_Espaco",$date_Espaco);
        $db_loc->bindParam(":horario_inicio",$horario_inicio);
        $db_loc->bindParam(":horario_fim",$horario_fim);

        if($db_loc->execute()){
            return true;
        }
        else{
            return false;
        }



    } catch (\Throwable $th) {
        //throw $th;
    }
}

public function getLocationById($id_Location){
    try {
        $sql_loc ="SELECT * FROM Espacos WHERE idEspaco = :id_Location";
        $db_loc = $this->conn->prepare($sql_loc);
        $db_loc->bindParam(":id_Location",$id_Location);
        $db_loc->execute();
        $Locations = $db_loc->fetch(PDO::FETCH_ASSOC);

        if($Locations){
            return $Locations;
        }
        else{
            return false;
        }

    } catch (\Throwable $th) {
        //throw $th;
    }

}


public function UpdateLocation($name,$endereco,$tipo,$descricaoEspaco,$lotacaoMax,$date_Espaco,$horario_inicio,$horario_fim){
    try {
        $sql_loc ="UPDATE Espacos SET nomeEspaco = :name, endereco = :endereco, tipo = :tipo, descricaoEspaco = :descricaoEspaco, lotacaoMax = :lotacaoMax, date_Espaco = :date_Espaco, horario_inicio = :horario_inicio, horario_fim = :horario_fim WHERE idEspaco = :LocationId";
        $db_loc = $this->conn->prepare($sql_loc);
        $db_loc->bindParam(":name",$name);
        $db_loc->bindParam(":endereco",$endereco);
        $db_loc->bindParam(":tipo",$tipo);
        $db_loc->bindParam(":descricaoEspaco",$descricaoEspaco);
        $db_loc->bindParam(":lotacaoMax",$lotacaoMax);
        $db_loc->bindParam(":date_Espaco",$date_Espaco);
        $db_loc->bindParam(":horario_inicio",$horario_inicio);
        $db_loc->bindParam(":horario_fim",$horario_fim);
        $db_loc->bindParam(":LocationId",$LocationId);

        if($db_loc->execute()){
            return true;
        }
        else{
            return false;
        }

    } catch (\Throwable $th) {
        //throw $th;
    }

}


public function DeleteLocation($id_Location){
    try {
        $sql_loc ="DELETE FROM Espacos WHERE idEspaco = :id_Location";
        $db_loc = $this->conn->prepare($sql_loc);
        $db_loc->bindParam(":id_Location",$id_Location);

        if($db_loc->execute()){
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


}