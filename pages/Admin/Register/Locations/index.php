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
$Locations = $UsersController->getALLLocations();

?>




<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin_Locations</title>
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
    .img-thumbnail {
      width: 80px;
      height: auto;
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
    <h2 class="mb-4">Lista de Locais</h2>
    <!-- Botão Adicionar Local -->
    <div class="mb-4">
      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addLocationModal">Adicionar Local</button>
    </div>
    
    <!-- Tabela de Locais -->
    <div class="container-table"></div>
    <table class="table table-dark table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Endereço</th>
          <th scope="col">Tipo</th>
          <th scope="col">Descrição</th>
          <th scope="col">Lotação Máxima</th>
          <th scope="col">Imagem</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>

<?php
      foreach($Locations as $item){

echo 
'<tr>'.
"<td data-title='Id'>" . $item["idEspaco"] .    '</td>' .
"<td data-title='Local'>" . $item["nomeEspaco"] . '</td>'. 
"<td data-title='Endereço'>" . $item["enderecoEspaco"] . '</td>'.
"<td data-title='Tipo'>" . $item["tipo"] . '</td>'.
"<td data-title='Desc'>" . $item["descricaoEspaco"] . '</td>'.
"<td data-title='Lotação'>" . $item["lotacaoMax"] . '</td>'.
"<td data-title='Imagem'><img src=../../../../imgs_local_db/".$item["imagem_local"].' width ="75" height="75" alt="imagem"> </td>'.

"<td data-title='Opções'>".'<a class="btn btn-warning btn-action" data-bs-target="#editClientModal"
    href="?idEspaco='.$item['idEspaco'].'">Editar</a>


<form action="../../../../backend/router/UsersRouter.php?ValidationCRUD=Delete_Location" method="POST">
<button class="btn btn-danger btn-action">Excluir</button>
<input type="hidden" name="idEspaco" value='.$item["idEspaco"].'>
</form>


</td>

</tr>'; 


}

?>



      </tbody>
    </table>
  </div>

  <!-- Modal para Adicionar Local -->
  <div class="modal fade" id="addLocationModal" tabindex="-1" aria-labelledby="addLocationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addLocationModalLabel">Adicionar Novo Local</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="../../../../backend/router/UsersRouter.php?ValidationCRUD=Register_Location" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="locationName" class="form-label">Nome</label>
              <input name='name' type="text" class="form-control" id="locationName" placeholder="Digite o nome do local">
            </div>
            <div class="mb-3">
              <label for="locationAddress" class="form-label">Endereço</label>
              <input name='enderecoEspaco' type="text" class="form-control" id="locationAddress" placeholder="Digite o endereço do local">
            </div>
            <div class="mb-3">
              <label for="locationType" class="form-label">Tipo</label>
              <input name='tipo' type="text" class="form-control" id="locationType" placeholder="Digite o tipo do local (Ex.: Parque, Auditório)">
            </div>
            <div class="mb-3">
              <label for="locationDescription" class="form-label">Descrição</label>
              <textarea name='descricaoEspaco' class="form-control" id="locationDescription" rows="3" placeholder="Descreva o local"></textarea>
            </div>
            <div class="mb-3">
              <label for="locationCapacity" class="form-label">Lotação Máxima</label>
              <input  name='lotacaoMax' type="number" class="form-control" id="locationCapacity" placeholder="Digite a lotação máxima">
            </div>
            <div class="mb-3">
              <label for="locationImage" class="form-label">Imagem do Local</label>
              <input name='Imagem' type="file" class="form-control" id="locationImage">
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

  <!-- Modal para Editar Local -->
  <div class="modal fade <?php echo isset($_GET['idEspaco']) ? 'show' : ''; ?>" id="editLocationModal" tabindex="-1" aria-labelledby="editLocationModalLabel" aria-hidden="true" style="<?php echo isset($_GET['idEspaco']) ? 'display: block;' : ''; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLocationModalLabel">Editar Local</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if (isset($_GET['idEspaco'])): ?>
                    <?php
                    // Recuperar os dados do local com base no idEspaco
                    $location = $UsersController->getLocationById($_GET['idEspaco']);
                    ?>
                    <form action="../../../../backend/router/UsersRouter.php?ValidationCRUD=Edit_Location" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="hidden" name="idEspaco" value="<?php echo $location['idEspaco']; ?>">
                            <label for="editLocationName" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="editLocationName" name="name" value="<?php echo $location['nomeEspaco']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="editLocationAddress" class="form-label">Endereço</label>
                            <input type="text" class="form-control" id="editLocationAddress" name="enderecoEspaco" value="<?php echo $location['enderecoEspaco']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="editLocationType" class="form-label">Tipo</label>
                            <input type="text" class="form-control" id="editLocationType" name="tipo" value="<?php echo $location['tipo']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="editLocationDescription" class="form-label">Descrição</label>
                            <textarea class="form-control" id="editLocationDescription" name="descricaoEspaco" rows="3" required><?php echo $location['descricaoEspaco']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editLocationCapacity" class="form-label">Lotação Máxima</label>
                            <input type="number" class="form-control" id="editLocationCapacity" name="lotacaoMax" value="<?php echo $location['lotacaoMax']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <input  type="hidden" class="form-control" id="editLocationImage" name="imagem_local" value="<?php echo $location['imagem_local']; ?>">
                        </div>
                <?php else: ?>
                    <p>Não foi possível carregar os dados do local.</p>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
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
