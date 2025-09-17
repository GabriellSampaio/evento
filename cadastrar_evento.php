<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Evento</title>
        <!-- Google Font gamer -->
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <!-- Bootstrap (opcional) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="css/cadastrar_evento.css">
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
      <li class="nav-item mx-2"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
    </ul>
  </div>
</nav>

    <div class="container-form">
        <h2>Cadastrar Novo Evento</h2>
        <form action="processa_evento.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="tituloEvento" id="tituloEvento" required placeholder="Digite aqui o titulo do evento...">
            </div>
            <div class="form-group">
                <input type="date" name="dataEvento" id="dataEvento" required >
            </div>
            <div class="form-group">
                <textarea name="descEvento" id="descEvento" rows="4" required placeholder="Digite aqui a descrição do evento..."></textarea>
            </div>
            <div class="form-group">
                <input type="file" name="imgEvento" id="imgEvento" accept="image/*" required>
            </div>
            <button type="submit" class="btn">Cadastrar Evento</button>
      
        </form>

        <?php
        if (isset($_SESSION['msg_sucesso'])) {
            echo "<div class='mensagem sucesso' style='margin-top: 20px;'>{$_SESSION['msg_sucesso']}</div>";
            unset($_SESSION['msg_sucesso']);
        }
        if (isset($_SESSION['msg_erro'])) {
            echo "<div class='mensagem erro' style='margin-top: 20px;'>{$_SESSION['msg_erro']}</div>";
            unset($_SESSION['msg_erro']);
        }
        ?>
    </div>

    <footer class="footer-custom text-center text-lg-start mt-auto">
    <div class="text-center p-3" style="background-color: rgba(70, 70, 70, 0.644);">
      © 2025 Sampaio's Events <a class="text-body"></a>
    </div>
  </footer>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script> 

</html>