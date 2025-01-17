<?php

include __DIR__ ."/../controller/loginController.php";

$loginController = new LoginController();


if($_SERVER["REQUEST_METHOD"] == "POST"){
    switch($_GET["Login_Validation"]){
        case 'True':
           $validation = $loginController->Client_Login_Validation($_POST["name"],$_POST["password"]);
            if($validation){
                header("Location: ../../pages/User/index.php");
            }
            else{
                header("Location:../../index.php");
            }
            break;

        default:

        echo "Not Found";
          break;
    }
}