<?php

include __DIR__ ."/../../../../backend/controller/UsersController.php";
$UsersController = new UsersController();

session_start();

$Validation = "Register_Location";


if(!isset($_SESSION["id_Adm"])){
    header("Location: ../../../index.php");
}

if(isset($_GET["idLocation"])){
    $Validation = "Edit_Location";
    $Locations = $UsersController->getLocationById($_GET["idLocation"]);
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
    <h2> <?php if ($Validation == "Register_Location"){echo 'Registre um novo Local';} else {echo 'Edite um Local';} ?> </h2>
    <form action="../../../../backend/router/UsersRouter.php?ValidationCRUD=<?php echo $Validation ?> " method="POST" enctype="multipart/form-data">
        <input type="hidden" name="LocationId" value="<?php if(isset($_GET["idLocation"])) { echo $Locations["idEspaco"];} else {echo "";}?>">
        <input type="hidden" name="imagem_local" value="<?php if(isset($_GET["idLocation"])) { echo $Locations["imagem_local"];} else {echo "";}?>">

        <h1>Nome</h1>
        <input type="text" name="name" value="<?php if(isset($_GET["idLocation"])) {echo $Locations["nomeEspaco"];} else {echo "";} ?>">
        <h1>Endereço</h1>
        <input type= "text" name="enderecoEspaco" value="<?php if (isset($_GET["idLocation"])) {echo $Locations["enderecoEspaco"];} else {echo "";} ?>">
        <h1>Tipo (Casa,Salão de Festas,Apartamento,Club)</h1>
        <input type= "text" name="tipo" value="<?php if (isset($_GET["idLocation"])) {echo $Locations["tipo"];} else {echo "";} ?>">
        <h1>Descrição</h1>
        <input type= "text" name="descricaoEspaco" value="<?php if (isset($_GET["idLocation"])) {echo $Locations["descricaoEspaco"];} else {echo "";} ?>">
        <h1>Lotação Maxima</h1>
        <input type= "text" name="lotacaoMax" value="<?php if (isset($_GET["idLocation"])) {echo $Locations["lotacaoMax"];} else {echo "";} ?>">
        <h1>Imagem do Local</h1>
        <img src="../../../../imgs_local_db/<?php if (isset($_GET["idLocation"])) {echo $Locations["imagem_local"];} else {echo "";}?>" alt="Sem Imagem" width="300" height="300">
        <h1></h1>
        <input type="file" name="Imagem" accept="image/*">
        <h1></h1>
         <button type="submit"><?php if ($Validation == "Register_Location"){echo 'Registre um novo Local';} else {echo 'Edite um Local';} ?></button>
    </form>




</body>
</html>




