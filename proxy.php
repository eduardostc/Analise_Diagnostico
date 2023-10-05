<?php
$NomeDaEmpresa = $_POST["NomeDaEmpresa"] ?? ""; //-------------->1 
$id = $_POST["id"] ?? "";
$prompt = $_POST["prompt"] ?? "";

function enviar_dados(
    $NomeDaEmpresa,  //-------------->2 
    $id, 
    $prompt) {
    $response = null;
    try {
        $curl = curl_init();
        curl_setopt_array($curl, array(
           // CURLOPT_URL => 'https://n8n-dev-conectarecife.recife.pe.gov.br/webhook/analitico',
            CURLOPT_URL => 'https://n8n-dev-conectarecife.recife.pe.gov.br/webhook-test/analitico',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => [
                "NomeDaEmpresa" => $NomeDaEmpresa, //-------------->3
                "id" => $id,
                "prompt" => $prompt
            ],
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response, true);
    } catch (\Throwable $th) {
        //throw $th;
    }
    return $response;
}

$result = ["result" => null];

if (
    $NomeDaEmpresa !== "" OR //-------------->4
    $id !== "" OR 
    $prompt !== "") {
    $result = enviar_dados(
        $NomeDaEmpresa,  //-------------->5
        $id,
        $prompt);
}

die(json_encode($result));
