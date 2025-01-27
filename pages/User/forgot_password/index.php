<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Esqueci Minha Senha</title>
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

    .confirmation-card {
      background: linear-gradient(145deg, #2b2b2b, #1c1c1c);
      color: #fff;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.6);
      padding: 20px;
      text-align: center;
      animation: fadeIn 1s ease-in-out;
    }
  </style>
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center vh-100 fade-in">
    <div class="card p-4 animate__animated animate__fadeInDown" style="width: 100%; max-width: 400px;">
      <h2 class="text-center mb-4">Esqueci Minha Senha</h2>
      <form id="forgotPasswordForm">
        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" class="form-control" id="email" placeholder="Digite seu e-mail" required>
        </div>
        <div class="mb-3">
          <label for="cpf" class="form-label">CPF</label>
          <input type="text" class="form-control" id="cpf" placeholder="Digite seu CPF" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Enviar</button>
      </form>
      <div id="confirmationMessage" class="mt-3" style="display: none;">
        <div class="confirmation-card">
          <p>Um e-mail foi enviado para redefinir sua senha.</p>
          <p>Você será redirecionado para a tela de login em breve...</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Link do JavaScript do Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('forgotPasswordForm').addEventListener('submit', function(event) {
      event.preventDefault(); // Impede o envio padrão do formulário

      // Exibe o card de confirmação
      document.getElementById('confirmationMessage').style.display = 'block';

      
      setTimeout(function() {
        window.location.href = "../../../index.php"; 
      }, 5000);
    });
  </script>
</body>
</html>

