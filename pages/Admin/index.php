<?php
session_start();
 
if(!isset($_SESSION["id_Adm"])){
    header("Location: ../../index.php");
}

if(isset($_POST['logout'])){
    header("Location: ../../index.php");
    unset($_SESSION["id_Adm"]);
}

include __DIR__ ."../../../backend/controller/UsersController.php";

$UsersController = new UsersController();
$Clientes = $UsersController->getALLUser();
$Adms = $UsersController->getALLAdmin();
$Espaços = $UsersController->getALLLocations();
$Reservas = $UsersController->getALLReservations();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/oculos.png">
    <title>Admin_Home</title>
</head>
<body>
    Admin_Home
    <form method="post">
        <button type="submit" name="logout">Deslogar</button>
    </form>


    <h2>Lista de Admin</h2>
    <a href="./Register/Admin/index.php"> <button>Register</button></a>
    <table>
        <thead>
            <tr>
                <td>
                    ID
                </td>
                <td>
                    Nome
                </td>
                <td>
                    Senha
                </td>
                <td>
                    Ações
                </td>
            </tr>
        </thead>
        <tbody>

        <?php

        foreach($Adms as $item){

           echo 
           '<tr>'.
           '<td>' . $item["idAdm"] .    '</td>' .
           '<td>' . $item["loginUser"] . '</td>'. 
           '<td>' . $item["senhaAdm"] . '</td>'.

           '<td><a href="./Register/Admin/index.php?idAdm='.$item["idAdm"].'">Edit</a>

        <form action="../../backend/router/UsersRouter.php?ValidationCRUD=Delete_Adm" method="POST">
          <button type="submit" name="delete">Delete</button>
          <input type="hidden" name="idAdm" value='.$item["idAdm"].'>
        </form>

        </td>

        </tr>'; 

           
        }

        ?>
 
        </tbody>
    </table>



    <h2>Lista de Clientes</h2>
    <a href="./Register/User/index.php"> <button>Cadastrar</button></a>
    <table>
        <thead>
            <tr>
                <td>
                    ID
                </td>
                <td>
                    Nome
                </td>
                <td>
                    Senha
                </td>
                <td>
                    Telefone
                </td>
                <td>
                    Cpf
                </td>
                <td>
                    Email
                </td>
                <td>
                    Ações
                </td>
                
            </tr>
        </thead>
        <tbody>

        <?php

        foreach($Clientes as $item){




           echo 
           '<tr>'.
           '<td>' . $item["idUser"] .    '</td>' .
           '<td>' . $item["loginUser"] . '</td>'. 
           '<td>' . $item["senha"] . '</td>'.
           '<td>' . $item["telefone"] . '</td>'.
           '<td>' . $item["cpf"] . '</td>'.
           '<td>' . $item["email"] . '</td>'.

           '<td><a href="./Register/User/index.php?idUser='.$item["idUser"].'">Edit</a>

        <form action="../../backend/router/UsersRouter.php?ValidationCRUD=Delete_User" method="POST">
          <button type="submit" name="delete">Delete</button>
          <input type="hidden" name="idUser" value='.$item["idUser"].'>
        </form>

        </td>

        </tr>'; 
           
        }

        ?>
 
        </tbody>
    </table>








    <h2>Lista de Espaços</h2>
    <a href="./Register/Locations/index.php"> <button>Cadastrar</button></a>
    <table>
        <thead>
            <tr>
                <td>
                    ID
                </td>

                <td>
                    Nome
                </td>
                <td>
                    Endereço
                </td>
                <td>
                    Tipo
                </td>
                <td>
                    Descrição
                </td>
                <td>
                    Lotação Maxima
                </td>
                
            </tr>
        </thead>
        <tbody>

        <?php

        foreach($Espaços as $item){





           echo 
           '<tr>'.
           '<td>' . $item["idEspaco"] .    '</td>' .
           '<td>' . $item["nomeEspaco"] . '</td>'. 
           '<td>' . $item["enderecoEspaco"] . '</td>'. 
           '<td>' . $item["tipo"] . '</td>'.
           '<td>' . $item["descricaoEspaco"] . '</td>'.
           '<td>' . $item["lotacaoMax"] . '</td>'.

           '<td><a href="./Register/Locations/index.php?idLocation='.$item["idEspaco"].'">Edit</a>

        <form action="../../backend/router/UsersRouter.php?ValidationCRUD=Delete_Location" method="POST">
          <button type="submit" name="delete">Delete</button>
          <input type="hidden" name="idLocation" value='.$item["idEspaco"].'>
        </form>

        </td>

        </tr>'; 

           
        }

        ?>
 
        </tbody>
    </table>









    <h2>Lista de Reservas</h2>
    <a href="./Register/Locations/index.php"> <button>Cadastrar</button></a>
    <table>
        <thead>
            <tr>
                <td>
                    ID 
                </td>

                <td>
                    Cliente
                </td>
                <td>
                    Espaço
                </td>
                <td>
                    Data Marcada
                </td>
                
            </tr>
        </thead>
        <tbody>



    <?php

foreach($Reservas as $item){

    $UserReservation = $UsersController->GetUserReservationById($item['idUser']);
    $LocationReservation = $UsersController->GetLocationReservationById($item['idEspaco']);


   echo 
   '<tr>'.
   '<td>' . $item["idReserva"] .    '</td>' .
   '<td>' . $UserReservation . '</td>'. 
   '<td>' . $LocationReservation . '</td>'. 
   '<td>' . $item["data_reserva"] . '</td>'.

   '<td><a href="./Register/Reservations/index.php?idReservations='.$item["idReserva"].'">Edit</a>

<form action="../../backend/router/UsersRouter.php?ValidationCRUD=Delete_Reservations" method="POST">
  <button type="submit" name="delete">Delete</button>
  <input type="hidden" name="idLocation" value='.$item["idEspaco"].'>
</form>

</td>

</tr>'; 

   
}

?>

</tbody>
</table>



    

    
    
</body>
</html>