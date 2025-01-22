<?php
class Database{
private $servername = "localhost";
private $username = "root";  // Substitua com seu usuário
private $password = "picole2206";      // Substitua com sua senha
private $dbname = "aura_party";  // Substitua com o nome do seu banco de dados
public function connect(){
// Criando a conexão
try { 
    $conn = new PDO(
        "mysql:host=".$this->servername.";"."dbname=" .$this->dbname.";", $this->username, $this->password
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
    }


    catch (\Throwable $th) {
        echo "Erro". $th->getMessage();
            }
        }
    }   
?>