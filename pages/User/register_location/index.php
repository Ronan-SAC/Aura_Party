<?php
include __DIR__ ."../../../../backend/controller/UsersController.php";
$UsersController = new UsersController();

session_start();

$Locations = $UsersController->getLocationById($_GET["idLocation"]);

?>




<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Detalhes do Local</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <style>
    html, body {
      height: 100%;
      margin: 0;
      display: flex;
      flex-direction: column;
      background: linear-gradient(45deg, #d2001a , #7462ff, #f48e21);
    }

    img{
      border-radius: 30px;
    }

    .container {
      flex: 1;
    }

    footer {
      background: linear-gradient(45deg, #1c1c1c, #2b2b2b);
      margin-top: 20px;
      padding: 20px 0;
      text-align: center;
    }

    nav{
        background: linear-gradient(45deg, #1c1c1c, #2b2b2b);
    }
  </style>
</head>
<body>
  <!-- NavBar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="../../../assets/aura.png" alt="logo" width="80" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../index.php">Voltar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Conteúdo -->



  <div class="container mt-5">
    <h1 class="text-center"><?php echo $Locations['nomeEspaco']; ?></h1>
    <div class="row mt-4">
      <div class="col-md-6">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="1800">
            <img src="../../../imgs_local_db/<?php echo $Locations['imagem_local']; ?>"  width="366" height="366" class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <h5> <?php echo 'Descrição do Local:', '<br>', $Locations['descricaoEspaco']; ?> </h5>
        <ul>
          <li> <?php echo 'Endereço do Local:', '<br>', $Locations['enderecoEspaco']; ?> </li>
          <li> <?php echo 'Tipo do Local:' ,'<br>', $Locations['tipo']; ?> </li>
          <li> <?php echo 'Maxímo de Pessoas:','<br>', $Locations['lotacaoMax'], ' Pessoas'; ?> </li>
        </ul>
        <button class="btn btn-primary">Reservar</button>
      </div>
    </div>
  </div>





  <!-- Footer -->
  <footer>
    <div class="container">
      <p>&copy; 2025 - Todos os direitos reservados.</p>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>