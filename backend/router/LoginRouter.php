<?php

include __DIR__."./../controller/LoginController.php";

echo "teste2";

$loginController = new LoginController();


if($_SERVER["REQUEST_METHOD"] == "POST"){
    switch($_GET["Login_Validation"]){
        case 'True':
            echo "sla";
           $validation_user = $loginController->Client_Login_Validation($_POST["name"],$_POST["password"]);
           echo "sla2";
           $validation_adm = $loginController->Admin_Login_Validation($_POST["name"],$_POST["password"]);
           echo "sla3;";
            if($validation_user){
                header("Location: ../../pages/User/index.php");
            }
            if($validation_adm){
                header("Location: ../../pages/Admin/index.php");
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