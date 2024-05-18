<?php
// Verifica se os dados foram enviados via método POST e se os campos necessários estão definidos
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_ocorrencia"]) && isset($_POST["motorista"]) && isset($_POST["observacoes"]) && isset($_POST["acao"])) {
    // Recupera os dados do formulário
    $id = $_POST["id_ocorrencia"];
    $novo_motorista = $_POST["motorista"];
    $observacoes = $_POST["observacoes"];
    $acao = $_POST["acao"]; // Adiciona a variável $acao

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
        mysqli_stmt_bind_param($stmt, "sssi", $novo_motorista, $observacoes, $acao, $id); // Adiciona mais um "s" para a nova variável $acao

        // Executa a declaração
        if (mysqli_stmt_execute($stmt)) {
            echo "Motorista, observações e ação atualizados com sucesso!";
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
