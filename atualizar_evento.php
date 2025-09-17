<?php
session_start();
include 'conexao.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['idUsuario'])) {
    header('Location: login.php');
    exit();
}

// Verifica se o ID do evento foi passado
if (!isset($_GET['id'])) {
    echo "ID do evento não fornecido.";
    exit;
}

$id = $_GET['id'];
$idUsuario = $_SESSION['idUsuario'];

$mensagem_sucesso = '';

// Buscar evento atual
$stmt = $con->prepare("SELECT * FROM tbeventos WHERE idEvento = ? AND idUsuario = ?");
$stmt->execute([$id, $idUsuario]);
$evento = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$evento) {
    echo "Evento não encontrado ou você não tem permissão para editá-lo.";
    exit;
}

// Atualizar evento
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $data_evento = $_POST['data_evento'];
    $descricao = $_POST['descricao'];
    $imagem_atual = $evento['imgEvento'];

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
        $extensoes_permitidas = ['jpg', 'jpeg', 'png', 'gif'];
        $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));

        if (!in_array($extensao, $extensoes_permitidas)) {
            echo "Tipo de arquivo inválido.";
            exit;
        }

        $novo_nome = uniqid('img_') . '.' . $extensao;
        $caminho = 'uploads/' . $novo_nome;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho)) {
            if (!empty($imagem_atual) && file_exists('uploads/' . $imagem_atual)) {
                unlink('uploads/' . $imagem_atual);
            }
            $imagem_final = $novo_nome;
        } else {
            echo "Erro ao fazer upload da nova imagem.";
            exit;
        }
    } else {
        $imagem_final = $imagem_atual;
    }

    $stmt = $con->prepare("UPDATE tbeventos SET tituloEvento = ?, dataEvento = ?, descEvento = ?, imgEvento = ? WHERE idEvento = ? AND idUsuario = ?");
    $stmt->execute([$titulo, $data_evento, $descricao, $imagem_final, $id, $idUsuario]);

    $mensagem_sucesso = "Evento atualizado com sucesso!";

    // Atualiza os dados do evento para exibir no formulário
    $stmt = $con->prepare("SELECT * FROM tbeventos WHERE idEvento = ? AND idUsuario = ?");
    $stmt->execute([$id, $idUsuario]);
    $evento = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Atualizar Evento</title>
  <link rel="stylesheet" href="css/atualizar_evento.css">
  <?php if ($mensagem_sucesso): ?>
  <script>
    // Redireciona após 3 segundos
    setTimeout(() => {
      window.location.href = 'dashboard.php';
    }, 3000);
  </script>
  <?php endif; ?>
</head>
<body>
  <div class="container">
    <h2>Atualizar Evento</h2>

    <?php if ($mensagem_sucesso): ?>
      <div class="mensagem-sucesso"><?= htmlspecialchars($mensagem_sucesso) ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
      <label for="titulo">Título:</label>
      <input type="text" name="titulo" value="<?= htmlspecialchars($evento['tituloEvento']) ?>" required>

      <label for="data_evento">Data:</label>
      <input type="date" name="data_evento" value="<?= $evento['dataEvento'] ?>" required>

      <label for="descricao">Descrição:</label>
      <textarea name="descricao" required><?= htmlspecialchars($evento['descEvento']) ?></textarea>

      <label>Imagem atual:</label><br>
      <img src="uploads/<?= htmlspecialchars($evento['imgEvento']) ?>" alt="Imagem atual" style="max-width: 200px;"><br><br>

      <label for="imagem">Escolher nova imagem (opcional):</label>
      <input type="file" name="imagem" accept="image/*" id="imagem">

      <button type="submit" class="btn-salvar">Salvar Alterações</button>
    </form>
  </div>
</body>
</html>
