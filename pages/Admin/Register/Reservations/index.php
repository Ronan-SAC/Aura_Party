

<?php

include __DIR__ ."/../../../../backend/controller/UsersController.php";
$UsersController = new UsersController();

session_start();
$Validation = "Register_Reservation";
if(isset($_GET["idEspaco"])){
$LocationReservation = $UsersController->getLocationById($_GET['idEspaco']);
}

if(isset($_GET["idUser"])){
    $UserReservation = $UsersController->getUserById($_GET['idUser']);
    }


if(!isset($_SESSION["id_Adm"])){
    header("Location: ../../../index.php");
}

if(isset($_GET["idReservations"])){
    $Validation = "Edit_Reservations";
    $Reservation = $UsersController->getReservationsById($_GET["idReservations"]);
    $User = $UsersController->GetUserReservationById($Reservation['idUsuario']);
    $Location = $UsersController->GetLocationReservationById($Reservation['idEspaco']);
    
}



?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro_Reservas</title>
</head>
<body>
    <h2> <?php if ($Validation == "Register_Reservation"){echo 'Registre uma nova Reserva';} else {echo 'Edite uma Reserva';} ?> </h2>
    <form action="../../../../backend/router/UsersRouter.php?ValidationCRUD=<?php echo $Validation ?> " method="POST">
        <input type="hidden" name="ReservationId" value="<?php if(isset($_GET["idReservations"])) { echo $Reservation["idReserva"];} else {echo "";}?>">

        <h1>Usuario</h1>
        <input type="text" name="User" value="<?php if(isset($_GET["idReservations"])) {echo $User;} else if (isset($_GET['idUser'])){echo $UserReservation['loginUser'];} else{echo '';} ?>">
        <h1>Espaco</h1>
        <input type= "text" name="Espaco" value="<?php if (isset($_GET["idReservations"])) {echo $Location;} else if(isset($_GET['idEspaco'])){echo $LocationReservation['nomeEspaco'];} else{echo '';}  ?>">
        <h1>Data da Reserva</h1>
        <input type= "date" name="Data" value="<?php if (isset($_GET["idReservations"])) {echo $Reservation["data_"];} else {echo "";} ?>">
         <button type="submit"><?php if ($Validation == "Register_Reservation"){echo 'Registre uma nova Reserva';} else {echo 'Edite uma Reserva';} ?></button>
    </form>




</body>
</html>

