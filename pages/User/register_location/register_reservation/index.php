<?php
include __DIR__ ."../../../../../backend/controller/UsersController.php";
$UsersController = new UsersController();

$Reservas = $UsersController->getALLReservationsbyIdLocation($_GET["idLocation"]);
$IdLocation = $_GET["idLocation"];
session_start();
$IdUser = $_SESSION['id_User'];


$datasReservadas = [];

foreach ($Reservas as $Reserva) {
    $datasReservadas[] = $Reserva['data_']; 
}


function generateCalendar($month, $year, $datasReservadas) {

    $date = new DateTime();
    $date->setDate($year, $month, 1);
    $firstDay = $date->format('w');  
    $lastDate = $date->format('t');  
    
   
    $calendarHTML = '<div id="calendar">';
    
 
    $daysOfWeek = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];
    foreach ($daysOfWeek as $day) {
        $calendarHTML .= "<div>$day</div>";
    }

    
    for ($i = 1; $i <= $lastDate; $i++) {
        $currentDate = $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) . '-' . str_pad($i, 2, '0', STR_PAD_LEFT);

        $reservedClass = in_array($currentDate, $datasReservadas) ? 'reservado' : '';

        
        $calendarHTML .= "<div class='$reservedClass'>$i</div>";
    }

    $calendarHTML .= '</div>';

    return $calendarHTML;
}


$month = date('m');
$year = date('Y');


$calendar = generateCalendar($month, $year, $datasReservadas);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário de Reservas</title>
    <link rel="stylesheet" href="../../../../intro/styles.css">
</head>
<body>

<a  href="../index.php?idLocation=<?php echo $IdLocation ?>"  style="text-decoration:none; font-size:large; color:#f48e21;">Voltar</a>

    <h1>Calendário de Reservas</h1>
    
    <?php echo $calendar; ?> 

    <h2>Fazer Reserva</h2>
    <form action="../../../../backend/router/UsersRouter.php?ValidationCRUD=Register_Reservation_User" method="POST">
        <label for="data">Data:</label>
        <input type="date" id="data" name="Data" required>
        <input type="hidden" name="idEspaco" value="<?php echo $IdLocation ?>">
        <input type="hidden" name="idUser" value="<?php echo $IdUser ?>">
        <button type="submit">Reservar</button>
    </form>

</body>

<style>
    body {
    background: linear-gradient(45deg, #d2001a , #7462ff, #f48e21);
    color: #ddd;
    font-family: Arial, sans-serif;
    text-align: center;
    animation: color 12s ease-in-out infinite;
    height: 100vh;
    width: 100%;
    background-size: 300% 300%;
    margin-top: 20px;
            
}

#calendar {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 5px;
    margin-bottom: 30px;
    color: #ddd;
}

#calendar div {
    padding: 20px;
    border: 1px solid #f48e21;
    cursor: pointer;
}

.reservado {
    background-color: #f48e21;  /* Fundo vermelho claro para dias reservados */
    color: #fff;
}

button {
    padding: 10px 20px;
    background-color: #7462ff;
    color: white;
    border: 1px solid #f48e21;
    cursor: pointer;
    border-radius: 5px;
}

button:hover {
    background-color: #f48e21;
    border: 1px solid #7462ff;
}
</style>
</html>