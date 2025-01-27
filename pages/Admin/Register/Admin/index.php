<?php
session_start();
 
if(!isset($_SESSION["id_Adm"])){
    header("Location: ../../index.php");
}

if(isset($_POST['logout'])){
    header("Location: ../../index.php");
    unset($_SESSION["id_Adm"]);
}

include __DIR__ ."../../../../../backend/controller/UsersController.php";
$UsersController = new UsersController();
$Adms = $UsersController->getALLAdmin();
if (isset($_GET['idAdm'])) {
  $idAdm = $_GET['idAdm'];
  $Adm = $UsersController->getAdmById($idAdm);
}


?>



<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin_ADM</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="icon" href="../../../../assets/aura.png">
  </head>
  <style>
    .container {
      margin-top: 50px;
    }
    .btn-action {
      margin-left: 5px;
    }
    .container-table{
      width: min(900px, 100% - 3rem);
      margin-inline: auto;
      overflow-x: auto;
      max-width: 100%;
    }
    table{
      border-collapse: collapse;
      border-spacing: 0;
    }
    @media (max-width: 440px){

      table{
        border: 3px solid white
      }
      table thead tr{
        display: none
      }
      table tr{
        display:block
      }
      table th, table td{
        padding: .5em
      }
      table td{
        text-align: right;
        display: block;
      }
      table td::before{
        content: attr(data-title) ": ";
        float: left;
      }
    }
  </style>
</head>
<body>
   <!--NavBar-->

   <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"
        ><img src="../../../../assets/aura.png" alt="logo" width="80"
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
            <a class="nav-link" href="../../index.php">Voltar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <h2 class="mb-4">Lista de Administradores</h2>
    <!-- Botão Adicionar Admin -->
    <div class="mb-4">
      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addAdminModal">Adicionar Admin</button>
    </div>
    
    <!-- Tabela de Administradores -->
    <div class="container-table">
    <table class="table table-dark table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope='col'>Senha</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>

        <?php

foreach($Adms as $item){

   echo 
   '<tr>'.
   "<td data-title='Id'>" . $item["idAdm"] .    '</td>' .
   "<td data-title='Usuário'>" . $item["loginUser"] . '</td>'. 
   "<td data-title='Senha'>" . $item["senhaAdm"] . '</td>'.

   "<td data-title='Opções'>".'<a class="btn btn-warning btn-action" data-bs-target="#editAdminModal"
       href="?idAdm='.$item['idAdm'].'">Editar</a>


<form action="./../../../../backend/router/UsersRouter.php?ValidationCRUD=Delete_Adm" method="POST">
  <button class="btn btn-danger btn-action">Excluir</button>
  <input type="hidden" name="idAdm" value='.$item["idAdm"].'>
</form>


</td>

</tr>'; 

   
}

?>




      </tbody>
    </table>
  </div>


  









  <!-- Modal para Adicionar Admin -->
  <div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addAdminModalLabel">Adicionar Novo Admin</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


        <form action="../../../../backend/router/UsersRouter.php?ValidationCRUD=Register_Adm" method="POST">
            <div class="mb-3">
              <label for="adminName" class="form-label">Nome</label>
              <input name='name' type="text" class="form-control" id="adminName" placeholder="Digite o nome do admin">
            </div>
            <div class="mb-3">
              <label for="adminPassword" class="form-label">Senha</label>
              <input name='password' type="text" class="form-control" id="adminPassword" placeholder="Digite a senha do admin">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Adicionar</button>
        </div>
    </form>
      </div>
    </div>
  </div>





  <!-- Modal para Editar Admin -->
  <div class="modal fade <?php echo isset($_GET['idAdm']) ? 'show' : ''; ?>" id="editAdminModal" tabindex="-1" aria-labelledby="editAdminModalLabel" aria-hidden="true" style="<?php echo isset($_GET['idAdm']) ? 'display: block;' : ''; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAdminModalLabel">Editar Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if (isset($_GET['idAdm'])): ?>
                    <?php
                    $Adm = $UsersController->getAdmById($_GET['idAdm']);
                    ?>
                    <form action="../../../../backend/router/UsersRouter.php?ValidationCRUD=Edit_Adm" method="POST">
                        <div class="mb-3">
                            <input type="hidden" name="AdmId" value="<?php echo $Adm['idAdm']; ?>">
                            <label for="editAdminName" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="editAdminName" name="name" value="<?php echo $Adm['loginUser']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="editAdminPassword" class="form-label">Senha</label>
                            <input type="text" class="form-control" id="editAdminPassword" name="password" value="<?php echo $Adm['senhaAdm']; ?>" required>
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            </div>
                    </form>
                <?php else: ?>
                    <p>Não foi possível carregar os dados do administrador.</p>
                <?php endif; ?>
        </div>
    </div>
</div>

  <!-- Link do JavaScript do Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
