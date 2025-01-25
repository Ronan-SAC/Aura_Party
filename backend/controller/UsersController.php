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


public function registerLocation($name,$enderecoEspaco,$tipo,$descricaoEspaco,$lotacaoMax,$imagem_local){
    try {
        $sql_loc = "INSERT INTO Espacos (nomeEspaco,enderecoEspaco,tipo,descricaoEspaco,lotacaoMax,imagem_local) VALUES (:name, :enderecoEspaco, :tipo, :descricaoEspaco, :lotacaoMax, :imagem_local )";
        $db_loc = $this->conn->prepare($sql_loc);
        $db_loc->bindParam(":name",$name);
        $db_loc->bindParam(":enderecoEspaco",$enderecoEspaco);
        $db_loc->bindParam(":tipo",$tipo);
        $db_loc->bindParam(":descricaoEspaco",$descricaoEspaco);
        $db_loc->bindParam(":lotacaoMax",$lotacaoMax);
        $db_loc->bindParam(":imagem_local",$imagem_local);

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


public function UpdateLocation($LocationId,$name,$enderecoEspaco,$tipo,$descricaoEspaco,$lotacaoMax){
    try {
        $sql_loc ="UPDATE Espacos SET nomeEspaco = :name, enderecoEspaco = :enderecoEspaco, tipo = :tipo, descricaoEspaco = :descricaoEspaco, lotacaoMax = :lotacaoMax WHERE idEspaco = :LocationId";
        $db_loc = $this->conn->prepare($sql_loc);
        $db_loc->bindParam(":name",$name);
        $db_loc->bindParam(":enderecoEspaco",$enderecoEspaco);
        $db_loc->bindParam(":tipo",$tipo);
        $db_loc->bindParam(":descricaoEspaco",$descricaoEspaco);
        $db_loc->bindParam(":lotacaoMax",$lotacaoMax);
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


    //Reservas Section


    public function getALLReservations(){
        try {
            $sql_rev = "SELECT * FROM Reservas";
            $db_rev = $this->conn->prepare($sql_rev);
            $db_rev -> execute();
            $Reservations = $db_rev ->fetchAll(PDO::FETCH_ASSOC);
            return $Reservations;
    
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    
    
    public function registerReservations($Espaco,$User,$Data){
        try {
            $sql_loc = "INSERT INTO Reservas (idEspaco,idUsuario,Data_) VALUES (:Espaco, :User, :Data)";
            $db_loc = $this->conn->prepare($sql_loc);
            $db_loc->bindParam(":Espaco",$Espaco);
            $db_loc->bindParam(":User",$User);
            $db_loc->bindParam(":Data",$Data);
    
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
    
    public function getReservationsById($id_Reservation){
        try {
            $sql_loc ="SELECT * FROM Reservas WHERE idReserva = :id_Reservation";
            $db_loc = $this->conn->prepare($sql_loc);
            $db_loc->bindParam(":id_Reservation",$id_Reservation);
            $db_loc->execute();
            $Reservations = $db_loc->fetch(PDO::FETCH_ASSOC);
    
            if($Reservations){
                return $Reservations;
            }
            else{
                return false;
            }
    
        } catch (\Throwable $th) {
            //throw $th;
        }
    
    }
    
    
    public function UpdateReservations($idReserva,$Espaco,$User,$Data){
        try {
            $sql_loc ="UPDATE Reservas SET idEspaco = :Espaco, idUsuario = :User, data_ = :Data_ WHERE idReserva = :idReserva";
            $db_loc = $this->conn->prepare($sql_loc);
            $db_loc->bindParam(":Espaco",$Espaco);
            $db_loc->bindParam(":User",$User);
            $db_loc->bindParam(":Data_",$Data);
            $db_loc->bindParam(":idReserva",$idReserva);

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
    
    
    public function DeleteReservations($id_Reservation){
        try {
            $sql_loc ="DELETE FROM Reservas WHERE idReserva = :id_Reservation";
            $db_loc = $this->conn->prepare($sql_loc);
            $db_loc->bindParam(":id_Reservation",$id_Reservation);
    
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




        //





 public function GetUserReservationById($id_ReservationUser){
    try {
        $sql_loc = "SELECT Cliente.loginUser FROM Cliente INNER JOIN Reservas ON Cliente.IdUser = Reservas.idUsuario WHERE Reservas.idUsuario = :id_ReservationUser";
        $db_loc = $this->conn->prepare($sql_loc);
        $db_loc->bindParam(":id_ReservationUser",$id_ReservationUser);
        $db_loc->execute();
        $User = $db_loc->fetchColumn();

        if($User){
            return $User;
        }
        else{
            return false;
        }

    } catch (\Throwable $th) {
            throw $th;
    }
 }   


public function GetLocationReservationById($id_ReservationLocation){
    try {
        $sql_loc = "SELECT Espacos.nomeEspaco FROM Espacos INNER JOIN Reservas ON Espacos.idEspaco = Reservas.idEspaco WHERE Reservas.idEspaco = :id_ReservationLocation";
        $db_loc = $this->conn->prepare($sql_loc);
        $db_loc->bindParam(":id_ReservationLocation",$id_ReservationLocation);
        $db_loc->execute();
        $Location = $db_loc->fetchColumn();

        if($Location){
            return $Location;
        }
        else{
            return false;
        }

    } catch (\Throwable $th) {
            throw $th;
    }
 }   





 public function GetIdUser($User){
    try{
        $sql_User = "SELECT idUser FROM Cliente WHERE loginUser = :User";
        $db_User = $this->conn->prepare($sql_User);
        $db_User->bindParam(":User",$User);
        $db_User->execute();
        $User = $db_User->fetchColumn();

        if($User){
            return $User;
        }
        else{
            return false;
        }
    }
     catch (\Throwable $th) {
        throw $th;
}
    
 }


 public function GetIdLocation($Location){
    try{
        $sql_User = "SELECT idEspaco FROM Espacos WHERE nomeEspaco = :Location";
        $db_User = $this->conn->prepare($sql_User);
        $db_User->bindParam(":Location",$Location);
        $db_User->execute();
        $Location = $db_User->fetchColumn();

        if($Location){
            return $Location;
        }
        else{
            return false;
        }
    }
     catch (\Throwable $th) {
        throw $th;
}
    
 }


}
