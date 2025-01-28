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
$Users = $UsersController->getALLUser();

?>


<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin_USER</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="icon" href="../../../../assets/aura.png">
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
    <h2 class="mb-4">Lista de Clientes</h2>
    <!-- Botão Adicionar Cliente -->
    <div class="mb-4">
      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addClientModal">Adicionar Cliente</button>
    </div>
    
    <!-- Tabela de Clientes -->
    <div class="contatiner-table">
    <table class="table table-dark table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Senha</th>
          <th scope="col">Telefone</th>
          <th scope="col">CPF</th>
          <th scope="col">Email</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
       
      <?php

foreach($Users as $item){

   echo 
   '<tr>'.
   "<td data-title='Id'>" . $item["idUser"] .    '</td>' .
   "<td data-title='Usuário'>" . $item["loginUser"] . '</td>'. 
   "<td data-title='Senha'>" . $item["senha"] . '</td>'.
   "<td data-title='Telefone'>" . $item["telefone"] . '</td>'.
   "<td data-title='Cpf'>" . $item["cpf"] . '</td>'.
   "<td data-title='Email'>" . $item["email"] . '</td>'.

   "<td data-title='Opções'>".'<a class="btn btn-warning btn-action" data-bs-target="#editClientModal"
       href="?idUser='.$item['idUser'].'">Editar</a>


<form action="../../../../backend/router/UsersRouter.php?ValidationCRUD=Delete_User" method="POST">
  <button class="btn btn-danger btn-action">Excluir</button>
  <input type="hidden" name="idUser" value='.$item["idUser"].'>
</form>


</td>

</tr>'; 

   
}

?>

      </tbody>
    </table>
  </div>

  <!-- Modal para Adicionar Cliente -->
  <div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="addClientModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addClientModalLabel">Adicionar Novo Cliente</h5>
          <a class="btn-close" data-bs-target="#editAdminModal" href="./index.php"></a>
        </div>
        <div class="modal-body">
        <form action="../../../../backend/router/UsersRouter.php?ValidationCRUD=Register_User" method="POST">
            <div class="mb-3">
              <label for="clientName" class="form-label">Nome</label>
              <input name='name' type="text" class="form-control" id="clientName" placeholder="Digite o nome do cliente">
            </div>
            <div class="mb-3">
              <label for="clientPassword" class="form-label">Senha</label>
              <input name='password' type="text" class="form-control" id="clientPassword" placeholder="Digite a senha do cliente">
            </div>
            <div class="mb-3">
              <label for="clientPhone" class="form-label">Telefone</label>
              <input name='telefone' type="text" class="form-control" id="clientPhone" placeholder="Digite o telefone do cliente">
            </div>
            <div class="mb-3">
              <label for="clientCpf" class="form-label">CPF</label>
              <input name='cpf' type="text" class="form-control" id="clientCpf" placeholder="Digite o CPF do cliente">
            </div>
            <div class="mb-3">
              <label for="clientEmail" class="form-label">E-mail</label>
              <input name='email' type="email" class="form-control" id="clientEmail" placeholder="Digite o e-mail do cliente">
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



  <!-- Modal para Editar Cliente -->
  <div class="modal fade <?php echo isset($_GET['idUser']) ? 'show' : ''; ?>" id="editClientModal" tabindex="-1" aria-labelledby="editClientModalLabel" aria-hidden="true" style="<?php echo isset($_GET['idUser']) ? 'display: block;' : ''; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editClientModalLabel">Editar Cliente</h5>
        <a class="btn-close" data-bs-target="#editAdminModal" href="./index.php"></a>
      </div>
      <div class="modal-body">
        <?php if (isset($_GET['idUser'])): ?>
            <?php
            // Recuperar os dados do usuário
            $user = $UsersController->getUserById($_GET['idUser']);
            ?>

            <form action="../../../../backend/router/UsersRouter.php?ValidationCRUD=Edit_User" method="POST">

                <div class="mb-3">
                    <input type="hidden" name="idUser" value="<?php echo $user['idUser']; ?>">
                    <label for="editClientName" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="editClientName" name="name" value="<?php echo $user['loginUser']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="editClientPassword" class="form-label">Senha</label>
                    <input type="text" class="form-control" id="editClientPassword" name="password" value="<?php echo $user['senha']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="editClientPhone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="editClientPhone" name="telefone" value="<?php echo $user['telefone']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="editClientCpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="editClientCpf" name="cpf" value="<?php echo $user['cpf']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="editClientEmail" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="editClientEmail" name="email" value="<?php echo $user['email']; ?>" required>
                </div>
        <?php else: ?>
            <p>Não foi possível carregar os dados do cliente.</p>
        <?php endif; ?>
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" data-bs-target="#editAdminModal" href="./index.php">Cancelar</a>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
      </div>

    </form>
    </div>
  </div>
</div>

  <!-- Link do JavaScript do Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
