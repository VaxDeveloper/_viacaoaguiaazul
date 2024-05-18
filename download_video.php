<?php
// Inicia a sessão
session_start();

if (isset($_GET['video'])) {
    $video_id = $_GET['video'];

    // Consulta para obter o caminho do vídeo pelo ID
    $conexao = mysqli_connect("localhost", "u219851065_admin_porto", "Xavier364074$", "u219851065_AguiaAzul");
    $consulta_sql = "SELECT video FROM u219851065_AguiaAzul.ocorrencia_video WHERE id = $video_id";
    $resultado_consulta = mysqli_query($conexao, $consulta_sql);

    if ($resultado_consulta) {
        $linha = mysqli_fetch_assoc($resultado_consulta);
        $video_path = $linha['video'];

        // Verifica se o arquivo existe antes de iniciar o download
        if (file_exists($video_path)) {
            // Defina os cabeçalhos para indicar que é um arquivo de vídeo
            header('Content-Type: video/mp4');
            header('Content-Disposition: attachment; filename="' . basename($video_path) . '"');
            header('Content-Length: ' . filesize($video_path));

            // Saída do conteúdo do arquivo
            readfile($video_path);
            exit;
        } else {
            echo "Arquivo não encontrado";
        }
    } else {
        echo "Erro na consulta: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
}
?>