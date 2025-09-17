<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['email'])) {
  header('Location: login.php');
  exit();
}

$nick = $_SESSION['nome'];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <!-- Google Font gamer -->
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <!-- Bootstrap (opcional) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="home.php">
        <img src="img/logoupp.png" alt="Logo" width="60" height="60">
      </a>
      <ul class="navbar-nav flex-row ms-auto">
        <li class="nav-item mx-2"><a class="nav-link" href="home.php">Home</a></li>
        <li class="nav-item mx-2"><a class="nav-link" href="contato.php">Fale Conosco</a></li>
        <li class="nav-item mx-2"><a class="nav-link" href="galeria.php">Galeria</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <h2>Bem-vindo, <?php echo htmlspecialchars($nick); ?>!</h2>

    <div class="botoes">
      <a href="cadastrar_evento.php" class="botao">Cadastrar Evento</a>
      <a href="listar_evento.php" class="botao">Listar Eventos</a>
      <a href="home.php" class="botao sair">Sair</a>
    </div>
  </div>

  <footer class="footer-custom text-center text-lg-start mt-auto">
    <div class="text-center p-3" style="background-color: rgba(70, 70, 70, 0.644);">
      © 2025 Sampaio's Events <a class="text-body"></a>
    </div>
  </footer>


</body>
  <!-- Scripts Bootstrap (opcional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>

</html>