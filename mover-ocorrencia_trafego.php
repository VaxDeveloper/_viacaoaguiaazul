<?php
session_start();

// Verifica se o usuário está logado e tem permissão (status 1 ou 10)
if (!isset($_SESSION['user']) || ($_SESSION['status'] != 1 && $_SESSION['status'] != 10)) {
    // Se não estiver logado ou não tiver permissão, redireciona para a página de login
    header("Location: index.php");
    exit();
}

// Verifica se o ID da ocorrência foi enviado
if (isset($_POST['ocorrencia_id'])) {
    $ocorrencia_id = $_POST['ocorrencia_id'];

    // Conectar ao banco de dados
    $conexao = mysqli_connect("localhost", "u219851065_admin_porto", "Xavier364074$", "u219851065_AguiaAzul");

    // Verifica se a conexão foi bem sucedida
    if (!$conexao) {
        echo "Erro ao conectar ao banco de dados.";
        exit();
    }

    // Query para mover a ocorrência para outra tabela
    $query_move_ocorrencia = "INSERT INTO u219851065_AguiaAzul.ocorrencia_trafego SELECT * FROM u219851065_AguiaAzul.ocorrencia_video WHERE id = $ocorrencia_id";

    // Executa a query
    $resultado_move = mysqli_query($conexao, $query_move_ocorrencia);

    if ($resultado_move) {
        // Se o movimento foi bem-sucedido, exclua a ocorrência da tabela original
        $query_excluir_ocorrencia = "DELETE FROM u219851065_AguiaAzul.ocorrencia_video WHERE id = $ocorrencia_id";
        $resultado_excluir = mysqli_query($conexao, $query_excluir_ocorrencia);

        if ($resultado_excluir) {
            echo "CONECTADO AO BANCO>>>>>>>>> <br>";
            echo "Ocorrência enviada com sucesso!!! <br>";
        }else {
            echo "Erro ao excluir ocorrência da tabela original.";
        }
    } else {
        echo "Erro ao mover ocorrência para outra tabela.";
    }

    // Fechar conexão
    mysqli_close($conexao);
} else {
    echo "ID da ocorrência não fornecido.";
}
?>
<!-- Botão de volta para Deschboard -->
<div style="margin-top: 20px;">
    <a href="deshboard-video.php" class="btn btn-primary">Voltar para Deschboard</a>
</div>
