<?php

namespace App\Livewire\Melted;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Melted as MeltedModel;
use App\Models\Setting;

class Melted extends Component
{
    #[Validate('integer')] 
    public int $grams = 0;

    #[Validate('integer')] 
    public int $amount = 0;

    public $buyPrice = 0;
    public $sellPrice = 0;
    public $buyGrams = 0;
    public $sellGrams = 0;

    public $bprice;
    public $sprice;

    public $trade_limit;

    protected $listeners = [
        'saveBuy' => 'buy',
        'saveSell' => 'sell',
    ];

    public function buy()
    {
        if (!(Setting::where('key', 'melted')->first())->value) {
            abort(403 , 'امکان ثبت سفارش فعلا وجود ندارد');
            // return redirect()->back()->withErrors('fail', '');
        }

        $validated = $this->validate();

        
        if ($this->grams > $this->trade_limit or $this->buyGrams > $this->trade_limit ) {
            abort(403 , 'امکان سفارش بیشتر از گرم مجاز وجود ندارد.');
            // return redirect()->back()->withErrors('fail', '');
        }

        if ($this->grams == 0) {

            if ($this->amount == 0) {
                return;
            }
            MeltedModel::create([

                'user_id' => auth()->user()->id,
                'type' => 'buy',
                'amount' => $this->amount * 1000000,
                'grams' => $this->buyGrams,
                'price' => $this->bprice,
            ]);
        } else {

            if ($this->grams == 0) {
                return;
            }
            MeltedModel::create([

                'user_id' => auth()->user()->id,
                'type' => 'buy',
                'amount' => $this->buyPrice,
                'grams' => $this->grams,
                'price' => $this->bprice,
            ]);
        }


        $this->dispatch('ReloadDataTable');
        session()->flash('success', 'سفارش جدید با موفقیت ایجاد شد.');
    }

    public function sell()
    {
        if (!(Setting::where('key', 'melted')->first())->value) {
            abort(403 , 'امکان ثبت سفارش فعلا وجود ندارد');
            // return redirect()->back()->withErrors('fail', '');
        }
        $validated = $this->validate();

        if ($this->grams > $this->trade_limit or $this->buyGrams > $this->trade_limit ) {
            abort(403 , 'امکان سفارش بیشتر از گرم مجاز وجود ندارد.');
            // return redirect()->back()->withErrors('fail', '');
        }

        if ($this->grams == 0) {

            if ($this->amount == 0) {
                return;
            }
            MeltedModel::create([

                'user_id' => auth()->user()->id,
                'type' => 'sell',
                'amount' => $this->amount * 1000000,
                'grams' => $this->sellGrams,
                'price' => $this->sprice,
            ]);
        } else {
            
            if ($this->grams == 0) {
                return;
            }
            MeltedModel::create([

                'user_id' => auth()->user()->id,
                'type' => 'sell',
                'amount' => $this->sellPrice,
                'grams' => $this->grams,
                'price' => $this->sprice,
            ]);
        }

        $this->dispatch('ReloadDataTable');
        session()->flash('success', 'سفارش جدید با موفقیت ایجاد شد.');
    }

    public function updatedGrams()
    {
        if (!isset($this->grams)) {
            return;
        }
        $this->amount = 0;

        # formul here
        $this->buyPrice = ($this->bprice / 10) * $this->grams;
        $this->sellPrice = ($this->sprice / 10) * $this->grams;
    }

    public function updatedAmount()
    {
        if (!isset($this->amount)) {
            return;
        }
        $this->grams = 0;

        # formul here
        $this->buyGrams = $this->amount * 1000000 / ($this->bprice / 10);
        $this->sellGrams = $this->amount * 1000000 / ($this->sprice / 10);
    }

    public function increaseAmount()
    {
        $this->amount = $this->amount + 100;
        $this->updatedAmount();
    }

    public function decreaseAmount()
    {
        if ($this->amount == 0) {
            return;
        }
        $this->amount = $this->amount - 100;
        $this->updatedAmount();
    }

    public function increaseGrams()
    {
        $this->grams = $this->grams + 50;
        $this->updatedGrams();
    }

    public function decreaseGrams()
    {
        if ($this->grams == 0) {
            return;
        }
        $this->grams = $this->grams - 50;
        $this->updatedGrams();
    }

    public function mount()
    {
        $this->bprice = (Setting::where('key', 'buy_price')->first())->value;
        $this->sprice = (Setting::where('key', 'sell_price')->first())->value;
        $this->trade_limit = auth()->user()->trade_limit;
    }

    public function render()
    {
        return view('livewire.melted.melted');
    }
}
