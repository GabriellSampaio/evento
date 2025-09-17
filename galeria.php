<?php
include 'conexao.php';

$stmt = $con->prepare("SELECT * FROM tbeventos ORDER BY dataEvento DESC");
$stmt->execute();
$eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galeria de Eventos</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

  <!-- Google Font gamer -->
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

  <!-- Seu CSS -->
  <link rel="stylesheet" href="css/galeria.css">
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

  <div class="container mt-5 pt-5">
    <div class="row g-4">
    <div class="text-center mb-4">
      <h1 class="titulo">GALERIA DE EVENTOS</h1>
    </div>

    <?php if (count($eventos) > 0): ?>
      
        <?php foreach ($eventos as $evento): ?>
          <div class="col-md-4">
            <div class="card h-100">
              <img src="uploads/<?= htmlspecialchars($evento['imgEvento']) ?>" class="card-img-top" alt="Imagem do evento">
              <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($evento['tituloEvento']) ?></h5>
                <p class="card-text"><strong>Data:</strong> <?= date('d/m/Y', strtotime($evento['dataEvento'])) ?></p>
                <p class="card-text"><?= nl2br(htmlspecialchars($evento['descEvento'])) ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="alert alert-warning text-center" role="alert">
        Nenhum evento encontrado.
      </div>
    <?php endif; ?>
  </div>

  <footer class="footer-custom text-center text-lg-start mt-5">
    <div class="text-center p-3" style="background-color: rgba(70, 70, 70, 0.644);">
      © 2025 Sampaio's Events
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>
  <script src="js/valida.js"></script>
</body>

</html>