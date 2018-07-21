<?php

//credit URL will be in POST method

//below parameters will receive on every credit fucntion (example withdrawal)

$agentcode = $_POST['agentcode'];
$servicetype = $_POST['servicetype'];
$amount = $_POST['amount'];
$number = $_POST['number'];
$orderid = $_POST['orderid'];
$checksum = $_POST['checksum'];

//Credit $amount to your agents 

$data = [
     'RESP_CODE' => 300,
     'RESPONSE' => "SUCCESS",
     'RESP_MSG' => 'Transaction Success'
];

echo json_encode($data);


?>
