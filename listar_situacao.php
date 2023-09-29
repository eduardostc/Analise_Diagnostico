<?php
header('Content-Type: application/json; charset=utf-8');

//conexão bd
include_once "conexao.php";
        //query para recuperar registro do bd
        $query_sits = "SELECT id, nome_da_empresa, atividade_da_empresa, faturamento_anual_da_empresa, maior_faturamento_Jan FROM tb_diagnostico ORDER BY nome_da_empresa ASC";
        // $query_sits = "SELECT id, nome  FROM tb_login WHERE id = 100 ORDER BY nome ASC";
        $result_sits = $conn->prepare($query_sits);
        $result_sits->execute();

        if(($result_sits) and ($result_sits->rowCount() != 0)){
            while($row_sit = $result_sits->fetch(PDO::FETCH_ASSOC)){
                extract($row_sit);
                $dados[]= [
                    'id'=> $id, 
                    'nome_da_empresa'=>utf8_encode($nome_da_empresa),
                    'atividade_da_empresa'=>utf8_encode($atividade_da_empresa),
                    'faturamento_anual_da_empresa'=>utf8_encode($faturamento_anual_da_empresa),
                    'maior_faturamento_Jan'=>utf8_encode($maior_faturamento_Jan)
                ];
            }
            $retorna = ['status' => true, 'dados' => $dados];           
        }else{
            $retorna = ['status' => false, 'msg' => "<p style='color: #f00'> Erro: Nenhuma situação Encontrada</p>"];
        }
die(json_encode($retorna));

