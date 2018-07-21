<?php

//credit URL will be in POST method

//below parameters will receive on every credit fucntion (example withdrawal)

$agentcode = $_POST['agentcode'];
$servicetype = $_POST['servicetype'];
$amount = $_POST['amount'];
$number = $_POST['number'];
$orderid = $_POST['orderid'];
$checksum = $_POST['checksum'];

//generate checksum for security purpose

$key = 'key provider by pay2all';
$data = "$agentcode|$orderid|$amount|$servicetype";
$decodedKey = pack("H*", $key);
$hmac = hash_hmac("sha512", $data, $decodedKey, TRUE);
$signature = base64_encode($hmac);

if($checksum == $signature){

    //Credit $amount to your agents 

    $data = [
        'RESP_CODE' => 300,
        'RESPONSE' => "SUCCESS",
        'RESP_MSG' => 'Transaction Success'
    ];

    echo json_encode($data);

}else{
    $data = [
        'RESP_CODE' => 302,
        'RESPONSE' => "FAILURE",
        'RESP_MSG' => 'checksum Not match'
    ];
}

?>
