<?php

include __DIR__ ."/../../../../backend/controller/UsersController.php";
$UsersController = new UsersController();

session_start();

$password = "password";
$Validation = "Register_Adm";


if(!isset($_SESSION["id_Adm"])){
    header("Location: ../../../index.php");
}

if(isset($_GET["idAdm"])){
    $password = "text";
    $Validation = "Edit_Adm";
    $Adm = $UsersController->getAdmById($_GET["idAdm"]);
}



?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro_Adm</title>
</head>
<body>
    <h2> <?php if ($Validation == "Register_Adm"){echo 'Registre um novo Adm';} else {echo 'Edite um Adm';} ?> </h2>
    <form action="../../../../backend/router/UsersRouter.php?ValidationCRUD=<?php echo $Validation ?> " method="POST">
        <input type="hidden" name="AdmId" value="<?php if(isset($_GET["idAdm"])) { echo $Adm["idAdm"];} else {echo "";}?>">
        <h1>Nome do Administrador</h1>
        <input type="text" name="name" value="<?php if(isset($_GET["idAdm"])) {echo $Adm["loginUser"];} else {echo "";} ?>">
        <h1>Senha do Administrador</h1>
        <input type= <?php echo $password ?> name="password" value="<?php if (isset($_GET["idAdm"])) {echo $Adm["senhaAdm"];} else {echo "";} ?>">
        <button type="submit"><?php if ($Validation == "Register_Adm"){echo 'Registre um novoAdm';} else {echo 'Edite um Adm';} ?></button>
    </form>



</body>
</html>