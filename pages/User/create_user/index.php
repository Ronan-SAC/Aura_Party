<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criar Conta</title>
  <!-- Link do CSS do Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Link do Animate.css para animações -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <style>
    body {
      background: linear-gradient(45deg, #d2001a , #7462ff, #f48e21);
    }

    .card {
      background: linear-gradient(145deg, #1c1c1c, #2b2b2b); /* Fundo com gradiente cinza escuro */
      border: none;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.6);
    }

    h2 {
      color: #7462ff; /* Título em roxo */
    }

    .btn-primary {
      background-color: #f48e21; /* Laranja */
      border: none;
      transition: background-color 0.3s ease-in-out, transform 0.2s;
    }

    .btn-primary:hover {
      background-color: #d2001a; /* Vermelho no hover */
      transform: scale(1.05); /* Leve efeito de zoom */
    }

    .form-control {
      background-color: #2b2b2b; /* Fundo dos campos em cinza escuro */
      color: #fff;
      border: 1px solid #7462ff; /* Bordas roxas */
      transition: border-color 0.3s ease-in-out;
    }

    .form-control:focus {
      border-color: #f48e21; /* Foco com laranja */
      box-shadow: 0 0 8px #f48e21;
    }

    /* Ajuste para labels e links ficarem brancos */
    .form-label {
      color: #fff !important; /* Texto branco */
    }

    a {
      color: #fff !important; /* Links brancos */
      transition: color 0.3s ease-in-out;
    }

    a:hover {
      color: #7462ff !important; /* Links ficam roxos no hover */
      text-decoration: underline;
    }

    p{
        color: #fff;
    }

    .fade-in {
      animation: fadeIn 2s ease-in-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }
  </style>
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center vh-100 fade-in">
    <div class="card p-4 animate__animated animate__fadeInDown" style="width: 100%; max-width: 400px;">
      <h2 class="text-center mb-4">Criar Conta</h2>


      <form action="../../../backend/router/UsersRouter.php?ValidationCRUD=Create_User" method="POST">
        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input name="name" type="text" class="form-control" id="nome" placeholder="Digite seu nome completo" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input name="email" type="email" class="form-control" id="email" placeholder="Digite seu e-mail" required>
        </div>
        <div class="mb-3">
          <label for="telefone" class="form-label">Telefone</label>
          <input  name="telefone" type="tel" class="form-control" id="telefone" placeholder="Digite seu telefone" required>
        </div>
        <div class="mb-3">
          <label for="cpf" class="form-label">CPF</label>
          <input name="cpf" type="text" class="form-control" id="cpf" placeholder="Digite seu CPF" required>
        </div>
        <div class="mb-3">
          <label for="senha" class="form-label">Senha</label>
          <input name="password" type="password" class="form-control" id="senha" placeholder="Crie uma senha" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Criar Conta</button>
      </form>

      <div class="text-center mt-3">
        <p>Já tem uma conta? <a href="../../../index.php" class="text-decoration-none">Faça login</a></p>
      </div>
    </div>
  </div>
  <!-- Link do JavaScript do Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
