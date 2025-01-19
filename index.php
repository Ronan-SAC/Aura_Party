<?php

session_start();

if(isset($_SESSION["id_User"])){
    header("Location: ./pages/User/index.php");
}
 
if(isset($_SESSION["id_Admin"])){
    header("Location: ./pages/Admin/index.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="./assets/oculos.png">
    <title>Aura Parties</title>
</head>
<body>
    <div class="box">
        <span class="borderline"></span>
        <form action="./backend/router/LoginRouter.php?Login_Validation=True" method="POST">
            <h2>Login</h2>
            <div class="inputBox">
                <input type="text" required ="required" name="name">
                <span>Usuario</span>
                <i></i>
            </div> <!--Input Box-->
            <div class="inputBox">
                <input type="password" required ="required" name="password">
                <span>Senha</span>
                <i></i>
            </div> <!--Input Box-->
            <div class="links">
                <a href="#">Esqueci a senha </a>
                <a href="#">Criar conta </a>
            </div><!--Links-->
            <input type="submit" value="Entrar "> 
        </form>
    </div><!--box-->
    
</body>
</html>