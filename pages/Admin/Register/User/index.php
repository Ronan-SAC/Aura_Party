<?php

include __DIR__ ."/../../../../backend/controller/UsersController.php";
$UsersController = new UsersController();

session_start();

$password = "password";
$Validation = "Register_User";


if(!isset($_SESSION["id_Adm"])){
    header("Location: ../../../index.php");
}

if(isset($_GET["idUser"])){
    $password = "text";
    $Validation = "Edit_User";
    $Users = $UsersController->getUserById($_GET["idUser"]);
}



?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro_User</title>
</head>
<body>
    <h2> <?php if ($Validation == "Register_User"){echo 'Registre um novo Cliente';} else {echo 'Edite um Cliente';} ?> </h2>
    <form action="../../../../backend/router/UsersRouter.php?ValidationCRUD=<?php echo $Validation ?> " method="POST">
        <input type="hidden" name="UserId" value="<?php if(isset($_GET["idUser"])) { echo $Users["idUser"];} else {echo "";}?>">
        <h3>Nome</h3>
        <input type="text" name="name" value="<?php if(isset($_GET["idUser"])) {echo $Users["loginUser"];} else {echo "";} ?>">
        <h3>Senha</h3>
        <input type= <?php echo $password ?> name="password" value="<?php if (isset($_GET["idUser"])) {echo $Users["senha"];} else {echo "";} ?>">
        <h3>Telefone</h3>
        <input type="text" name="telefone" value="<?php if(isset($_GET["idUser"])) {echo $Users["telefone"];} else {echo "";} ?>">
        <h3>Cpf</h3>
        <input type="text" name="cpf" value="<?php if(isset($_GET["idUser"])) {echo $Users["cpf"];} else {echo "";} ?>">
        <h3>Email</h3>
        <input type="text" name="email" value="<?php if(isset($_GET["idUser"])) {echo $Users["email"];} else {echo "";} ?>">
        <button type="submit"><?php if ($Validation == "Register_User"){echo 'Registre um novo Cliente';} else {echo 'Edite um Cliente';} ?></button>
    </form>



</body>
</html>