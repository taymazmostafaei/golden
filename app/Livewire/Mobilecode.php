<?php

namespace App\Livewire;

use App\Http\Controllers\Auth\OtpController;
use Livewire\Component;

class Mobilecode extends Component
{
    public $mobile;

    public function render()
    {
        return view('livewire.mobilecode');
    }

    public function SendNewCode(){
        $otp = new OtpController($this->mobile);
        $code = $otp->Send();
        $this->dispatch('displayDivAfter120Seconds');
    }
}
