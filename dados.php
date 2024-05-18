<?php
// Conectar ao banco de dados
$conn = new mysqli("localhost", "u219851065_admin_porto", "Xavier364074$", "u219851065_AguiaAzul");

// Verificar conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Consulta SQL para obter os dados do banco de dados
$sql = "SELECT motorista, ocorrencia, acao  FROM u219851065_AguiaAzul.ocorrencia_video";

$result = $conn->query($sql);

// Verificar se a consulta teve sucesso
if (!$result) {
    die("Erro na consulta: " . $conn->error);
}

// Array para armazenar os dados
$data = array();

// Loop através dos resultados do banco de dados e adicionar ao array
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Verificar se há dados
if (empty($data)) {
    die("Não foram encontrados dados.");
}

// Adicionar um registro de log para verificar os dados retornados
error_log("Dados do banco de dados: " . json_encode($data));

// Converter para formato JSON
$json_data = json_encode($data);

// Verificar se a conversão para JSON teve sucesso
if ($json_data === false) {
    die("Erro ao converter para JSON.");
}

// Saída para o navegador
header('Content-Type: application/json');
echo $json_data;

// Fechar conexão
$conn->close();
?>
