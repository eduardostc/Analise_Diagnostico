<?php
header('Content-Type: application/json; charset=utf-8');

//conexão bd
include_once "conexao.php";

// Recuperar o lote selecionado
$lote = isset($_GET['lote']) ? $_GET['lote'] : null;

// Definir os meses com base nos lotes
$mesParaLote = [
    '1' => '07', // Lote 1 corresponde ao mês 07
    '2' => '11,12'  // Lote 2 corresponde ao mês 11
];

// Obter o mês correspondente ao lote selecionado
$mesSelecionado = $mesParaLote[$lote] ?? null;

if ($mesSelecionado) {
    // Construir a query para recuperar registros do bd com base no mês
    $query_sits = "SELECT id, nome_da_empresa FROM tb_diagnostico WHERE MONTH(data_submissao) = :mes ORDER BY nome_da_empresa ASC";
    $result_sits = $conn->prepare($query_sits);
    $result_sits->bindParam(':mes', $mesSelecionado, PDO::PARAM_INT);
    $result_sits->execute();

    if (($result_sits) and ($result_sits->rowCount() != 0)) {
        while ($row_sit = $result_sits->fetch(PDO::FETCH_ASSOC)) {
            extract($row_sit);
            $dados[] = [
                'id' => $id,
                'nome_da_empresa' => utf8_encode($nome_da_empresa)
            ];
        }
        $retorna = ['status' => true, 'dados' => $dados];
    } else {
        $retorna = ['status' => false, 'msg' => "<p style='color: #f00'> Erro: Nenhuma situação Encontrada</p>"];
    }
} else {
    $retorna = ['status' => false, 'msg' => "<p style='color: #f00'> Erro: Lote inválido</p>"];
}

die(json_encode($retorna));
?>
