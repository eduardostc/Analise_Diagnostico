<?php
$form_empresa = $_POST["form_empresa"] ?? ""; 
$id = $_POST["id"] ?? "";
$form_email = $_POST["form_email"] ?? "";
$prompt = $_POST["prompt"] ?? "";

function enviar_dados(
    $form_empresa, 
    $id, 
    $form_email, 
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
                "form_email" => $form_email,
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
    $form_email !== "" OR
    $prompt !== "") {
    $result = enviar_dados(
        $form_empresa,  
        $id, 
        $form_email, 
        $prompt);
}

die(json_encode($result));
