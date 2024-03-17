<?php

namespace App\Livewire\Retail;

use App\Models\RetailOrder;
use Livewire\Component;

class OrdersDetail extends Component
{

    public $order;
    public $is_admin = false;

    protected $listeners = ['UpdateOrderDetailModal' => 'setOrder'];


    public function setOrder(RetailOrder $RetailOrder)
    {
        $this->order = $RetailOrder;
    }

    public function deleteOrder(RetailOrder $RetailOrder)
    {
        $RetailOrder->delete();
        redirect(request()->header('Referer'))->with('success', 'سفارش مورد نظر با موفقیت لغو شد.');
    }

    public function completedOrder(RetailOrder $RetailOrder) {
        $RetailOrder->completed = true;
        $RetailOrder->save();
        redirect(request()->header('Referer'))->with('success', 'سفارش مورد نظر با موفقیت تکمیل شد.');
    }

    public function render()
    {
        return view('livewire.retail.orders-detail');
    }
}
