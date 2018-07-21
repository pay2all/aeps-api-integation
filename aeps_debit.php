<?php

//get method [if agent money transfer or other service then this url will be execute]

$agentcode=$_GET['agentcode'];
$servicetype=$_GET['servicetype'];
$amount=$_GET['amount'];
$number=$_GET['number'];
$orderid=$_GET['orderid'];

//Debit $amount from your Agent

$data = [
     'RESP_CODE' => 300,
     'RESPONSE' => "SUCCESS",
     'RESP_MSG' => 'Transaction Success'
];

echo json_encode($data);


?>