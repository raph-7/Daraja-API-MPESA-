<?php
//INCLUDE ACCESS TOKEN FILE 
include 'accessToken.php';
$registerUrl = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v2/registerurl';
$BusinessShortCode = '600978';
$confirmationUrl = 'https://www.schoolfit-uniforms.co.ke/darajaApi/confirmationUrl.php';
$validationUrl = 'https://www.schoolfit-unifotms.co.ke/darajaApi/validationUrl.php';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $registerUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
  'Content-Type:application/json',
  'Authorization:Bearer ' . $access_token
));
$data = array(
  'ShortCode' => $BusinessShortCode,
  'ResponseType' => 'Completed',
  'ConfirmationURL' => $confirmationUrl,
  'ValidationURL' => $validationUrl
);
$data_string = json_encode($data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
echo $curl_response = curl_exec($curl);