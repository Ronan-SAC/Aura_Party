<?php

include __DIR__ . "/../../../../backend/controller/UsersController.php";
$UsersController = new UsersController();

session_start();

if(isset($_GET["idEspaco"])){
    $LocationReservation = $UsersController->getLocationById($_GET['idEspaco']);
}

if(isset($_GET["idUser"])){
    $UserReservation = $UsersController->getUserById($_GET['idUser']);
}

if(!isset($_SESSION["id_Adm"])){
    header("Location: ../../../index.php");
}

$Reservas = $UsersController->getALLReservations();

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin_Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="icon" href="../../../../assets/aura.png">
</head>
<body>

<!--NavBar-->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="../../../../assets/aura.png" alt="logo" width="80" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../index.php">Voltar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h2 class="mb-4">Lista de Reservas</h2>
    <div class="mb-4">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addReservationModal">Adicionar Reserva</button>
    </div>
    
    <!-- Tabela de Reservas -->
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Cliente</th>
                <th scope="col">Espaço</th>
                <th scope="col">Data Marcada</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($Reservas as $item){
                $User = $UsersController->GetUserReservationById($item['idUsuario']);
                $Location = $UsersController->GetLocationReservationById($item['idEspaco']);
                echo 
                    '<tr>'.
                    '<td>' . $item["idReserva"] . '</td>' .
                    '<td>' . $User . '</td>'.
                    '<td>' . $Location . '</td>'.
                    '<td>' . $item['data_'] . '</td>'.
                    
                

                   '<td><a class="btn btn-warning btn-action" data-bs-target="#editClientModal"
    href="?idReserva='.$item['idReserva'].'">Editar</a>
                      
       
                      <form action="../../../../backend/router/UsersRouter.php?ValidationCRUD=Delete_Reservations" method="POST">
                        <button class="btn btn-danger btn-action">Excluir</button>
                        <input type="hidden" name="idReservations" value="'.$item["idReserva"].'">
                    </form></td>'.
                    '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Modal para Adicionar Reserva -->
<div class="modal fade" id="addReservationModal" tabindex="-1" aria-labelledby="addReservationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addReservationModalLabel">Adicionar Nova Reserva</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../../../backend/router/UsersRouter.php?ValidationCRUD=Register_Reservation" method="POST">
                    <div class="mb-3">
                        <label for="reservationClient" class="form-label">Cliente</label>
                        <input name="User" type="text" class="form-control" id="reservationClient" placeholder="Digite o nome do cliente" required>
                    </div>
                    <div class="mb-3">
                        <label for="reservationSpace" class="form-label">Espaço</label>
                        <input name="Espaco" type="text" class="form-control" id="reservationSpace" placeholder="Digite o nome do espaço reservado" required>
                    </div>
                    <div class="mb-3">
                        <label for="reservationDate" class="form-label">Data Marcada</label>
                        <input name="Data" type="date" class="form-control" id="reservationDate" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Editar Reserva -->
<div class="modal fade <?php echo isset($_GET['idReserva']) ? 'show' : ''; ?>" id="editReservationModal" tabindex="-1" aria-labelledby="editReservationModalLabel" aria-hidden="true" style="<?php echo isset($_GET['idReserva']) ? 'display: block;' : ''; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editReservationModalLabel">Editar Reserva</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php if (isset($_GET['idReserva'])): ?>
            <?php
            // Recuperar os dados da reserva
            $reservation = $UsersController->getReservationsById($_GET['idReserva']);
            $user = $UsersController->GetUserReservationById($reservation['idUsuario']);
            $location = $UsersController->GetLocationReservationById($reservation['idEspaco']);
            ?>

            <form action="../../../../backend/router/UsersRouter.php?ValidationCRUD=Edit_Reservations" method="POST">
                <input type="hidden" name="idReserva" value="<?php echo $reservation['idReserva']; ?>">
                <div class="mb-3">
                    <label for="editReservationClient" class="form-label">Cliente</label>
                    <input type="text" class="form-control" id="editReservationClient" name="User" value="<?php echo ($user); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="editReservationSpace" class="form-label">Espaço</label>
                    <input type="text" class="form-control" id="editReservationSpace" name="Espaco" value="<?php echo ($location); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="editReservationDate" class="form-label">Data Marcada</label>
                    <input type="date" class="form-control" id="editReservationDate" name="Data" value="<?php echo $reservation['data_']; ?>" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </div>
            </form>
        <?php else: ?>
            <p>Não foi possível carregar os dados da reserva.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>