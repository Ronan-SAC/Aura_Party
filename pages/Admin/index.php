<?php
session_start();
 
if(!isset($_SESSION["id_Adm"])){
    header("Location: ../../index.php");
}

if(isset($_POST['logout'])){
    header("Location: ../../index.php");
    unset($_SESSION["id_Adm"]);
}

?>




<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Home</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="icon" href="../../assets/aura.png">
  </head>

  <body>
    <!--NavBar-->

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"
          ><img src="../../assets/aura.png" alt="logo" width="80"
        /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <li class="nav-item">
                <form method="post">
                   <button class="nav-link" type="submit" name="logout">Deslogar</button>
                </form>

          </li>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="btn-group" role="group" aria-label="Basic outlined example">
      <a href="./Register/Admin/index.php"><button type="button" class="btn btn-outline-primary">Lista de Admin</button> </a>
        <a href="./Register/User/index.php"> <button type="button" class="btn btn-outline-primary">Lista de Clientes </button> </a>
        <a href="./Register/Locations/index.php"> <button type="button" class="btn btn-outline-primary">Lista de Espaços</button> </a>
        <a href="./Register/Reservations/index.php"> <button type="button" class="btn btn-outline-primary">Lista de Reservas </button> </a>
      </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>