<!DOCTYPE html>
<html data-bs-theme="light" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Smiguel-ADM</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&amp;display=swap">
    <link rel="stylesheet" href="assets/css/bs-theme-overrides.css">
    <link rel="stylesheet" href="assets/css/footer/Footer-Dark-icons.css">
    <link rel="stylesheet" href="assets/css/FPE-Gentella-form-elements-custom.css">
    <link rel="stylesheet" href="assets/css/FPE-Gentella-form-elements.css">
    <link rel="stylesheet" href="assets/css/tela-login/Login-with-overlay-image.css">

    <style>
            /* Oculta o botão de voltar ao dashboard ao imprimir */
            @media print {
                .print-hide {
                    display: none !important;
                }
            }
    </style>

</head>

<body>
    <nav>
        <div class="container" style="margin-bottom:50px; margin-top: 20px">
            <img src="../assets/img/Logo_aguia-azul.png" alt="logo" style="width:300px; filter: invert(80%);">
            <h3 style="margin-top: 20px">Transporte Urbano São Miguel de Ilhéus</h3>
        </div>
    </nav>

    <div class="container">
            <?php
// Inicia a sessão
session_start();

$conexao = mysqli_connect("localhost", "u219851065_admin_porto", "Xavier364074$", "u219851065_AguiaAzul");

if (!$conexao) {
    echo "NÃO CONECTADO";
} else {
    echo "<div class='fs-6'>CONECTADO AO BANCO>>>>>>></div>";

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
                    echo "<div class='fs-6'>OCORRÊNCIA CADASTRADA COM SUCESSO!!!</div><br>";

                    // Obtém o ID da última inserção
                    $ultimo_id = mysqli_insert_id($conexao);

                    // Cria o link de download
                    $link_download = "../bkp/_viacaoaguiaazul/videos/{$video_nome}";

                    // Atualiza a coluna "video" com o link de download
                    $update_sql = "UPDATE u219851065_AguiaAzul.ocorrencia_video SET video = '" . $link_download . "' WHERE id = " . $ultimo_id;
                    $update_resultado = mysqli_query($conexao, $update_sql);

                    if ($update_resultado) {
                        echo "<div class='fs-6'>Link para download do vídeo adicionado à tabela no banco de dados.</div><br>";
                        echo "<div class='fs-6'>Vídeo salvo com sucesso!</div>";
                    } else {
                        echo "<div class='fs-6'>ERRO AO ATUALIZAR O LINK DE DOWNLOAD NA TABELA: </div>" . mysqli_error($conexao);
                    }
                } else {
                    echo "<div class='fs-6'>NENHUMA LINHA AFETADA. Verifique se os dados foram inseridos corretamente.</div><br>";
                }
            } else {
                echo "<div class='fs-6'>ERRO AO INSERIR DADOS: </div>" . mysqli_error($conexao);
            }
        } else {
            echo "<div class='fs-6'>ERRO AO MOVER O ARQUIVO DE VÍDEO PARA O DIRETÓRIO DESTINADO.</div>";
        }
    } else {
        echo "<div class='fs-6'>ERRO NO ENVIO DO VÍDEO: </div>" . $_FILES['video']['error'];
    }
}

mysqli_close($conexao);
?>

        <div style="display: flex;">
            <!-- Botão de volta para Deschboard -->
            <div style="margin-top: 20px;" class="print-hide">
                <a href="criar-os-video.php" class="btn btn-primary">Voltar Cadastro</a>
            </div>
        </div>
    </div>
</body>