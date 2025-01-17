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
    <link rel="stylesheet" href="styles.css"> 
    <title>Login</title>
</head>
<body>
<section id="section_login">
    <form action="./backend/router/LoginRouter.php?Login_Validation=True" method="POST">
        <h1>Login</h1>
        <div class="container_login">
            <h2>Insira seu Nome</h2>
             <input type="text" name="name" class="input">
             <h2>Insira sua Senha</h2>
             <input type="password" name="password" class="input">
             <button type="submit" class="button-6" role="button">Logar</button>
        </div>
    </form>

    </section>
    
</body>
</html>