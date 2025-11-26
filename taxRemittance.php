<?php
include 'accessToken.php';
include 'securityCredentials.php';
$TaxRemittanceUrl = 'https://sandbox.safaricom.co.ke/mpesa/b2b/v1/remittax';
$BusinessShortCode = 600980;
$KRAShortCode = 572572; //Payment Registration Number given by KRA.
$request_data = array(
    'Initiator' => 'testapi',
    'SecurityCredential' => "securityCredentials.php",
    'CommandID' => 'PayTaxToKRA',
    'Amount' => 1,
    'PartyA' => $BusinessShortCode, //sender -US
    'PartyB' => $KRAShortCode, //receiver - KRA
    'SenderIdentifierType' => '4',
    'ReceiverIdentifierType' => '4',
    'AccountReference' => 353353,
    'ResultsURL' => 'https://www.schoolfit-uniforms.co.ke/public_html/darajaApi/ResultUrl.php',
    'QueueTimeOutURL' => 'https://www.schoolfit-uniforms.co.ke/public_html/darajaApi/QueueTimeOutUrl.php',
    'Remarks' => 'OK',
);
$data_string = json_encode($request_data);
$headers = array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $access_token
);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $TaxRemittanceUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);
echo $response;
?>


