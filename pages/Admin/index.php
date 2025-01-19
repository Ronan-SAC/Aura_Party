<?php
session_start();
 
if(!isset($_SESSION["id_Adm"])){
    header("Location: ../../index.php");
}

if(isset($_POST['logout'])){
    header("Location: ../../index.php");
    unset($_SESSION["id_Adm"]);
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_Home</title>
</head>
<body>

    Admin_Home
    <form method="post">
        <button type="submit" name="logout">Deslogar</button>
    </form>
    
</body>
</html>