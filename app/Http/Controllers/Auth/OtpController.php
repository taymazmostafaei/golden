<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class OtpController extends Controller
{
    // Property promotion in constructor
    public function __construct(public $phone)
    {
    }

    public function Send()
    {
        if (Cache::has($this->phone)) {
            #again old code
            $code = Cache::get($this->phone);
            return $code;
        }

        #new code
        $code = rand(100000, 999999);
        Cache::put($this->phone, $code, 120);
        $this->RequestSMS($this->phone, [(string)$code]);
        return $code;
    }

    public function Verify($code)
    {
        $cachedCode = Cache::get($this->phone);
        if ($code == $cachedCode) {
            return true;
        }

        return false;
    }

    public function RequestSMS($phone, $inputs = []){

        $url = 'https://console.melipayamak.com/api/send/shared/298d241d6a4546fa84d1ac29eed12bb9';
        $data = array('bodyId' => 221023, 'to' => (string)$phone, 'args' => $inputs);
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
