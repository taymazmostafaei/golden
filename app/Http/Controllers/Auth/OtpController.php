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
}
