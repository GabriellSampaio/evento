<?php
session_start(); // Inicia a sessão para controlar login e dados do usuário
include 'conexao.php'; // Inclui o arquivo de conexão com o banco de dados

// Verifica se o usuário está logado, caso contrário redireciona para a página de login
if (!isset($_SESSION['email'])) {
    header('Location: dashboard.php'); // Redireciona para login
    exit(); // Para a execução do script
}

$emailUsuario = $_SESSION['email']; // Armazena o usuário logado na variável
$mensagem = ''; // Inicializa variável para mensagem de feedback
$tipo = ''; // Inicializa variável para tipo da mensagem ('sucesso' ou 'erro')

// Verifica se o ID do evento foi enviado via POST (formulário)
if (isset($_POST['idEvento'])) {
    $idEvento = $_POST['idEvento']; // Recebe o ID do evento enviado

    // Prepara a consulta para verificar se o evento pertence ao usuário logado
    $stmt = $con->prepare("SELECT idUsuario, imgEvento FROM tbeventos WHERE idEvento = ?");
    $stmt->execute([$idEvento]); // Executa a consulta para verificar o evento
    $evento = $stmt->fetch(); // Busca o evento no banco

    if ($evento) { // Se o evento existe
        // Verifica se o evento pertence ao usuário logado
        $stmtUsuario = $con->prepare("SELECT idUsuario FROM tbUsuario WHERE emailUsuario = ?");
        $stmtUsuario->execute([$emailUsuario]);
        $usuario = $stmtUsuario->fetch();

        if ($usuario && $evento['idUsuario'] == $usuario['idUsuario']) { // Se o evento pertence ao usuário logado
            // Verifica se há uma imagem associada e se o arquivo existe no servidor
            if (!empty($evento['imgEvento']) && file_exists('uploads/' . $evento['imgEvento'])) {
                unlink('uploads/' . $evento['imgEvento']); // Apaga o arquivo da imagem do evento
            }

            // Prepara a consulta para excluir o evento do banco
            $stmtExcluir = $con->prepare("DELETE FROM tbeventos WHERE idEvento = ? AND idUsuario = ?");
            $stmtExcluir->execute([$idEvento, $usuario['idUsuario']]); // Executa a exclusão

            $mensagem = "Evento excluído com sucesso!"; // Mensagem de sucesso
            $tipo = 'sucesso'; // Define o tipo como sucesso
        } else { // Caso o evento não pertença ao usuário
            $mensagem = "Você não tem permissão para excluir este evento."; // Mensagem de erro
            $tipo = 'erro'; // Define o tipo como erro
        }
    } else { // Caso o evento não exista
        $mensagem = "Evento não encontrado."; // Mensagem de erro
        $tipo = 'erro'; // Define o tipo como erro
    }
} else { // Se não foi enviado o ID do evento
    $mensagem = "ID do evento não fornecido."; // Mensagem de erro
    $tipo = 'erro'; // Define o tipo como erro
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8"> <!-- Define a codificação de caracteres da página -->
    <title>Excluir Evento</title> <!-- Título da aba do navegador -->
    <link rel="stylesheet" href="css/excluir_evento.css"> <!-- Link para o CSS externo que estiliza essa página -->
    <meta http-equiv="refresh" content="3;url=listar_evento.php"> <!-- Redireciona automaticamente para listar eventos após 3 segundos -->
</head>

<body>
    <div class="excluir-container">
        <div class="excluir-card <?= $tipo ?>">
            <h2><?= $mensagem ?></h2>
            <p>Redirecionando para a listagem de eventos...</p>
        </div>
    </div>
</body>

</html>