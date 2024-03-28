<?php

namespace App\Livewire\Melted;

use Livewire\Component;

class Buy extends Component
{
    public $pay = 0;
    public $obtain = 0;
    public $price;

    public function updatedPay()
    {
        if ($this->pay != '') {

            $this->obtain = $this->pay / $this->price;
        }
    }

    public function updatedObtain()
    {
        if ($this->obtain != '') {

            $this->pay = $this->obtain * $this->price;
        }
    }

    public function mount()
    {
        $this->price = 9;
    }

    public function render()
    {
        return view('livewire.melted.buy');
    }
}
