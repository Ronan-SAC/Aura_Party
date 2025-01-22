<?php
include_once ('db.php');
include __DIR__ ."/backend/UsersController.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_cliente = $_POST['nome_cliente'];
    $data_reserva = $_POST['data_reserva'];
    $endereco = $_POST['endereco'];
    
    $UsersController = new UsersController();
    $Reserva = $UsersController->addReserva($nome_cliente,$data_reserva,$endereco);
    
    // Prepara a consulta para evitar injeção SQL
    
}
?>

<a href="agenda.php">Voltar para a agenda</a>
