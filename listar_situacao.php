 <?php
//header('Content-Type: application/json; charset=utf-8');

//conexão bd
include_once "conexao.php";

        //query para recuperar registro do bd
        $query_sits = "SELECT id, email FROM tb_diagnostico ORDER BY nome_da_empresa ASC";
        // $query_sits = "SELECT id, nome  FROM tb_login WHERE id = 100 ORDER BY nome ASC";
        $result_sits = $conn->prepare($query_sits);
        $result_sits->execute();

        if(($result_sits) and ($result_sits->rowCount() != 0)){
            while($row_sit = $result_sits->fetch(PDO::FETCH_ASSOC)){
                extract($row_sit);
                $dados[]= [
                    'id'=> $id, 
                    
                    'email' =>$email
                ];
            }
            $retorna = ['status' => true, 'dados' => $dados];           
        }else{
            $retorna = ['status' => false, 'msg' => "<p style='color: #f00'> Erro: Nenhuma situação Encontrada</p>"];
        }

//echo json_encode($retorna);
die(json_encode($retorna));

  //  $nome_da_empresa = utf8_decode($row_sit["nome_da_empresa"]);
