<?php

    $host = '172.21.0.158:3306';
    $user = 'n8nworkflow';
    $password = 'Xncnoswo3834s09210sjkq3jhdsjxjf';
    $dbname = 'db_n8n_workflow';

    global $pdo;
 
    //CONEXÃO MODELO PDO É ORIENTADO OBJETO
    try{
        $conn = new PDO("mysql:dbname=".$dbname. "; host=".$host, $user, $password);
       // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "Conexão com BD com sucesso";
    }catch(PDOException $e){
        echo "Erro: ".$e->getMessage();
        exit;
    }
