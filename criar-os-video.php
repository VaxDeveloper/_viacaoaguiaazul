<?php
session_start();

// Verifica se o usuário não está logado
if (!isset($_SESSION['user'])) {
    header("Location: index.php"); // Redireciona para a página de login se não estiver logado
    exit();
}
?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Águia Azul-AD</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&amp;display=swap">
    <link rel="stylesheet" href="assets/css/bs-theme-overrides.css">
    <link rel="stylesheet" href="assets/css/footer/Footer-Dark-icons.css">
    <link rel="stylesheet" href="assets/css/FPE-Gentella-form-elements-custom.css">
    <link rel="stylesheet" href="assets/css/FPE-Gentella-form-elements.css">
    <link rel="stylesheet" href="assets/css/tela-login/Login-with-overlay-image.css">
</head>

<body>
    <div class="container-logout">
        <div class="container container-logout-content">
            <div class="font-monospace d-flex justify-content-between container-logout-values">
                <p class="font-monospace d-xl-flex" id="text-logout" style="height: auto;">Bem vindo, <?php echo $_SESSION['user']; ?>! você está logado em Lançamento - VÍDEO</p><a id="btn-logout" class="btn btn-info d-xl-flex align-items-xl-center" role="button" href="logout.php">SAIR</a>
            </div>
        </div>
    </div>
    <div id="container-logout"></div>
    <div class="d-flex" id="container-principal">
        <div class="container-menu">
            <div id="title-menu"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                    viewBox="0 0 16 16" class="bi bi-camera-video-fill fs-2">
                    <path fill-rule="evenodd"
                        d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2z">
                    </path>
                </svg>
                <h4>Deshboard</h4>
                <p class="fs-6">CMV</p>
                <div style="border-bottom-width: 2px;border-bottom-style: solid;"></div>
                <div class="d-xl-flex justify-content-xl-center section-menu">
                    <div
                        class="d-flex justify-content-sm-between justify-content-md-between justify-content-lg-between align-items-xl-center justify-content-xxl-between itens-menu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-folder-minus fs-4" style="color: rgb(231,231,239);">
                            <path
                                d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2m5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z">
                            </path>
                            <path d="M11 11.5a.5.5 0 0 1 .5-.5h4a.5.5 0 1 1 0 1h-4a.5.5 0 0 1-.5-.5"></path>
                        </svg><a class="fs-6 link-light menu-link" href="painel.php">Painel</a>
                    </div>
                </div>
                <div class="d-xl-flex justify-content-xl-center section-menu">
                    <div
                        class="d-flex justify-content-sm-between justify-content-md-between justify-content-lg-between align-items-xl-center justify-content-xxl-between itens-menu">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em"
                            fill="currentColor" class="fs-4" style="color: rgb(231,231,239);">
                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M24 32c13.3 0 24 10.7 24 24V408c0 13.3 10.7 24 24 24H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H72c-39.8 0-72-32.2-72-72V56C0 42.7 10.7 32 24 32zM128 136c0-13.3 10.7-24 24-24l208 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-208 0c-13.3 0-24-10.7-24-24zm24 72H296c13.3 0 24 10.7 24 24s-10.7 24-24 24H152c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 96H424c13.3 0 24 10.7 24 24s-10.7 24-24 24H152c-13.3 0-24-10.7-24-24s10.7-24 24-24z">
                            </path>
                        </svg><a class="fs-6 link-light menu-link" href="deshboard-video.php">Desh</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-dados">
            <section class="position-relative py-4 py-xl-5">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-9">
                            <div class="card mb-5" style="background: rgba(231,231,239,0.2);">
                                <div class="card-body p-sm-5">
                                    <h3 class="text-center text-light mb-4">Lançamento das Ocorrências</h3>
                                    <form method="post" enctype="multipart/form-data" action="./envia.php">
                                        <div class="d-flex mb-3">
                                            <input class="form-control" type="date" name="data" required>
                                            <input class="form-control input-form-os" type="time" name="horario" required>
                                        </div>
                                        <div class="d-flex mb-3"><select class="form-select" name="motorista">
                                                <optgroup label="Informe o Motorista:">
                                                    <option label="Informe o Motorista:"></option>
                                                    <option value="307319" disabled>307319 - Adeilson dos Santos Barbosa</option>
                                                    <option value="307507" disabled>307507 - Adenilson Jesus da Silva</option>
                                                    <option value="307292" disabled>307292 - Adriano Pinto de Almeida</option>
                                                    <option value="307642" disabled>307642 - Aneilton Pereira da Conceição </option>
                                                    <option value="307754" disabled>307754 - Carlos Silva Santos</option>
                                                    <option value="307508" disabled>307508 - Eduardo Ribeiro dos Santos</option>
                                                    <option value="307509" disabled>307509 - Eleomario Costa de Jesus</option>
                                                    <option value="307566" disabled>307566 - Elivelton da Silva Santos</option>
                                                    <option value="307510" disabled>307510 - Gildeon Rodrigues da Silva</option>
                                                    <option value="307548" disabled>307548 - Gilmar Nascimento dos Santos</option>
                                                    <option value="307744" disabled>307744 - Gilson da Paz Almeida</option>
                                                    <option value="307117" disabled>307117 - Givanildo Ferreira de Souza </option>
                                                    <option value="307848" disabled>307848 - João Barbosa Neto</option>
                                                    <option value="307827" disabled>307827 - João Melo Assunção</option>
                                                    <option value="305071" disabled>305071 - Jorge Novais de Souza</option>
                                                    <option value="305072" disabled>305072 - José Raimundo Lima Andrade</option>
                                                    <option value="307294" disabled>307294 - José Reinaldo da Silva Benfica </option>
                                                    <option value="307717" disabled>307717 - Juraci Souza Santos</option>
                                                    <option value="Manoel" disabled>Free Lance - Manoel Pereira dos Santos</option>
                                                    <option value="307753" disabled>307753 - Marcos Andrade Silva</option>
                                                    <option value="307166" disabled>307166 - Marcos Vinicius L. de Oliveira</option>
                                                    <option value="307752" disabled>307752 - Messias Santos de Menezes</option>
                                                    <option value="307832" disabled>307832 - Orlan Santos de Souza </option>
                                                    <option value="307911" disabled>307911 - Paulo Rogerio R. Santos</option>
                                                    <option value="307140" disabled>307140 - Renilson Santos Ferreira</option>
                                                    <option value="302763" disabled>302763 - Roberto Rocha de Jesus</option>
                                                    <option value="307908" disabled>307908 - Rodrigo Moreira Santos Zanona</option>
                                                    <option value="307730" disabled>307730 - Romario Oliveira de Jesus</option>
                                                    <option value="307516" disabled>307516 - Tiago Rodrigues Barbosa</option>
                                                    <option value="Uhellito" disabled>Free Lance - Uhelliton de Jesus Santos</option>
                                                    <option value="307912" disabled>307912 - Valdnei Cerqueira Amaral</option>
                                                    <option value="Valnei" disabled>Free Lance - Valnei Martins da conceição </option>
                                                    <option value="307726" disabled>307726 - Vancleys Silva Nolasco</option>
                                                    <option value="307909" disabled>307909 - Wesley Sulz dos Santos</option>
                                                </optgroup>
                                            </select></div>
                                        <div class="d-flex mb-3">
                                            </select><select class="form-select" name="linha" required>
                                                <optgroup label="Grupos de Linhas:">
                                                    <option label="Informe a linha:"</option>
                                                    <option value="0001">0001 - Santiago x Balsa via centro</option>
                                                    <option value="0010">0010 - Balsa x Trancoso via centro</option>
                                                    <option value="0020">0020 - Balsa x Caraiva via centro</option>
                                                    <option value="0012">0012 - Vale verde x Arraial D'ajuda</option>
                                                </optgroup>
                                            </select><select class="form-select input-form-os" name="carro" required>
                                                <optgroup label="Grupo de Carros:">
                                                    <option label="Escolha um carro:"></option>
                                                    <option value="1070">1070 - JMI-1699</option>
                                                    <option value="1100">1100 - JMI-1739</option>
                                                    <option value="1110">1110 - JMI-1759</option>
                                                    <option value="1400">1400 - JPW-2069</option>
                                                    <option value="1480">1480 - JRJ-4815</option>
                                                    <option value="1520">1520 - NTR-4890</option>
                                                    <option value="1530">1530 - NTR-1226</option>
                                                    <option value="1610">1610 - LLC-3793</option>
                                                    <option value="1700">1700 - PLR-5I18</option>
                                                    <option value="1710">1710 - PLR-9I43</option>
                                                    <option value="1720">1720 - PLR-9I43</option>
                                                    <option value="1730">1730 - PLS-0F14</option>
                                                    <option value="1740">1740 - PLV-3D29</option>
                                                    <option value="1750">1750 - PLS-0J89</option>
                                                    <option value="1760">1760 - PLS-4D79</option>
                                                    <option value="1770">1770 - PLS-7B64</option>
                                                    <option value="1780">1780 - NZT-1E73</option>
                                                    <option value="1790">1790 - GYT-8975</option>
                                                    <option value="1800">1800 - GYT-8G10</option>
                                                    <option value="1810">1810 - GYU-3B50</option>
                                                    <option value="1820">1820 - GYP-7D18</option>
                                                    <option value="1830">1830 - LRO-4C46</option>
                                                    <option value="1840">1840 - LRN-7E64</option>
                      
                                                </optgroup>
                                            </select></div>
                                        <div class="d-flex mb-3"><select class="form-select" name="fiscal" required>
                                                <optgroup label="This is a group">
                                                    <option label="">Identifique-se:</option>
                                                    <option label="Identifique-se:"></option>
                                                    <option value="1252">1252</option>
                                                    <option value="1990">1990</option>
                                                    <option value="1991">1991</option>
                                                    <option value="1992">1992</option>
                                                    <option value="1993">1993</option>
                                                    <option value="1994">1994</option>
                                                    <option value="1995">1995</option>
                                                    <option value="1996">1996</option>
                                                    <option value="1997">1997</option>
                                                    <option value="1998">1998</option>
                                                    <option value="1999">1999</option>
                                                    <option value="2000">2000</option>
                                                </optgroup>
                                            </select><select class="form-select input-form-os" name="ocorrencia" required>
                                                <optgroup label="This is a group">
                                                    <option value="">Selecione uma ocorrência!!!</option>
                                                    <option value="Acidente de Trânsito">Acidente de Trânsito</option>
                                                    <option value="Acidente de Trânsito">Assalto</option>
                                                    <option value="Camera com Defeito">Camera com Defeito</option>
                                                    <option value="Cliente sentado no capô">Cliente sentado no capô</option>
                                                    <option value="Criança maior de 6 anos">Criança maior de 6 anos</option>
                                                    <option value="DVR com Defeito">DVR com Defeito</option>
                                                    <option value="Discussão com cliente">Discussão com cliente</option>
                                                    <option value="Motorista não gira a roleta">Evasão</option>
                                                    <option value="Motorista sem cinto">Motorista sem cinto</option>
                                                    <option value="Motorista tira a mão do volante">Motorista tira a mão
                                                        do volante</option>
                                                    <option value="Motorista fazendo uso do celular">Motorista fazendo
                                                        uso do celular</option>
                                                    <option value="Motorista utilizando fone de ouvido">Motorista
                                                        utilizando fone de ouvido</option>
                                                    <option value="Motorista na contra mão">Motorista na contra mão
                                                    </option>
                                                    <option value="Motorista comendo e dirigindo">Motorista comendo e
                                                        dirigindo</option>
                                                    <option value="Motorista atrasando viagem">Motorista atrasando
                                                        viagem</option>
                                                    <option value="Motorista adiantando viagem">Motorista adiantando
                                                        viagem</option>
                                                    <option value="Motorista parado">Motorista parado</option>
                                                    <option value="Passageiro no degrau dianteiro">Passageiro no degrau
                                                        dianteiro</option>
                                                    <option value="Queda no interior do veículo">Queda no interior do
                                                        veículo</option>
                                                    <option value="Queda fora do veículo">Queda fora do veículo</option>
                                                    <option value="Vandalismo & Pula Catraca">Vandalos</option>
                                                </optgroup>
                                            </select></div>
                                        <div class="d-flex mb-3"><input class="form-control" type="file" name="video" required></div>
                                        <div class="mb-3"><textarea class="form-control" id="message-2" name="descricao"
                                                rows="6" placeholder="Message"></textarea></div>
                                        <div><button class="btn btn-primary d-block w-100" type="submit" style="font-size:20px">Enviar dados para o Servidor</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
</body>

</html>