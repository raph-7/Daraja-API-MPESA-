<?php
header('Content-Type: application/json');
$QueueTimeOutUrlCallbackResponse = file_get_contents('php://input');
$logFile = "QueueTimeOutUrl.json";
$log = fopen($logFile, 'a');
fwrite($log, $QueueTimeOutUrlCallbackResponse);
fclose($log);