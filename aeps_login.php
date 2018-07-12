<?php



        $checkkey = "echkdkkd";  //checkkey
        $agentcode = "KS088";  //

        //generate checksum in php

        $now = new \DateTime();
        $ts = $now->getTimestamp();
        $ts = substr($ts, 0, 8); // returns "s"
        $data = "$agentcode|$ts";
        $decodedKey = pack("H*", $checkkey);
        $hmac = hash_hmac("sha512", $data, $decodedKey, TRUE);
        $signature = base64_encode($hmac);

        $checksum = "$signature";

        $parameters = array(
            'agentcode' => $agentcode,
            'checksum' => $checksum
        );

        $url = "https://www.pay2all.in/api/yesmoney/agent/login";

        $personal_access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImE4YzY0OGQ4YTgyYmIxMmMxYzBhZWVhMmFkNGM3ZWNjODE1OTRmMjVmYmVlNDE4MjNlYmE2ZGExNTUyNmU2YTYxYTIwZTE4Mjc5MzQ0MTcwIn0.eyJhdWQiOiI1IiwianRpIjoiYThjNjQ4ZDhhODJiYjEyYzFjMGFlZWEyYWQ0YzdlY2M4MTU5NGYyNWZiZWU0MTgyM2ViYTZkYTE1NTI2ZTZhNjFhMjBlMTgyNzkzNDQxNzAiLCJpYXQiOjE1MzEzOTgwMjcsIm5iZiI6MTUzMTM5ODAyNywiZXhwIjoxNTYyOTM0MDI3LCJzdWIiOiI5NDkiLCJzY29wZXMiOltdfQ.PKNPpvVwD09sSfFqT7tsdh2obBt-IVAfW__dVhoLOysJaf6pq1UxqE_tAPrycLwvjRxMqg_sXc0OJGp5Xkzdo0VRfR1tXBVb8tND8cwgkaweOU0VMIErpw5asTWGTjCqFd0z00MUG7cBT_tckehanZK3gbUi2f1L9-cO03QQtzlZC5tLmW_vyu39gzFT7jLbJrf-Sl6pDpOBrl0wMLwh16Wf4R3qXS2IHTP0kMCBnMfieFIMD_1eEDhNrp-7hgUge4juHiLrTvEToOZhpOedzsVQBnvJ9LzYsHXyfXa4_PXQ5U0xiFvyJjzPkqOI6nfyHK5_MLT1slC2pQ6oXRR-CeXIqgBUkyOVjc57v04vTDCZnjP1ZW0KCtlPUz8We8F2qljBsVB2CSNM_Gj5f2Q8Dc1MRdUsunk4GiaC6O7OATbw9m73q9S8hMAGkuMgLxTj1GeqHotu4h5XdESwd81Pf0KovgJC_1JrUMrFMRmaCkOCoHr8PXlUQ34MWBQs2Z4WFaob9bv7sBL57ZEZdM7c_EfEP5bdoVxdLI0Ov5_-Kt-h2R5SPJ4NlI8jAZHUERahjlFcggM0X5tLvvomifkPaFp34LFaT__c0Rln_F13DrB-aafO6gWmCaN_vozQnl6_25LuDyrbvVyhRgErCZ5jrjzSEJ0pSorZFhEpnOsk-1U"; //you have to add personal access token 

        $header = ["Accept:application/json", "Authorization:Bearer ".$personal_access_token];

        $method = 'POST';


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = curl_exec($ch);
        echo $response;  //[JSON RESPONSE]



?>
