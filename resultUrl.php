<?php
header('Content-Type: application/json');
$QueueTimeOutURLCallbackResponse = file_get_contents('php://input');
$logfile = 'ResultUrl.json';
$log = fopen($logfile, 'a');
fwrite($log, $QueueTimeOutURLCallbackResponse);
fclose($log);