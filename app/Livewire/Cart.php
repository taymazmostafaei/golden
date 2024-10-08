<?php

namespace App\Livewire;

use App\Models\Retail;
use App\Models\RetailOrder;
use App\Models\RetailOrderDetail;
use App\Models\Setting;
use App\Services\TelegramService;
use Darryldecode\Cart\Facades\CartFacade;
use Livewire\Component;

class Cart extends Component
{
    protected $listeners = [
        'addToCart' => 'add',
        'saveCart' => 'save'
    ];

    public $cart;
    public $cartTotal;
    public $quantity;
    public $descriptions = [];

    public function add(Retail $retail, $size)
    {
        //$size = $size * 1;
        $retail->size = $size;
        CartFacade::session(auth()->user()->id)->add([
            'id' => $retail->id,
            'name' => $retail->name,
            'price' => $size,
            'quantity' => 1,
            'associatedModel' => $retail
        ]);
        $this->dispatch('AlertUser', type: 'success', title: 'به سبد خرید اضافه شد');
    }

    public function increment(Retail $retail)
    {
        CartFacade::session(auth()->user()->id)->update($retail->id, array(
            'quantity' => 1,
        ));
    }

    public function decrement(Retail $retail)
    {
        CartFacade::session(auth()->user()->id)->update($retail->id, array(
            'quantity' => -1,
        ));
    }

    public function remove(Retail $retail)
    {
        CartFacade::session(auth()->user()->id)->remove($retail->id);
    }

    public function save()
    {
        if (!(Setting::where('key', 'retail')->first())->value) {
            abort(403 , 'امکان ثبت سفارش فعلا وجود ندارد');
            // return redirect()->back()->withErrors('fail', '');
        }

        $retailOrder = RetailOrder::create([
            'user_id' => auth()->user()->id,
            'items_count' => $this->quantity,
            'full_price' => $this->cartTotal
        ]);
        
        foreach ($this->cart as $item) {

            $retailOrderDetail = RetailOrderDetail::create([
                'retail_order_id' => $retailOrder->id ,
                'retail_id' => $item->id ,
                'price' => 1 ,
                'quantity' => $item->quantity ,
                'size' => $item->price ,
                'description' => isset($this->descriptions[$item->id]) ? $this->descriptions[$item->id] : null
            ]);
        }

        CartFacade::session(auth()->user()->id)->clear();
        (new TelegramService())->sendMessage("سفارش جدید در بنک داری ثبت شد.");
        $this->dispatch('AlertUser', type: 'success', title: 'سفارش شما با موفقیت ثبت شد.');
    }

    public function cartSubmit(){
        $this->dispatch('SaveCartSwal');
    }

    public function render()
    {
        $userId = auth()->user()->id;
        $this->cart = CartFacade::session($userId)->getContent();
        $this->cartTotal = CartFacade::session($userId)->getTotal();
        $this->quantity = CartFacade::session(auth()->user()->id)->getTotalQuantity();
        $this->dispatch('UpdateCartCounter', quantity: $this->quantity);
        return view('livewire.cart');
    }
}
