<?php
// Conectar ao banco de dados
$conn = new mysqli("localhost", "u219851065_admin_porto", "Xavier364074$", "u219851065_AguiaAzul");

// Verificar conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Consulta SQL para os dados dos gráficos
$sql_graficos = "SELECT motorista, ocorrencia, acao FROM u219851065_AguiaAzul.ocorrencia_finalizada";
$result_graficos = $conn->query($sql_graficos);

// Verificar se a consulta teve sucesso
if (!$result_graficos) {
    die("Erro na consulta: " . $conn->error);
}

// Array para armazenar os dados dos gráficos
$data_graficos = array();

// Loop através dos resultados do banco de dados e adicionar ao array
while ($row = $result_graficos->fetch_assoc()) {
    $data_graficos[] = $row;
}

// Consulta SQL para os 10 motoristas com mais ocorrências
$sql_motoristas = "SELECT motorista, COUNT(*) as total_ocorrencias 
                   FROM u219851065_AguiaAzul.ocorrencia_finalizada 
                   GROUP BY motorista 
                   ORDER BY total_ocorrencias DESC 
                   LIMIT 10";
$result_motoristas = $conn->query($sql_motoristas);

// Verificar se a consulta teve sucesso
if (!$result_motoristas) {
    die("Erro na consulta: " . $conn->error);
}

// Array para armazenar os dados dos motoristas
$data_motoristas = array();

// Loop através dos resultados do banco de dados e adicionar ao array
while ($row = $result_motoristas->fetch_assoc()) {
    $data_motoristas[] = $row;
}

// Consulta SQL para contar ocorrências por tipo de ocorrência
$sql_ocorrencias = "SELECT ocorrencia, COUNT(*) as total_ocorrencias 
                    FROM u219851065_AguiaAzul.ocorrencia_finalizada 
                    GROUP BY ocorrencia";
$result_ocorrencias = $conn->query($sql_ocorrencias);

// Verificar se a consulta teve sucesso
if (!$result_ocorrencias) {
    die("Erro na consulta: " . $conn->error);
}

// Array para armazenar os dados das ocorrências
$data_ocorrencias = array();

// Loop através dos resultados do banco de dados e adicionar ao array
while ($row = $result_ocorrencias->fetch_assoc()) {
    $data_ocorrencias[] = $row;
}

// Consulta SQL para contar ocorrências de evasão e motorista não gira a roleta por motorista
$sql_evasao_roleta = "SELECT motorista, 
                      SUM(CASE WHEN ocorrencia = 'evasão' THEN 1 ELSE 0 END) as evasao,
                      SUM(CASE WHEN ocorrencia = 'Motorista não gira a roleta' THEN 1 ELSE 0 END) as nao_gira_roleta
                      FROM u219851065_AguiaAzul.ocorrencia_finalizada
                      GROUP BY motorista";
$result_evasao_roleta = $conn->query($sql_evasao_roleta);

// Verificar se a consulta teve sucesso
if (!$result_evasao_roleta) {
    die("Erro na consulta: " . $conn->error);
}

// Array para armazenar os dados das ocorrências de evasão e roleta
$data_evasao_roleta = array();

// Loop através dos resultados do banco de dados e adicionar ao array
while ($row = $result_evasao_roleta->fetch_assoc()) {
    $data_evasao_roleta[] = $row;
}

// Verificar se há dados
if (empty($data_graficos) || empty($data_motoristas) || empty($data_ocorrencias) || empty($data_evasao_roleta)) {
    die("Não foram encontrados dados.");
}

// Array para armazenar todos os dados
$data = array(
    'graficos' => $data_graficos,
    'motoristas' => $data_motoristas,
    'ocorrencias' => $data_ocorrencias,
    'evasao_roleta' => $data_evasao_roleta
);

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
