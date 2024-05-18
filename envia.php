<?php
// Inicia a sessão
session_start();

$conexao = mysqli_connect("localhost", "u219851065_admin_porto", "Xavier364074$", "u219851065_AguiaAzul");

if (!$conexao) {
    echo "NÃO CONECTADO";
} else {
    echo "CONECTADO AO BANCO>>>>>>>>>";

    $data = mysqli_real_escape_string($conexao, $_POST['data']);
    $horario = mysqli_real_escape_string($conexao, $_POST['horario']);
    $motorista = mysqli_real_escape_string($conexao, $_POST['motorista']);
    $linha = mysqli_real_escape_string($conexao, $_POST['linha']);
    $carro = mysqli_real_escape_string($conexao, $_POST['carro']);
    $fiscal = mysqli_real_escape_string($conexao, $_POST['fiscal']);
    $ocorrencia = mysqli_real_escape_string($conexao, $_POST['ocorrencia']);
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);

    // Verifica se o arquivo foi enviado com sucesso
    if ($_FILES['video']['error'] === UPLOAD_ERR_OK) {
        $video_temp = $_FILES['video']['tmp_name'];
        $video_nome = mysqli_real_escape_string($conexao, $_FILES['video']['name']);

        // Define o caminho para salvar o vídeo
        $caminho_video = "../bkp/_viacaoaguiaazul/videos/{$video_nome}";

        // Move o arquivo temporário para o local desejado
        if (move_uploaded_file($video_temp, $caminho_video)) {

            // Insere apenas o nome do arquivo no banco de dados
            $sql = "INSERT INTO u219851065_AguiaAzul.ocorrencia_video(data, horario, motorista, linha, carro, fiscal, ocorrencia, descricao, video) VALUES ('$data', '$horario', '$motorista', '$linha', '$carro', '$fiscal', '$ocorrencia', '$descricao', '$video_nome')";
            $resultado = mysqli_query($conexao, $sql);

            if ($resultado) {
                $linhas_afetadas = mysqli_affected_rows($conexao);

                if ($linhas_afetadas > 0) {
                    echo "OCORRÊNCIA CADASTRADA COM SUCESSO!<br>";

                    // Obtém o ID da última inserção
                    $ultimo_id = mysqli_insert_id($conexao);

                    // Cria o link de download
                    $link_download = "../bkp/_viacaoaguiaazul/videos/{$video_nome}";

                    // Atualiza a coluna "video" com o link de download
                    $update_sql = "UPDATE u219851065_AguiaAzul.ocorrencia_video SET video = '" . $link_download . "' WHERE id = " . $ultimo_id;
                    $update_resultado = mysqli_query($conexao, $update_sql);

                    if ($update_resultado) {
                        echo "Link para download do vídeo adicionado à tabela no banco de dados.<br>";
                        echo "Vídeo salvo com sucesso!";
                    } else {
                        echo "ERRO AO ATUALIZAR O LINK DE DOWNLOAD NA TABELA: " . mysqli_error($conexao);
                    }

                    echo "<a href='criar-os-video.php'>VOLTAR</a>";
                } else {
                    echo "NENHUMA LINHA AFETADA. Verifique se os dados foram inseridos corretamente.<br>";
                }
            } else {
                echo "ERRO AO INSERIR DADOS: " . mysqli_error($conexao);
            }
        } else {
            echo "ERRO AO MOVER O ARQUIVO DE VÍDEO PARA O DIRETÓRIO DESTINADO.";
        }
    } else {
        echo "ERRO NO ENVIO DO VÍDEO: " . $_FILES['video']['error'];
    }
}

mysqli_close($conexao);
?>