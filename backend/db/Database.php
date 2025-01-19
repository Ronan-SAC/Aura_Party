<?php

class Database{
    private $server = "localhost";
    private $dbnome = "Aura_party";
    private $user = "root";
    private $password = "9584";

    public function connect(){
        try {
            $conn = new PDO(
                "mysql:host=".$this->server.";"."dbname=" .$this->dbnome.";", $this->user, $this->password
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
    

        catch (\Throwable $th) {
            echo "Erro". $th->getMessage();
        }
    }
}