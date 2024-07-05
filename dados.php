<?php
// Configurações de conexão
$servername = "localhost";
$username = "u219851065_admin_porto";
$password = "Xavier364074$";
$dbname = "u219851065_AguiaAzul";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Função para retornar uma query em forma de array
function queryToArray($conn, $sql) {
    $result = $conn->query($sql);
    $data = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

// Consulta para os dados dos gráficos
$sqlGraficos = "SELECT ocorrencia, acao FROM registro_ocorrencias";
$dataGraficos = queryToArray($conn, $sqlGraficos);

// Consulta para a lista dos motoristas com mais ocorrências
$sqlMotoristas = "
SELECT motorista, COUNT(*) AS total_ocorrencias
FROM registro_ocorrencias
GROUP BY motorista
ORDER BY total_ocorrencias DESC
";
$dataMotoristas = queryToArray($conn, $sqlMotoristas);

// Consulta para a lista de ocorrências por tipo
$sqlOcorrencias = "
SELECT ocorrencia, COUNT(*) AS total_ocorrencias
FROM registro_ocorrencias
GROUP BY ocorrencia
";
$dataOcorrencias = queryToArray($conn, $sqlOcorrencias);

// Consulta para a lista de motoristas com evasão e não gira roleta
$sqlEvasaoRoleta = "
SELECT motorista,
SUM(CASE WHEN ocorrencia = 'Evasão' THEN 1 ELSE 0 END) AS evasao,
SUM(CASE WHEN ocorrencia = 'Motorista não gira a roleta' THEN 1 ELSE 0 END) AS nao_gira_roleta,
SUM(CASE WHEN ocorrencia IN ('Evasão', 'Motorista não gira a roleta') THEN 1 ELSE 0 END) AS total_geral
FROM registro_ocorrencias
GROUP BY motorista
HAVING total_geral > 0
ORDER BY total_geral DESC
";
$dataEvasaoRoleta = queryToArray($conn, $sqlEvasaoRoleta);

// Fechar a conexão
$conn->close();

// Junta todos os dados em um array associativo
$data = array(
    "graficos" => $dataGraficos,
    "motoristas" => $dataMotoristas,
    "ocorrencias" => $dataOcorrencias,
    "evasao_roleta" => $dataEvasaoRoleta
);

// Converte para JSON e imprime
header('Content-Type: application/json');
echo json_encode($data);
?>