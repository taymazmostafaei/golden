<?php

namespace App\Livewire;

use App\Models\Retail;
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

    public function add(Retail $retail)
    {
        CartFacade::session(auth()->user()->id)->add([
            'id' => $retail->id,
            'name' => $retail->name,
            'price' => $retail->price,
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
        dd('lets save');
    }

    public function cartSubmit(){
        $this->dispatch('SaveCartSwal');
    }

    public function render()
    {
        $userId = auth()->user()->id;
        $this->cart = CartFacade::session($userId)->getContent();
        $this->cartTotal = CartFacade::session($userId)->getTotal();
        $quantity = CartFacade::session(auth()->user()->id)->getTotalQuantity();
        $this->dispatch('UpdateCartCounter', quantity: $quantity);
        return view('livewire.cart');
    }
}
