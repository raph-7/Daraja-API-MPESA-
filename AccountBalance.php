<?php
include 'accessToken.php';
include 'securityCredentials.php';
$AccountBalanceUrl = 'https://sandbox.safaricom.co.ke/mpesa/accountbalance/v1/query';
$InitiatorName = 'testapi';
$pass = ""; 
$BusinessShortCode = "600995"; 
$request_data = array(
    'Initiator' => $InitiatorName,
    'SecurityCredential' => 'securityCredentials.php',
    'CommandID' => 'AccountBalance',
    'PartyA' => $BusinessShortCode,
    'IdentifierType' => '4',
    'Remarks' => 'ok',
    'QueueTimeOutURL' => 'https://www.schoolfit-uniforms.co.ke/public_html/darajaApi/QueueTimeOutUrl.php',
    'ResultURL' => 'https://www.schoolfit-uniforms.co.ke/public_html/darajaApi/ResultUrl.php',
);
$data_string = json_encode($request_data);
$headers = array(
    'Content-Type: application/json',
    'Authorization:Bearer ' . $access_token
);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $AccountBalanceUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);
echo $response;
?>