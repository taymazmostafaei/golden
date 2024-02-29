<?php

namespace App\Livewire\Retail;

use App\Models\RetailCategory;
use Livewire\Component;

class Category extends Component
{

    public $name;
    public $desc;

    protected $listeners = ['DeleteCategory' => 'DeleteCategory'];

    protected $rules = [
        'name' => 'required|min:3|max:35',
        'desc' => 'required|min:5|max:128',
    ];

    public function render()
    {
        return view('livewire.retail.category');
    }

    public function save()
    {
        $validatedData = $this->validate();
        RetailCategory::create($validatedData);

        $this->dispatch('ReloadDataTable');
        $this->dispatch('CloseNewCatModel');

        session()->flash('success', 'دسته بندی جدید ایجاد شد.');
    }

    public function DeleteCategory($id){
        RetailCategory::findOrFail($id)->delete();
    }
}
