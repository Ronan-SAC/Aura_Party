<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="icon" href="./img/aura.png">
  </head>

  <body>
    <!--NavBar-->

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"
          ><img src="./img/aura.png" alt="logo" width="80"
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
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!--Conteudo-->

    <div class="card mb-3" style="max-width:601px; max-height:352px;">
    <div class="row g-0">
        <div class="col-md-4">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
           <a href="https://www.youtube.com/watch?v=uK2Gm9RzZfc"> <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="1800">
              <img src="./img/aura.png" class="d-block w-100" alt="..."> 
              </div>
              <div class="carousel-item" data-bs-interval="1800">
                <img src="./img/auradevs.png" class="d-block w-100" alt="..."> 
              </div>
              <div class="carousel-item" data-bs-interval="1800">
               <img src="" class="d-block w-100" alt="..."> 
              </div>
            </div> </a>
          </div>  
        </div>
        <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
        </div>
        </div>
    </div>
    </div>

    <!--Footer -->
    <footer class="bg-dark text-white pt-4">
        <div class="container">
            <div class="row align-items-center">
                <!-- Espaço para a imagem -->
                <div class="col-md-3 mb-3 text-center text-md-start">
                    <img src="./img/auradevs.png" alt="Logo ou Imagem" class="img-fluid rounded">
                </div>

                <!-- Sobre nós -->
                <div class="col-md-3 mb-3">
                    <h5>Sobre nós</h5>
                    <p>
                        Somos uma empresa dedicada a fornecer serviços de alta qualidade e soluções inovadoras. 
                        Entre em contato para saber mais!
                    </p>
                </div>

                <!-- Links rápidos -->
                <div class="col-md-3 mb-3">
                    <h5>Links rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Início</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Serviços</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Contato</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Sobre</a></li>
                    </ul>
                </div>

                <!-- Contato -->
                <div class="col-md-3 mb-3">
                    <h5>Contato</h5>
                    <p>
                        <i class="bi bi-geo-alt-fill me-2"></i>Rua Exemplo, 123<br>
                        <i class="bi bi-telephone-fill me-2"></i>(11) 1234-5678<br>
                        <i class="bi bi-envelope-fill me-2"></i>contato@exemplo.com
                    </p>
                </div>
            </div>

            <div class="text-center pt-3">
                <p class="mb-0">&copy; 2025 - Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>