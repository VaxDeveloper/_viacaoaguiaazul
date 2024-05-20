<?php
session_start();

// Verifica se o usuário não está logado
if (!isset($_SESSION['user'])) {

    // Inicializa as variáveis
    $email = $password = $error = "";

    // Verifica se o formulário de login foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Configurações do banco de dados
        $dbHost = "localhost";
        $dbUser = "u219851065_admin_porto";  // Substitua pelo seu usuário do banco de dados
        $dbPassword = "Xavier364074$";  // Substitua pela sua senha do banco de dados
        $dbName = "u219851065_AguiaAzul";  // Substitua pelo nome correto do seu banco de dados

        // Conecta ao banco de dados
        $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

        // Verifica se a conexão foi bem-sucedida
        if ($conn->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Consulta para verificar as credenciais
        $query = "SELECT id, senha, status FROM u219851065_AguiaAzul.usuarios WHERE email = ?";
        $stmt = $conn->prepare($query);

        // Verifica se a preparação da consulta foi bem-sucedida
        if ($stmt === false) {
            die("Erro na preparação da consulta: " . $conn->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();

        // Verifica se a execução da consulta foi bem-sucedida
        $result = $stmt->get_result();

        // Verifica se a consulta retornou alguma linha
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Verifica se as chaves 'senha', 'status' e 'id' existem no array
            if (array_key_exists('senha', $row) && array_key_exists('status', $row) && array_key_exists('id', $row)) {
                // Verifica se o usuário está ativo
                if ($row['status'] == 1 || $row['status'] == 2 || $row['status'] == 3 || $row['status'] == 4 || $row['status'] == 10 || $row['status'] == 11) {
                    // Verifica se a senha é válida
                    if (password_verify($password, $row['senha'])) {
                        // Autenticado com sucesso
                        $_SESSION['user'] = $email;
                        $_SESSION['status'] = $row['status'];
                        $_SESSION['user_id'] = $row['id'];
                        header("Location: painel.php");
                        exit();
                    } else {
                        // Senha inválida
                        $error = "Senha inválida";
                    }
                } else {
                    // Usuário não está ativo
                    $error = "Usuário não está ativo";
                }
            } else {
                // Alguma chave não está presente no array
                $error = "Erro ao acessar os dados do usuário: chaves 'senha', 'status' ou 'id' não estão presentes no array";
            }
        } else {
            // E-mail não encontrado
            $error = "E-mail não encontrado";
        }

        // Fecha a conexão com o banco de dados
        $stmt->close();
    }

    // Adicione essas linhas para depuração
    // var_dump($email, $password, $error);
} else {
    // Se o usuário já estiver logado, redireciona para o painel
    header("Location: painel.php");
    exit();
}
?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

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
</head>

<body>
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>LOGIN</h2>
                    <p class="w-lg-50">Bem vindo a Viação Águia Azul. Faça login para ter acesso ao painel e deshboards.</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5" style="background: rgba(231,231,239,0.52);">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z"></path>
                                </svg></div>
                            <form class="text-center" method="post">
                                <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email" required></div>
                                <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password" required></div>
                                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Login</button></div>
                            </form>
                            <div>
                                <a class="mx-3 fs-6"href="solicitacoes.php">Solicitações</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
</body>

</html>