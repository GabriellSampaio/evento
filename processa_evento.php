<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['idUsuario'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['imgEvento']) && $_FILES['imgEvento']['error'] == 0) {

    $titulo = $_POST['tituloEvento'];
    $data_evento = $_POST['dataEvento'];
    $descricao = $_POST['descEvento'];

    $imagem = $_FILES['imgEvento'];
    $nome_img = $imagem['name'];
    $temp_img = $imagem['tmp_name'];

    $extensao = strtolower(pathinfo($nome_img, PATHINFO_EXTENSION));
    $permitidas = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($extensao, $permitidas)) {
        $_SESSION['msg_erro'] = "Erro: Formato de imagem inválido.";
        header('Location: cadastrar_evento.php');
        exit();
    }

    $pasta = 'uploads/';
    $contador = 1;

    $arquivos = glob($pasta . "evento*.*");
    $numeros_existentes = [];

    foreach ($arquivos as $arquivo) {
        if (preg_match('/evento(\d+)\./', basename($arquivo), $matches)) {
            $numeros_existentes[] = (int)$matches[1];
        }
    }

    if (!empty($numeros_existentes)) {
        $contador = max($numeros_existentes) + 1;
    }

    $nome_final = "evento" . $contador . "." . $extensao;
    $caminho_final = $pasta . $nome_final;

    if (move_uploaded_file($temp_img, $caminho_final)) {
        try {
            $stmt = $con->prepare("INSERT INTO tbEventos (tituloEvento, dataEvento, descEvento, imgEvento, idUsuario) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$titulo, $data_evento, $descricao, $nome_final, $_SESSION['idUsuario']]);

            ?>

            <!DOCTYPE html>
            <html lang="pt-BR">
            <head>
                <meta charset="UTF-8">
                <title>Evento Cadastrado</title>
                <link rel="stylesheet" href="css/processa_evento.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            </head>
            <body>
                <div class="container">
                    <h1>Evento cadastrado com sucesso!</h1>
                    <p>Seu evento foi registrado com sucesso. Agora, o que deseja fazer?</p>
                    
                    <div class="question">
                        <p>Escolha uma das opções abaixo:</p>
                    </div>

                    <div class="actions">
                        <a href="cadastrar_evento.php">
                            <i class="fas fa-plus-circle"></i> Adicionar novo evento
                        </a>
                        <a href="dashboard.php">
                            <i class="fas fa-tachometer-alt"></i> Ir para o dashboard
                        </a>
                    </div>
                </div>
            </body>
            </html>

            <?php
        } catch (PDOException $e) {
            $_SESSION['msg_erro'] = "Erro ao cadastrar evento: " . $e->getMessage();
            header('Location: cadastrar_evento.php');
            exit();
        }
    } else {
        $_SESSION['msg_erro'] = "Erro ao fazer upload da imagem.";
        header('Location: cadastrar_evento.php');
        exit();
    }
} else {
    $_SESSION['msg_erro'] = "Envie todos os campos e uma imagem válida.";
    header('Location: cadastrar_evento.php');
    exit();
}
