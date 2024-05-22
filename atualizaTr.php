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
            <img src="assets/img/Logo_aguia-azul.png" alt="logo" style="width:300px; filter: invert(80%);">
            <h3 style="margin-top: 20px">Viação Águia Azul</h3>
        </div>
    </nav>

    <div class="container">
<?php
session_start();

// Verifica se o usuário está logado e tem permissão (status 1 ou 10)
if (!isset($_SESSION['user']) || ($_SESSION['status'] != 2 && $_SESSION['status'] != 10 && $_SESSION['status'] != 11)) {
    // Se não estiver logado ou não tiver permissão, redireciona para a página de login
    header("Location: index.php");
    exit();
}

// Verifica se os dados foram enviados via método POST e se os campos necessários estão definidos
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_ocorrencia"]) && isset($_POST["motorista"]) && isset($_POST["observacoes"]) && isset($_POST["acao"])) {
    // Recupera os dados do formulário
    $id = $_POST["id_ocorrencia"];
    $novo_motorista = $_POST["motorista"];
    $observacoes = $_POST["observacoes"];
    $acao = $_POST["acao"];

    // Conecta-se ao banco de dados
    $conexao = mysqli_connect("localhost", "u219851065_admin_porto", "Xavier364074$", "u219851065_AguiaAzul");

    // Verifica se a conexão foi estabelecida com sucesso
    if (!$conexao) {
        die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
    }

    // Prepara a consulta SQL para atualizar o motorista, as observações e a ação
    $sql = "UPDATE u219851065_AguiaAzul.ocorrencia_trafego SET motorista = ?, observacoes = ?, acao = ? WHERE id = ?";
    
    // Prepara a declaração SQL
    if ($stmt = mysqli_prepare($conexao, $sql)) {
        // Associa as variáveis aos parâmetros da declaração preparada
        mysqli_stmt_bind_param($stmt, "sssi", $novo_motorista, $observacoes, $acao, $id);

        // Executa a declaração
        if (mysqli_stmt_execute($stmt)) {
            echo "<div class='fs-4'>Atualizações efetuadas com sucesso!!!<div/><br>";
            
            // Query para mover a ocorrência para outra tabela
            $query_move_ocorrencia = "INSERT INTO u219851065_AguiaAzul.ocorrencia_finalizada SELECT * FROM u219851065_AguiaAzul.ocorrencia_trafego WHERE id = $id";

            // Executa a query
            $resultado_move = mysqli_query($conexao, $query_move_ocorrencia);

            if ($resultado_move) {
                // Se o movimento foi bem-sucedido, exclua a ocorrência da tabela original
                $query_excluir_ocorrencia = "DELETE FROM u219851065_AguiaAzul.ocorrencia_trafego WHERE id = $id";
                $resultado_excluir = mysqli_query($conexao, $query_excluir_ocorrencia);

                if ($resultado_excluir) {
                    echo "<div class='fs-4'>Ocorrência finalizada com sucesso!!!</div>";
                } else {
                    echo "Erro ao excluir ocorrência da tabela original.";
                }
            } else {
                echo "Erro ao mover ocorrência para outra tabela.";
            }
        } else {
            echo "Erro ao executar a declaração: " . mysqli_error($conexao);
        }

        // Fecha a declaração
        mysqli_stmt_close($stmt);
    } else {
        echo "Erro ao preparar a declaração: " . mysqli_error($conexao);
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
} else {
    // Se os dados não foram enviados corretamente, exibe uma mensagem de erro
    echo "Erro: Dados não recebidos corretamente.";
}
?>

<!-- Botão de volta para Deschboard -->
<div style="margin-top: 20px;">
    <a href="deshboard-trafego.php" class="btn btn-primary">Voltar para Deschboard</a>
    <a href="comunica.html" class="btn btn-secondary">Ir para Relatórios</a>
</div>
    
</div>
    </div>
</body>