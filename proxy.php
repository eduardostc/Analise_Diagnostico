<?php
$form_empresa = $_POST["form_empresa"] ?? ""; 
$id = $_POST["id"] ?? "";
$prompt = $_POST["prompt"] ?? "";

function enviar_dados(
    $form_empresa, 
    $id, 
    $prompt) {
    $response = null;
    try {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://n8n-dev-conectarecife.recife.pe.gov.br/webhook-test/analitico',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => [
                "form_empresa" => $form_empresa,//AMBIENTE
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
    $form_empresa !== "" OR
    $id !== "" OR 
    $prompt !== "") {
    $result = enviar_dados(
        $form_empresa,  
        $id, 
        $prompt);
}

die(json_encode($result));
