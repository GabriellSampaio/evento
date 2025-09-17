<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <!-- Google Font gamer -->
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <!-- Bootstrap (opcional) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="stylesheet" href="css/home.css">
</head>

<body>

  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="home.php">
        <img src="img/logoupp.png" alt="Logo" width="60" height="60">
      </a>
      <ul class="navbar-nav flex-row ms-auto">
        <li class="nav-item mx-2"><a class="nav-link" href="home.php">Home</a></li>
        <li class="nav-item mx-2"><a class="nav-link" href="galeria.php">Galeria</a></li>
        <li class="nav-item mx-2"><a class="nav-link" href="contato.php">Fale Conosco</a></li>
        
        <li class="nav-item mx-2"><a class="nav-link" href="cadastro.php">Cadastrar</a></li>
        <li class="nav-item mx-2"><a class="nav-link" href="login.php">Login</a></li>
      </ul>
    </div>
  </nav>

  <div class="pai">
    <div class="carousel">
  <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./img/eventMB.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./img/eventBGS.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./img/eventGame.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <div>
        
      </div>

    </div>

    <div class="carousells">
      <div class="imgCarou">
        <img src="./img/eventNaruto.png" alt="">
        <img src="./img/eventMario.avif" alt="">
      </div>
      <div class="imgCarou">
        <img src="./img/eventRoblox.webp" alt="">
        <img src="./img/eventPubg.jpg" alt="">
      </div>

    </div>
  </div>

    <!-- Sobre a empresa -->
  <div class="sobre-section text-center text-light mt-5 px-4">
    <h2 class="titulo-explicativo">Sobre a Sampaio's Events</h2>
    <p>
      A Sampaio's Events é líder na organização de eventos para jogos mobile no Brasil.
      Com ampla experiência no mercado gamer, nosso foco é proporcionar experiências únicas que conectam
      jogadores, fãs e empresas.
    </p>
    <p>
      Apoiamos desenvolvedores locais e fomentamos a cena gamer nacional, acreditando no poder do jogo para unir
      pessoas
      e transformar vidas.
    </p>
  </div>

  <div class="container explicativa-section text-light my-5">
    <div class="row g-5">

      <div class="col-md-5 bloco-explicativo">
        <img src="./img/jogosMobile.jpg" alt="Jogos Mobile" class="img-fluid mb-3 ilustracao-explicativa">
        <h3 class="titulo-explicativo">O Universo dos Jogos Mobile</h3>
        <p>
          Os jogos mobile conquistaram o mundo, oferecendo entretenimento de qualidade na palma da sua mão.
          Nossa empresa celebra essa revolução, trazendo eventos que conectam fãs e atletas digitais de todas as
          idades.
        </p>
      </div>

      <div class="col-md-5 bloco-explicativo">
        <img src="./img/competicao.jpg" alt="Esports" class="img-fluid mb-3 ilustracao-explicativa">
        <h3 class="titulo-explicativo">Competições e Esports</h3>
        <p>
          Organizamos torneios e campeonatos com estrutura profissional, desde pequenas competições online até eventos
          presenciais.
          Incentivamos o crescimento dos esports no Brasil, promovendo jogadores e times emergentes.
        </p>
      </div>

      <div class="col-md-5 bloco-explicativo">
        <img src="./img/comunidade.png" alt="Comunidade" class="img-fluid mb-3 ilustracao-explicativa">
        <h3 class="titulo-explicativo">Comunidade e Networking</h3>
        <p>
          Criamos ambientes seguros e inclusivos para que jogadores possam se conhecer, trocar dicas e formar equipes.
          Nosso compromisso é fortalecer a comunidade gamer mobile, unindo paixão e competitividade.
        </p>
      </div>

      <div class="col-md-5 bloco-explicativo">
        <img src="./img/premio.webp" alt="Prêmios" class="img-fluid mb-3 ilustracao-explicativa">
        <h3 class="titulo-explicativo">Prêmios e Reconhecimento</h3>
        <p>
          Nossos eventos oferecem prêmios atrativos, reconhecimento para os melhores e oportunidades de crescimento
          na carreira de jogadores profissionais de mobile games.
        </p>
      </div>

    </div>
  </div>

  <footer class="footer-custom text-center text-lg-start mt-auto">
    <div class="text-center p-3" style="background-color: rgba(70, 70, 70, 0.644);">
      © 2025 Sampaio's Events <a class="text-body"></a>
    </div>
  </footer>

  <!-- Scripts Bootstrap (opcional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>
  <!-- Seu JS de validação -->
  <script src="js/valida.js"></script>
</body>

</html>