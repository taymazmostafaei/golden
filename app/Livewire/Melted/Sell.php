<?php

namespace App\Livewire\Melted;

use App\Models\Melted;
use Livewire\Component;

class Sell extends Component
{
    public $pay = 0;
    public $obtain = 0;
    public $price;

    protected $listeners = [
        'saveSell' => 'save'
    ];

    protected $rules = [
        'pay' => 'required|min:1',
        'obtain' => 'required|min:1',
    ];

    public function save()
    {
        $this->validate();

        Melted::create([

            'user_id' => auth()->user()->id,
            'type' => 'sell',
            'amount' => $this->obtain,
            'grams' => $this->pay,
            'price' => $this->price,
        ]);

        $this->dispatch('ReloadDataTable');

        session()->flash('success', 'سفارش جدید با موفقیت ایجاد شد.');

    }

    public function updatedPay()
    {
        if ($this->pay != '') {

            $this->obtain = ($this->pay * 750 / 705 / 4.6082 * $this->price);
        }
    }

    public function updatedObtain()
    {
        if ($this->obtain != '') {

            $this->pay = ($this->obtain / 750 * 705 * 4.6082 / 170000);
        }
    }

    public function mount()
    {
        $this->price = 121500000;
    }

    public function render()
    {
        return view('livewire.melted.sell');
    }
}
