<?php
include 'accessToken.php';
include 'securityCredentials.php';
date_default_timezone_set('Africa/Nairobi');

$b2c_url = 'https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';
$InitiatorName = 'testapi';
$pass = "Safaricom123!!";
$BusinessShortCode = "600978";
$phone = "254708374149";
$amountsend = '10';
//$SecurityCredential ='lu2bZeaaRyas0Juglo+2OEs2K/IWEtyubiYFmYbC27+Au8IqVusI+ZiJh0dUNQzFhoaOlwK6tKOcfZNap3eQKLr3bN1dXSYIUH64YNISlQTJTmjVC2Fvvz969uAFG5d81wJZRk4i0utMUZuviyUlFTsMPLAgfcpOgYhjbUlyRbiaVXO3b8hEKxQ2o3kz0qtrypdZlaWmqniFESQLhSO85Ce5j0iQKaoZp6Isre7lhV+Au65N8L8LC1kAlHN1wdIfXUFnPOvZ7bm4keMuqIPHZzuvidKbckVc6i7qBcwf73DdfjQ9sf7thqgQO53VPHPLVv9EiW0xBUTuQzECYQ==';
$CommandID = 'SalaryPayment'; // SalaryPayment, BusinessPayment, PromotionPayment
$Amount = $amountsend;
$PartyA = $BusinessShortCode;
$PartyB = $phone;
$Remarks = 'Schoolfit Withdrawal';
$QueueTimeOutURL = 'https://www.schoolfit-uniforms.co.ke/darajaApi/b2cCallbackUrl.php';
$ResultURL = 'https://www.schoolfit-uniforms.co.ke/darajaApi/dataMaxcallbackUrl.php';
$Occasion = 'Online Payment';
/* Main B2C Request to the API */
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $b2c_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token]);
$curl_post_data = array(
    'InitiatorName' => $InitiatorName,
    'SecurityCredential' => $SecurityCredential,
    'CommandID' => $CommandID,
    'Amount' => $Amount,
    'PartyA' => $PartyA,
    'PartyB' => $PartyB,
    'Remarks' => $Remarks,
    'QueueTimeOutURL' => $QueueTimeOutURL,
    'ResultURL' => $ResultURL,
    'Occasion' => $Occasion
);
$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
$curl_response = curl_exec($curl);
echo $curl_response;