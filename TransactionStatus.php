<?php
include 'accessToken.php';
include 'securityCredentials.php';
$TreansactionStatusUrl = 'https://sandbox.safaricom.co.ke/mpesa/transactionstatus/v1/query';
$InitiatorName = 'testapi';
$pass = "Safaricom123!!";
$TransactionID = "OEI2AK4Q16";
$BusinessShortCode = "174379";
$SecurityCredentials = 'securityCredentials.php';
$phone = "254708374149";
$OriginatorConversationID = 'd38e-47b6-a311-2b723935bf109908';
$request_data = array(
    'Initiator' => $InitiatorName,
    'SecurityCredential' => $SecurityCredentials,
    'CommandID' => 'TransactionStatusQuery',
    'TransactionID' => $TransactionID,
    'OriginatorConversationID' => $OriginatorConversationID,
    'PartyA' => 600990,
    'IdentifierType' => '4',
    'ResultURL' => 'https://www.schoolfit-uniforms.co.ke/darajaApi/ResultUrl.php',
    'QueueTimeOutURL' => 'https://www.schoolfit-uniforms.co.ke/darajaApi/QueueTimeOutUrl.php',
    'Remarks' => 'OK',
    'Occasion' => 'OK',
);
$data_string = json_encode($request_data);
$headers = array(
    'Content-Type: application/json',
    'Authorization:Bearer ' . $access_token
);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $TreansactionStatusUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
if (curl_errno($curl)) {
    echo 'Error: ' . curl_error($curl);
}
curl_close($curl);
echo $response;