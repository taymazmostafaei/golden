<?php

namespace App\Services;

class SmsService
{

    public function RequestSMS($bodyId ,$phone, $inputs = []){

        $url = 'https://console.melipayamak.com/api/send/shared/298d241d6a4546fa84d1ac29eed12bb9';
        $data = array('bodyId' => $bodyId, 'to' => (string)$phone, 'args' => $inputs);
        $data_string = json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string)
            )
        );
        $result = curl_exec($ch);
        curl_close($ch);
        //to debug
        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        }
    }
}
