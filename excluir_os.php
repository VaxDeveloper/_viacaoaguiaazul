<?php
// Conectar ao banco de dados
$conexao = mysqli_connect("localhost", "u219851065_admin_porto", "Xavier364074$", "u219851065_AguiaAzul");

// Verificar se o ID do vídeo foi fornecido na URL
if(isset($_GET['id'])) {
    // Obter o ID do vídeo da URL
    $id = $_GET['id'];

    // Consultar o banco de dados para obter o nome do arquivo do vídeo com base no ID
    $consulta_sql = "SELECT video FROM ocorrencia_video WHERE id = $id";
    $resultado_consulta = mysqli_query($conexao, $consulta_sql);

    // Verificar se a consulta foi bem-sucedida
    if($resultado_consulta) {
        // Obter o nome do arquivo do resultado da consulta
        $linha = mysqli_fetch_assoc($resultado_consulta);
        $nome_arquivo = $linha['video'];

        // Construir o caminho completo do arquivo (removendo "videos/")
        $caminho_arquivo = $nome_arquivo;

        // Verificar se o arquivo existe
        if(file_exists($caminho_arquivo)) {
            // Excluir o arquivo
            if(unlink($caminho_arquivo)) {
                // Se o arquivo for excluído com sucesso, exclua também a entrada no banco de dados
                $sql_excluir = "DELETE FROM ocorrencia_video WHERE id = $id";
                if(mysqli_query($conexao, $sql_excluir)) {
                    echo "Vídeo excluído com sucesso.";
                } else {
                    echo "Erro ao excluir o vídeo do banco de dados: " . mysqli_error($conexao);
                }
            } else {
                echo "Erro ao excluir o arquivo de vídeo.";
            }
        } else {
            echo "O arquivo de vídeo não existe.";
        }
    } else {
        echo "Erro ao consultar o banco de dados: " . mysqli_error($conexao);
    }
} else {
    echo "ID do vídeo não fornecido na URL.";
}

// Fechar a conexão com o banco de dados
mysqli_close($conexao);
?>

<!-- Botão de volta para Deschboard -->
<div style="margin-top: 20px;">
    <a href="deshboard-video.php" class="btn btn-primary">Voltar para Deschboard</a>
</div>