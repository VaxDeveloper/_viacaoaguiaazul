<?php
session_start();

// Verifica se o usuário não está logado
if (!isset($_SESSION['user'])) {
    header("Location: index.php"); // Redireciona para a página de login se não estiver logado
    exit();
}

// Define o status do usuário (você precisa ajustar essa lógica conforme necessário)
$statusUsuario = $_SESSION['status']; // Supondo que o status do usuário esteja armazenado na sessão

?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Águia-Azul_ADM</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&amp;display=swap">
    <link rel="stylesheet" href="assets/css/bs-theme-overrides.css">
    <link rel="stylesheet" href="assets/css/aos.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/footer/Footer-Dark-icons.css">
    <link rel="stylesheet" href="assets/css/FPE-Gentella-form-elements-custom.css">
    <link rel="stylesheet" href="assets/css/FPE-Gentella-form-elements.css">
    <link rel="stylesheet" href="assets/css/tela-login/Login-with-overlay-image.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/mobile.css">
</head>

<body>
    <nav class="navbar navbar-expand-md bg-dark bg-opacity-50 py-3" data-bs-theme="dark" style="backdrop-filter: opacity(1);">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img id="logo" data-aos="zoom-in-up" data-aos-duration="600" data-aos-delay="300" src="assets/img/Logo_aguia-azul.png">
            </a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-6">
                <span class="visually-hidden">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-0 order-md-first" id="navcol-6">
                <h1 class="Front-desk" id="title-panel">Painel ADM</h1>
                <div class="d-md-none my-3">
                    <a id="btn-logout" class="btn btn-sm btn-info d-xl-flex align-items-xl-center" role="button" href="logout.php">SAIR</a>
                    <a class="btn btn-sm btn-primary" role="button" href="solicitacoes.php" style="font-family: Poppins, sans-serif;">Relatar problemas</a>
                </div>
            </div>
            <div class="d-none d-md-block"><a class="btn btn-primary" role="button" href="solicitacoes.php" style="font-family: Poppins, sans-serif;">Relatar problemas</a></div>
        </div>
    </nav>
    
    <div class="d-none d-md-block container-logout">
        <div class="container container-logout-content">
            <div class="font-monospace d-flex justify-content-between container-logout-values">
                <p class="font-monospace d-xl-flex" id="text-logout" style="height: auto;">Bem vindo, <?php echo $_SESSION['user']; ?>! você está logado em PAINEL - ADM</p>
                <a id="btn-logout" class="btn btn-info d-xl-flex align-items-xl-center" role="button" href="logout.php">SAIR</a>
            </div>
        </div>
    </div>

    <main id="ctrl-panel">
        <div class="d-sm-flex justify-content-sm-center align-items-sm-center d-md-flex justify-content-md-center align-items-md-center d-xl-flex justify-content-xl-center align-items-xl-center" id="redirecionamento">
            <div id="container-buttons">
                <div class="container redirecionamento-buttons">
                    <div class="row">
                        <?php if ($statusUsuario == 1 || $statusUsuario == 10 || $statusUsuario == 11): ?>
                            <div class="col-md-4"><a class="btn btn-primary btn-panel" role="button" href="deshboard-video.php">Vídeo e Monitoramento</a></div>
                        <?php else: ?>
                            <div class="col-md-4"><button class="btn btn-primary btn-panel" type="button" disabled>Vídeo e Monitoramento</button></div>
                        <?php endif; ?>
                        <?php if ($statusUsuario == 2 || $statusUsuario == 10 || $statusUsuario == 11): ?>
                            <div class="col-md-4"><a class="btn btn-primary btn-panel" role="button" href="deshboard-trafego.php">Trafego</a></div>
                        <?php else: ?>
                            <div class="col-md-4"><button class="btn btn-primary btn-panel" type="button" disabled>Trafego</button></div>
                        <?php endif; ?>
                        <?php if ($statusUsuario == 3 || $statusUsuario == 10): ?>
                            <div class="col-md-4"><a class="btn btn-primary btn-panel" role="button" href="deshboard-manutencao.php">Manutenção</a></div>
                        <?php else: ?>
                            <div class="col-md-4"><button class="btn btn-primary btn-panel" type="button" disabled>Manutenção</button></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="container redirecionamento-buttons">
                    <div class="row">
                        <?php if ($statusUsuario == 4 || $statusUsuario == 10): ?>
                            <div class="col-md-4"><a class="btn btn-primary btn-panel" role="button" href="#">Almoxarifado</a></div>
                        <?php else: ?>
                            <div class="col-md-4"><button class="btn btn-primary btn-panel" type="button" disabled>Almoxarifado</button></div>
                        <?php endif; ?>
                        <?php if ($statusUsuario == 5 || $statusUsuario == 10): ?>
                            <div class="col-md-4"><a class="btn btn-primary btn-panel" role="button" href="#">Financeiro</a></div>
                        <?php else: ?>
                            <div class="col-md-4"><button class="btn btn-primary btn-panel" type="button" disabled>Financeiro</button></div>
                        <?php endif; ?>
                        <?php if ($statusUsuario == 6 || $statusUsuario == 10): ?>
                            <div class="col-md-4"><a class="btn btn-primary btn-panel" role="button" href="#">Treinamento</a></div>
                        <?php else: ?>
                            <div class="col-md-4"><button class="btn btn-primary btn-panel" type="button" disabled>Treinamento</button></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="container redirecionamento-buttons">
                    <div class="row">
                        <?php if ($statusUsuario == 7 || $statusUsuario == 10): ?>
                            <div class="col-md-4"><a class="btn btn-primary btn-panel" role="button" href="#">Tesouraria</a></div>
                        <?php else: ?>
                            <div class="col-md-4"><button class="btn btn-primary btn-panel" type="button" disabled>Tesouraria</button></div>
                        <?php endif; ?>
                        <?php if ($statusUsuario == 8 || $statusUsuario == 10 || $statusUsuario == 11): ?>
                            <div class="col-md-4"><a class="btn btn-primary btn-panel" role="button" href="deshboard-dp.php">Departamento Pessoal</a></div>
                        <?php else: ?>
                            <div class="col-md-4"><button class="btn btn-primary btn-panel" type="button" disabled>Departamento Pessoal</button></div>
                        <?php endif; ?>
                        <?php if ($statusUsuario == 1 || $statusUsuario == 2 || $statusUsuario == 6 || $statusUsuario == 8 || $statusUsuario == 10 || $statusUsuario == 11): ?>
                            <div class="col-md-4"><a class="btn btn-primary btn-panel" role="button" href="deshboard-finalizadas.php">Ocorrências Finalizadas</a></div>
                        <?php else: ?>
                            <div class="col-md-4"><button class="btn btn-primary btn-panel" type="button" disabled>Tabelas</button></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="bg-dark bg-opacity-50 py-4">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-3">
                <div class="col">
                    <p class="text-secondary my-2" style="text-align: center;font-family: Poppins, sans-serif;font-size: 13px;">Copyright&nbsp;© 2024 Viação Águia Azul</p>
                </div>
                <div class="col">
                    <ul class="list-inline my-2" style="text-align: center;">
                        <li class="list-inline-item me-4" data-bss-hover-animate="rubberBand">
                            <div class="bs-icon-circle bs-icon-primary bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-whatsapp">
                                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path>
                                </svg></div>
                        </li>
                        <li class="list-inline-item me-4" data-bss-hover-animate="rubberBand">
                            <div class="bs-icon-circle bs-icon-primary bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-github">
                                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8"></path>
                                </svg></div>
                        </li>
                        <li class="list-inline-item" data-bss-hover-animate="rubberBand">
                            <div class="bs-icon-circle bs-icon-primary bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-instagram">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"></path>
                                </svg></div>
                        </li>
                    </ul>
                </div>
                <div class="col" style="text-align: center;">
                    <ul class="list-inline my-2" style="font-family: Poppins, sans-serif;">
                        <li class="list-inline-item"><a class="link-secondary" href="#">Privacy Policy</a></li>
                        <li class="list-inline-item"><a class="link-secondary" href="#">Terms of Use</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/aos.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
</body>

</html>
