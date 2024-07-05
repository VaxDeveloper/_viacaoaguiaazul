<!DOCTYPE html>
<html data-bs-theme="light" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Águia Azul-AD-ADM</title>
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
            <h3 style="margin-top: 20px">Relatório de Ocorrências FINALIZADAS</h3>
        </div>
    </nav>

    <div class="container">
            <?php
        session_start();

        if (!isset($_SESSION['user']) || ($_SESSION['status'] != 1 && $_SESSION['status'] != 10 && $_SESSION['status'] != 2 && $_SESSION['status'] != 8 && $_SESSION['status'] != 11)) {
            header("Location: index.php");
            exit();
        }

        $conexao = mysqli_connect("localhost", "u219851065_admin_porto", "Xavier364074$", "u219851065_AguiaAzul");

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            // Verifica se os filtros foram enviados
            if (isset($_GET['coluna']) && isset($_GET['filtro'])) {
                $coluna = $_GET['coluna'];
                $filtro = $_GET['filtro'];

                // Escapa os valores para evitar injeção de SQL
                $coluna = mysqli_real_escape_string($conexao, $coluna);
                $filtro = mysqli_real_escape_string($conexao, $filtro);

                // Constrói a consulta SQL com base nos filtros
                $consulta_sql = "SELECT * FROM u219851065_AguiaAzul.ocorrencia_finalizada WHERE $coluna LIKE '%$filtro%'";
            } else {
                // Caso contrário, consulta sem filtro
                $consulta_sql = "SELECT * FROM u219851065_AguiaAzul.ocorrencia_finalizada";
            }

            $resultado_consulta = mysqli_query($conexao, $consulta_sql);

            if ($resultado_consulta) {
                echo "<table class='table table-striped table-hover table-sm'>
                        <thead class='table-light'>
                            <tr>
                                <th class='text-center'>Os</th>
                                <th class='text-center'>Data</th>
                                <th class='text-center'>Horário</th>
                                <th class='text-center'>Motorista</th>
                                <th class='text-center'>Carro</th>
                                <th class='text-center'>Linha</th>
                                <th class='text-center'>Ocorrência</th>
                                <th class='text-center'>Descrição - Fiscal</th>
                                <th class='text-center'>Observações - Tráfego</th>
                                <th class='text-center'>Ação</th>
                                <th>Link do Vídeo</th>";
                if ($_SESSION['status'] == 5) {
                    echo "<th>Editar</th>";
                }
                echo "</tr>
                        </thead>
                        <tbody class='table-group-divider'>";
                while ($linha = mysqli_fetch_assoc($resultado_consulta)) {
                    // Constrói o caminho do arquivo
                    $caminho_arquivo = "videos/{$linha['video']}";

                    echo "<tr>
                            <td class='text-center'>{$linha['id']}</td>
                            <td class='text-center'>{$linha['data']}</td>
                            <td class='text-center'>{$linha['horario']}</td>
                            <td class='text-center'>{$linha['motorista']}</td>
                            <td class='text-center'>{$linha['carro']}</td>
                            <td class='text-center'>{$linha['linha']}</td>
                            <td class='text-start'>{$linha['ocorrencia']}</td>
                            <td class='text-start'>{$linha['descricao']}</td>
                            <td class='text-start'>{$linha['observacoes']}</td>
                            <td class='text-start'>{$linha['acao']}</td>
                            <td><a href='download_video.php?video={$linha['id']}'>Download</a></td>";
                    echo "</tr>";
                }
                echo "</tbody>
                    </table>";
            } else {
                echo "ERRO NA CONSULTA: " . mysqli_error($conexao);
            }

            mysqli_close($conexao);
        }
        ?>

        <div style="display: flex;">
            <!-- Botão de volta para Deschboard -->
            <div style="margin-top: 20px;" class="print-hide">
                <a href="deshboard-finalizadas.php" class="btn btn-primary">Voltar para Deschboard</a>
            </div>

            <!-- Botão de Gerar Impressão -->
            <div style="margin-top: 20px;" class="print-hide">
                <button onclick="imprimirPagina()" class="btn btn-secondary">Imprimir</button>
            </div>
        </div>
    </div>

    <script>
        function imprimirPagina() {
            window.print();
        }
    </script>

</body>

