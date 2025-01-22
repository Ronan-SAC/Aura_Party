<?php
include_once ('db.php');
include __DIR__ ."/backend/UsersController.php";

$UsersController = new UsersController();
$Clientes = $UsersController->getALLUser();
$Adms = $UsersController->getALLAdmin();
$Espaços = $UsersController->getALLLocations();
$Reservas = $UsersController->getALLReservations();
$data = isset($_GET['data']) ? $_GET['data'] : date('Y-m-d');
$refresh = $UsersController-> RefreshData($data);
// Obtendo a data de hoje ou uma data específica da URL

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Diária</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Agenda de Reservas para o dia <?= date('d/m/Y', strtotime($data)) ?></h1>

    <form action="" method="GET">
        <label for="data">Escolha a data:</label>
        <input type="date" name="data" id="data" value="<?= $data ?>">
        <button type="submit">Buscar</button>
    </form>

    <h2>Reservas para o dia <?= date('d/m/Y', strtotime($data)) ?>:</h2>

    <?php
    if ($refresh > 0) {
        echo "<ul>";
        while($row = $refresh->fetch_assoc()) {
            echo "<li><strong>Nome:</strong> " . $row['nome_cliente'] . 
                 " | <strong>Local:</strong> " . $row['endereco'] . 
                 " | <strong>Data:</strong> " . $row['data_reserva'] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Nenhuma reserva encontrada para esse dia.</p>";
    }
    ?>

    <hr>
    <h2>Adicionar nova reserva</h2>
    <form action="adicionar_reserva.php" method="POST">
        <label for="nome_cliente">Nome do cliente:</label>
        <input type="text" id="nome_cliente" name="nome_cliente" required><br>

        <label for="endereco">Local:</label>
        <select id="endereco" name="endereco" required>
            <?php foreach ($Espaços as $item) { ?>
            <option value="<?php echo $item['nomeEspaco']; ?>"><?php echo $item['nomeEspaco']; ?></option>
            <?php } ?>
            </select><br>

        <label for="data_reserva">Data da reserva:</label>
        <input type="date" id="data_reserva" name="data_reserva" required><br>
        <button type="submit">Adicionar Reserva</button>
    </form>

</body>
</html>

<?php
?>
