<?php
session_start();

// Verifica se o usuário está logado e tem permissão (status 2 OU 10)
if (!isset($_SESSION['user']) || ($_SESSION['status'] != 2 && $_SESSION['status'] != 10 && $_SESSION['status'] != 11)) {
    // Se não estiver logado ou não tiver permissão, redireciona para a página de login
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Águia Azul-ADM</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&amp;display=swap">
    <link rel="stylesheet" href="assets/css/bs-theme-overrides.css">
    <link rel="stylesheet" href="assets/css/footer/Footer-Dark-icons.css">
    <link rel="stylesheet" href="assets/css/FPE-Gentella-form-elements-custom.css">
    <link rel="stylesheet" href="assets/css/FPE-Gentella-form-elements.css">
    <link rel="stylesheet" href="assets/css/tela-login/Login-with-overlay-image.css">
    <link rel="stylesheet" href="assets/css/mobile.css">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>

<body>
    <nav class="navbar navbar-expand-md bg-dark bg-opacity-50 py-3 nav-mobile" data-bs-theme="dark" style="backdrop-filter: opacity(1);">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><img id="logo" data-aos="zoom-in-up" data-aos-duration="600" data-aos-delay="300" src="assets/img/Logo_aguia-azul.png"></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-6"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse flex-grow-0 order-md-first" id="navcol-6">
                <div class="d-md-none my-3">
                    <a id="btn-logout" class="btn btn-sm btn-info d-xl-flex align-items-xl-center" role="button" href="../logout.php">SAIR</a>
                    <a id="btn-logout" class="btn btn-sm btn-secondary d-xl-flex align-items-xl-center" role="button" href="deshboard-trafego.php">Deshboard</a>
                    <a class="btn btn-sm btn-primary" role="button" href="solicitacoes.php" style="font-family: Poppins, sans-serif;">Relatar problemas</a>
                </div>
            </div>
            <div class="d-none d-md-block"><a class="btn btn-primary" role="button" href="solicitacoes.php" style="font-family: Poppins, sans-serif;">Relatar problemas</a></div>
        </div>
    </nav>

    <div class="container-logout Front-desk">
        <div class="container container-logout-content">
            <div class="font-monospace d-flex justify-content-between container-logout-values">
                <p class="font-monospace d-xl-flex" id="text-logout" style="height: auto;">Bem vindo, <?php echo $_SESSION['user']; ?>! você está logado em Deshboard - TRÁFEGO</p><a id="btn-logout" class="btn btn-info d-xl-flex align-items-xl-center" role="button" href="../logout.php">SAIR</a>
            </div>
        </div>
    </div>
    <div class="d-flex" id="container-principal">
        <div class="container-menu">
            <div id="title-menu"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-camera-video-fill fs-2">
                    <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2z"></path>
                </svg>
                <h4>Deshboard</h4>
                <p class="fs-6">TRÁFEGO</p>
                <div style="border-bottom-width: 2px;border-bottom-style: solid;"></div>
                <div class="d-xl-flex justify-content-xl-center section-menu">
                    <div class="d-flex justify-content-sm-between justify-content-md-between justify-content-lg-between align-items-xl-center justify-content-xxl-between itens-menu"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-folder-minus fs-4" style="color: rgb(231,231,239);">
                            <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2m5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z"></path>
                            <path d="M11 11.5a.5.5 0 0 1 .5-.5h4a.5.5 0 1 1 0 1h-4a.5.5 0 0 1-.5-.5"></path>
                        </svg><a class="fs-6 link-light menu-link" href="painel.php">Painel</a></div>
                </div>
                <div class="d-xl-flex justify-content-xl-center section-menu">
                    <div class="d-flex justify-content-sm-between justify-content-md-between justify-content-lg-between align-items-xl-center justify-content-xxl-between itens-menu"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" class="fs-4" style="color: rgb(231,231,239);">
                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"></path>
                        </svg><a class="fs-6 link-light menu-link" href="deshboard-trafego.php">Desch</a></div>
                </div>
                <div class="d-xl-flex justify-content-xl-center section-menu">
                    <div class="d-flex justify-content-sm-between justify-content-md-between justify-content-lg-between align-items-xl-center justify-content-xxl-between itens-menu"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-64 0 512 512" width="1em" height="1em" fill="currentColor" class="fs-4" style="color: rgb(231,231,239);">
                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z"></path>
                        </svg><a class="fs-6 link-light menu-link" href="comunica.html">Relatório</a></div>
                </div>
                <div class="d-xl-flex justify-content-xl-center section-menu">
                    <div class="d-flex justify-content-sm-between justify-content-md-between justify-content-lg-between align-items-xl-center justify-content-xxl-between itens-menu"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" class="fs-4" style="color: rgb(231,231,239);">
                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"></path>
                        </svg><a class="fs-6 link-light menu-link" href="#">Evasão</a></div>
                </div>
                <div>
                
            </div>
        </div>
    </div>
        <div class="container-dados" style="border-width: 1px;border-style: solid;">
            <div class="table-responsive border rounded-0 border-secondary" style="height: 100%;width: 100%;background: #3a5774;">

                <?php
                    // Verifica se o ID da ocorrência foi passado na URL
                    if (isset($_GET['id'])) {
                        $id_ocorrencia = $_GET['id'];

                        // Conecta ao banco de dados
                        $conexao = mysqli_connect("localhost", "u219851065_admin_porto", "Xavier364074$", "u219851065_AguiaAzul");

                        // Prepara e executa a consulta para obter os detalhes da ocorrência com base no ID
                        $consulta_sql = "SELECT * FROM u219851065_AguiaAzul.ocorrencia_trafego WHERE id = $id_ocorrencia";
                        $resultado_consulta = mysqli_query($conexao, $consulta_sql);

                        // Verifica se a consulta retornou resultados
                        if ($resultado_consulta && mysqli_num_rows($resultado_consulta) > 0) {
                            // Recupera os detalhes da ocorrência
                            $detalhes_ocorrencia = mysqli_fetch_assoc($resultado_consulta);
                            // Aqui você pode exibir os detalhes da ocorrência dentro de uma caixa de texto
                            echo "<div class='container detalhes-ocorrencia'>";
                            echo "<h1 class='mt-4 detalhes'>Detalhes da Ocorrência:</h1>";
                            echo "<div class='row my-4' style='color: #adb5bd;'>";
                            echo "<div class='col-4 detalhes-info-1' style='border-right: solid 1px #6c757d;'>";
                            echo "<p><strong>ID Ocorrência:</strong> " . $detalhes_ocorrencia['id'] . "</p>";
                            echo "<p><strong>Data:</strong> " . $detalhes_ocorrencia['data'] . "</p>";
                            echo "<p><strong>Horário:</strong> " . $detalhes_ocorrencia['horario'] . "</p>";

                            // Constrói o caminho do arquivo de vídeo
                            $caminho_arquivo = "videos/{$detalhes_ocorrencia['video']}";

                            echo "<div class='d-flex'>";
                            echo "<p><strong>Vídeo:</strong></p>";
                            // Adiciona um link para download do vídeo
                            echo "<a class='mt-1 mx-2 link-warning' href='download_videoTr.php?video={$detalhes_ocorrencia['id']}'>Vídeo-1</a>";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class='col-8 detalhes-info-2'>";
                            echo "<p><strong>Motorista:</strong> " . $detalhes_ocorrencia['motorista'] . "</p>";
                            echo "<p><strong>Ocorrência:</strong> " . $detalhes_ocorrencia['ocorrencia'] . "</p>";
                            echo "<p class='text-wrap w-100'><strong>Descrição:</strong> " . $detalhes_ocorrencia['descricao'] . "</p>";
                            echo "<p><strong>Ação:</strong> " . $detalhes_ocorrencia['acao'] . "</p>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";

                            // Adiciona uma linha separadora
                            echo "<div style='border-top: 1px solid #6c757d;'></div>";
                            
                            // Adicionar um formulário para enviar as informações do motorista, ação e observações
                            echo "<div class='container p-3'>";
                            echo "<form action='atualizaTr.php' method='post'>";
                            
                            // Continuação do formulário...

                            
                            // Div para o campo de seleção de motorista
                            echo "<div class='row my-4'>";
                            echo "<div class='col-6 select-group'>";
                            echo "<p for='motorista'></p>";
                            echo "<select class='form-select' name='motorista' id='motorista'>";
                            echo "<option value=''>Informe o Motorista</option>";
                            // Exemplo de opções de motoristas
                            echo "<option value='307319'>307319 - Adeilson dos Santos Barbosa</option>";
                            echo "<option value='307507'>307507 - Adenilson Jesus da Silva</option>";
                            echo "<option value='307292'>307292 - Adriano Pinto de Almeida</option>";
                            echo "<option value='307642'>307642 - Aneilton Pereira da Conceição</option>";
                            echo "<option value='307754'>307754 - Carlos Silva Santos</option>";
                            echo "<option value='307508'>307508 - Eduardo Ribeiro dos Santos</option>";
                            echo "<option value='307509'>307509 - Eleomario Costa de Jesus</option>";
                            echo "<option value='307566'>307566 - Elivelton da Silva Santos</option>";
                            echo "<option value='307510'>307510 - Gildeon Rodrigues da Silva</option>";
                            echo "<option value='307548'>307548 - Gilmar Nascimento dos Santos</option>";
                            echo "<option value='307744'>307744 - Gilson da Paz Almeida</option>";
                            echo "<option value='307117'>307117 - Givanildo Ferreira de Souza</option>";
                            echo "<option value='307848'>307848 - João Barbosa Neto</option>";
                            echo "<option value='307827'>307827 - João Melo Assunção</option>";
                            echo "<option value='305071'>305071 - Jorge Novais de Souza</option>";
                            echo "<option value='305072'>305072 - José Raimundo Lima Andrade</option>";
                            echo "<option value='307294'>307294 - José Reinaldo da Silva Benfica</option>";
                            echo "<option value='Juraci Souza'>307717 - Juraci Souza Santos</option>";
                            echo "<option value='Manoel Pereira'>Free Lance - Manoel Pereira dos Santos</option>";
                            echo "<option value='307753'>307753 - Marcos Andrade Silva</option>";
                            echo "<option value='307166'>307166 - Marcos Vinicius L. de Oliveira</option>";
                            echo "<option value='307752'>307752 - Messias Santos de Menezes</option>";
                            echo "<option value='307832'>307832 - Orlan Santos de Souza</option>";
                            echo "<option value='307911'>307911 - Paulo Rogerio R. Santos</option>";
                            echo "<option value='307140'>307140 - Renilson Santos Ferreira</option>";
                            echo "<option value='302763'>302763 - Roberto Rocha de Jesus</option>";
                            echo "<option value='307908'>307908 - Rodrigo Moreira Santos Zanona</option>";
                            echo "<option value='307730'>307730 - Romario Oliveira de Jesus</option>";
                            echo "<option value='307516'>307516 - Tiago Rodrigues Barbosa</option>";
                            echo "<option value='Uhelliton'>Free Lance - Uhelliton de Jesus Santos</option>";
                            echo "<option value='307912'>307912 - Valdnei Cerqueira Amaral</option>";
                            echo "<option value='Valnei Martins'>Free Lance - Valnei Martins da conceição</option>";
                            echo "<option value='307726'>307726 - Vancleys Silva Nolasco</option>";
                            echo "<option value='307909'>307909 - Wesley Sulz dos Santos</option>";
                            // Adicione mais opções conforme necessário
                            echo "</select>";
                            
                            // Div para o campo de seleção de ação
                            echo "<p for='acao'></p>";
                            echo "<select class='form-select' name='acao' id='acao'>";
                            echo "<option value=''>Informe a Ação tomada</option>";
                            echo "<option value='Advertência'>Advertência</option>";
                            echo "<option value='Desconsiderar'>Desconsiderar</option>";
                            echo "<option value='Fazer Reparo'>Fazer Reparo</option>";
                            echo "<option value='Orientação'>Orientação</option>";
                            echo "<option value='Suspenção um dia'>Suspenção um dia</option>";
                            echo "<option value='Suspenção três dias'>Suspenção três dias</option>";
                            // Adicione mais opções conforme necessário
                            echo "</select>";
                            echo "</div>";
                            echo "<div class='col-6 Front-desk'>";
                            echo "<p for='acao' style='font-size: 1.3em;'>1) Preencha os campos em aberto da ocorrência.</p>";
                            echo "<p for='acao' style='font-size: 1.3em;'>2) Clique no botão ENVIAR para que os dados sejam registrados ou atualizados no Banco de Dados.</p>";
                            echo "<p for='acao' style='font-size: 1.3em;'>3) Volte ao Deaschboard e finalize a OS clicando em FIM.</p>";
                            echo "</div>";
                            echo "</div>";
                            
                            // Div para o campo de texto de observações
                            echo "<div class='text-center'>";
                            echo "<p for='observacoes'>Observações:</p>";
                            echo "<div class='row'>";
                            echo "<div class='col-2'>";
                            echo "</div>";
                            echo "<div class='col-8'>";
                            echo "<textarea class='form-control' name='observacoes' id='observacoes' rows='4' cols='50'></textarea>";
                            echo "</div>";
                            echo "<div class='col-2'>";
                            echo "</div>";
                            echo "</div>";
                            
                            // Adicionar um campo oculto para enviar o ID da ocorrência
                            echo "<input type='hidden' name='id_ocorrencia' value='" . $id_ocorrencia . "'>";
                            
                            // Botão de envio do formulário
                            echo "<input class='btn btn-outline-warning mt-3' type='submit' value='Enviar para o Banco de Dados'>";
                            echo "</form>";
                            echo "</div>";
                            
                        } else {
                            // Se não houver resultados para o ID especificado, exiba uma mensagem de erro
                            echo "Ocorrência não encontrada.";
                        }

                        // Fecha a conexão com o banco de dados
                        mysqli_close($conexao);
                    } else {
                        // Se o ID da ocorrência não foi passado na URL, redireciona para a página anterior
                        header("Location: pagina_anterior.php"); // Substitua "pagina_anterior.php" pelo nome da página anterior
                        exit();
                    }
                    ?>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
</body>

</html>
