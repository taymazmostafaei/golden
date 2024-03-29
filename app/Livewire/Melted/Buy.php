<?php

namespace App\Livewire\Melted;

use App\Models\Melted;
use Livewire\Component;

class Buy extends Component
{
    public $pay = 0;
    public $obtain = 0;
    public $price;

    protected $rules = [
        'pay' => 'required|min:1',
        'obtain' => 'required|min:1',
    ];
    protected $listeners = [
        'saveBuy' => 'save'
    ];

    public function save()
    {
        $this->validate();

        Melted::create([

            'user_id' => auth()->user()->id,
            'type' => 'buy',
            'amount' => $this->pay,
            'grams' => $this->obtain,
            'price' => $this->price,
        ]);

        $this->dispatch('ReloadDataTable');
        session()->flash('success', 'سفارش جدید با موفقیت ایجاد شد.');
        
    }

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
