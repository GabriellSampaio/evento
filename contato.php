<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Google Font gamer -->
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <!-- Bootstrap (opcional) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="stylesheet" href="css/contato.css">
  <title>Document</title>
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

<div class="formulario-container">
  <h1 class="formulario-titulo">Fale Conosco</h1>

  <form id="form-contato">

    <div class="formulario-campo">
      <label for="nome">Nome</label>
      <input type="text" id="nome" name="nome" placeholder="Seu nome completo" required>
    </div>

    <div class="formulario-campo">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="email@exemplo.com" required>
    </div>

    <div class="formulario-campo">
      <label for="assunto">Assunto</label>
      <input type="text" id="assunto" name="assunto" placeholder="Motivo do contato" required>
    </div>

    <div class="formulario-campo">
      <label for="mensagem">Mensagem</label>
      <textarea id="mensagem" name="mensagem" rows="5" placeholder="Escreva sua mensagem aqui..." required></textarea>
    </div>

    <button type="submit" class="botao-enviar">Enviar Mensagem</button>
  </form>
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