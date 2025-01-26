<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bootstrap Demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="icon" href="./img/aura.png" />
  <style>
    body {
      background: linear-gradient(45deg,  #d2001a , #7462ff, #f48e21);
      color: #fff;
    }

    .navbar {
      background-color:rgb(19, 19, 19);
      border-bottom: 2px solid #7462ff;
    }

    .navbar-brand img {
      filter: brightness(0.8);
    }

    .nav-link {
      color: #f48e21 ;
      transition: color 0.3s;
    }

    .nav-link:hover {
      color: #7462ff ;
    }

    .card {
      background: linear-gradient(145deg, #1c1c1c, #2b2b2b);
      border: none;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.6);
    }

    .card-title {
      color: #7462ff;
    }

    .pagination .page-link {
      color: #fff;
      background-color: #2b2b2b;
      border: 1px solid #7462ff;
    }

    .pagination .page-link:hover {
      background-color: #7462ff;
      color: #fff;
    }

    footer {
      background: linear-gradient(45deg, #1c1c1c, #2b2b2b);
    }
    footer h5 {
      color: #f48e21;
    }

    footer a {
      color: #7462ff;
      transition: color 0.3s;
    }

    footer a:hover {
      color: #f48e21;
    }
  </style>
</head>
<body>
  <!-- NavBar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="./img/aura.png" alt="logo" width="80" />
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
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Conteúdo -->
  <div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="card">
          <!-- Início do carousel -->
          <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <a href="#">
              <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="1800">
                  <img src="./contents/shutterstock_488013904-857x482.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="1800">
                  <img src="./contents/Lamborghini_Sián_IAA_2019_JM_1094.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="1800">
                  <img src="./contents/911-Carrera_coupe.webp" class="d-block w-100" alt="...">
                </div>
              </div>
            </a>
          </div>
          <!-- Fim do carousel -->
          <div class="card-body">
            <h5 class="card-title">Título do Card</h5>
            <p class="card-text">Este é um exemplo de card com imagens rotativas e informações de texto abaixo.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Paginação -->
  <div class="container mt-5">
    <nav aria-label="Page navigation">
      <ul class="pagination d-flex justify-content-center">
        <li class="page-item disabled">
          <a class="page-link">Anterior</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active" aria-current="page">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Próximo</a>
        </li>
      </ul>
    </nav>
  </div>

  <!-- Footer -->
  <footer class="pt-auto  ">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-3 mb-3 text-center text-md-start">
          <img src="./img/auradevs.png" alt="Logo" class="img-fluid rounded">
        </div>
        <div class="col-md-3 mb-3">
          <h5>Sobre nós</h5>
          <p>Fornecemos serviços de alta qualidade e soluções inovadoras. Entre em contato para saber mais!</p>
        </div>
        <div class="col-md-3 mb-3">
          <h5>Links rápidos</h5>
          <ul class="list-unstyled">
            <li><a href="#">Início</a></li>
            <li><a href="#">Serviços</a></li>
            <li><a href="#">Contato</a></li>
            <li><a href="#">Sobre</a></li>
          </ul>
        </div>
        <div class="col-md-3 mb-3">
          <h5>Contato</h5>
          <p>
            Rua Exemplo, 123<br>
            (11) 1234-5678<br>
            contato@exemplo.com
          </p>
        </div>
      </div>
      <div class="text-center pt-3">
        <p>&copy; 2025 - Todos os direitos reservados.</p>
      </div>
    </div>
  </footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
