<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['email'])) {
  header('Location: login.php');
  exit();
}

$emailUsuario = $_SESSION['email'];

// Primeiro, pegar o idUsuario do usuário logado
$stmt = $con->prepare("SELECT idUsuario FROM tbUsuario WHERE emailUsuario = ?");
$stmt->execute([$emailUsuario]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
  echo "Usuário não encontrado.";
  exit();
}

// Agora buscar os eventos do usuário pelo idUsuario
$stmt = $con->prepare("SELECT * FROM tbeventos WHERE idUsuario = ?");
$stmt->execute([$usuario['idUsuario']]);
$eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Meus Eventos</title>

  <!-- Google Font gamer -->
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <!-- Bootstrap (opcional) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="stylesheet" href="css/listar_evento.css">
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

  <div class="container">
    <h2>Meus Eventos</h2>
    <?php if (count($eventos) > 0): ?>
      <div class="cards-container">
        <?php foreach ($eventos as $evento): ?>

          <div class="card">
            <img src="uploads/<?= htmlspecialchars($evento['imgEvento']) ?>" alt="Imagem do Evento" class="card-img">
            <div class="card-content">
              <h3><?= htmlspecialchars($evento['tituloEvento']) ?></h3>
              <p><strong>Data:</strong> <?= date('d-m-Y', strtotime($evento['dataEvento'])) ?></p>
              <p><?= htmlspecialchars($evento['descEvento']) ?></p>
            </div>
            <div class="btn-group">
              <a href="atualizar_evento.php?id=<?= $evento['idEvento'] ?>" class="btn-edit">Editar</a>
              <form method="POST" action="excluir_evento.php" class="form-excluir">
                <input type="hidden" name="idEvento" value="<?= $evento['idEvento'] ?>" />
                <button type="submit" class="btn-delete">Excluir</button>
              </form>
            </div>
          </div>

        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <p>Você ainda não cadastrou nenhum evento.</p>
    <?php endif; ?>
  </div>

  <footer class="footer-custom text-center text-lg-start mt-auto">
    <div class="text-center p-3" style="background-color: rgba(70, 70, 70, 0.644);">
      © 2025 Sampaio's Events
    </div>
  </footer>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
  crossorigin="anonymous"></script>

</html>