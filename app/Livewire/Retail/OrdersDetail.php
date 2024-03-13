<?php

namespace App\Livewire\Retail;

use App\Models\RetailOrder;
use Livewire\Component;

class OrdersDetail extends Component
{

    public $order;

    protected $listeners = ['UpdateOrderDetailModal' => 'setOrder'];


    public function setOrder(RetailOrder $RetailOrder)
    {
        $this->order = $RetailOrder;
    }

    public function deleteOrder(RetailOrder $RetailOrder)
    {
        $RetailOrder->delete();
        redirect()->route('orders.index')->with('success', 'سفارش مورد نظر با موفقیت لغو شد.');
    }

    public function render()
    {
        return view('livewire.retail.orders-detail');
    }
}
