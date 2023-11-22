<?php
$NomeDaEmpresa = $_POST["NomeDaEmpresa"] ?? ""; //-------------->1 
$id = $_POST["id"] ?? "";
$campo_pergunta = $_POST["campo_pergunta"] ?? "";
$prompt = $_POST["prompt"] ?? "";

function enviar_dados(
    $NomeDaEmpresa,  //-------------->2 
    $id, 
    $campo_pergunta, 
    $prompt) {
    $response = null;
    try {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://webhook-n8n-dev-conectarecife.recife.pe.gov.br/webhook/analiticodiagnostico',
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
                "campo_pergunta" => $campo_pergunta,
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
    $campo_pergunta !== "" OR 
    $prompt !== "") {
    $result = enviar_dados(
        $NomeDaEmpresa,  //-------------->5
        $id,
        $campo_pergunta,
        $prompt);
}

die(json_encode($result));
