<?php

namespace App\Livewire;

use Livewire\Component;

class Melted extends Component
{

    public $price;
    public $BuyPay = 0;
    public $BuyGet = 0;
    public $SellPay = 0;
    public $SellGet = 0;

    public function updatedBuyPay()
    {
        if ($this->BuyPay != '') {

            $this->BuyGet = $this->BuyPay / $this->price;
        }
    }

    public function updatedBuyGet()
    {
        if ($this->BuyGet != '') {
            $this->BuyPay = $this->BuyGet * $this->price;
        }
    }

    public function updatedSellPay()
    {
        if ($this->SellPay != '') {

            $this->SellGet = $this->SellPay / $this->price;
        }
    }

    public function updatedSellGet()
    {
        if ($this->SellGet != '') {
            $this->SellPay = $this->SellGet * $this->price;
        }
    }

    public function mount()
    {
        $this->price = 9;
    }

    public function render()
    {
        return view('livewire.melted');
    }
}
