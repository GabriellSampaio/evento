<?php
include './script/conexao1.php';

$mensagem = '';
$classe = 'mensagem';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nick = trim($_POST['nome']);
  $usuario = trim($_POST['email']);
  $senha = trim($_POST['senha']);

  if (empty($usuario) || empty($senha)) {
    $mensagem = "Preencha todos os campos.";
    $classe = 'mensagem erro';
  } else {
    $sql = "SELECT COUNT(*) FROM tbUsuario WHERE emailUsuario = ?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$usuario]);

    if ($stmt->fetchColumn() > 0) {
      $mensagem = "Usuário já existe. Escolha outro login.";
      $classe = 'mensagem erro';
    } else {
      $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
      $sql = "INSERT INTO tbUsuario (nomeUsuario, emailUsuario, senhaUsuario) VALUES (?, ?, ?)";
      $stmt = $con->prepare($sql);
      if ($stmt->execute([$nick, $usuario, $senha_hash])) {
        $mensagem = "Cadastro realizado com sucesso! Você será redirecionado para o login...";
        // redirecionar depois
        $redirect = "login.php";
      } else {
        $mensagem = "Erro ao cadastrar usuário.";
        $classe = 'mensagem erro';
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tela de Cadastro</title>

  <!-- Google Font gamer -->
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

  <!-- Bootstrap (opcional) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="stylesheet" href="css/cadastro.css">

  <?php if (!empty($redirect)): ?>
    <script>
      setTimeout(() => {
        window.location.href = "<?php echo $redirect; ?>";
      }, 3000);
    </script>
  <?php endif; ?>
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
    <div class="fundo"></div>
    <div class="container-login">

      <h1>CADASTRE-SE</h1>

      <?php if (!empty($mensagem)): ?>
        <div class="<?php echo $classe; ?>">
          <?php echo $mensagem; ?>
        </div>
      <?php endif; ?>

      <?php if (empty($redirect)): ?>
        <form method="POST" action="">
          <div class="labeltext">
            <input type="text" id="nome_id" name="nome" placeholder="Digite aqui seu nome...">
          </div>
          <div class="labeltext">
            <input type="email" id="email_id" name="email" placeholder="Digite aqui seu email...">
          </div>
          <div class="labeltext">
            <input type="password" id="senha_id" name="senha" placeholder="Digite aqui sua senha...">
          </div>
          <input type="submit" value="Enviar">
        </form>
      <?php endif; ?>

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