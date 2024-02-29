<?php

namespace App\Livewire\Retail;

use App\Models\RetailCategory;
use Livewire\Component;

class EditCategory extends Component
{

    public $id;
    public $name;
    public $desc;

    protected $rules = [
        'name' => 'required|min:3|max:35',
        'desc' => 'required|min:5|max:128',
    ];

    protected $listeners = ['UpdateCatEditModal' => 'UpdateCatEditModal'];

    public function update(RetailCategory $rt)
    {
        $this->validate();

        $rt->update([
            'name' => $this->name,
            'desc' => $this->desc,
        ]);

        $this->dispatch('ReloadDataTable');
        $this->dispatch('CloseEditCatModel');

        session()->flash('success', 'با موفقیت بروزرسانی شد.');
    }

    public function UpdateCatEditModal($id)
    {
        $rt = RetailCategory::find($id);
        $this->id = $rt->id;
        $this->name = $rt->name;
        $this->desc = $rt->desc;
    }

    public function render()
    {
        return view('livewire.retail.edit-category');
    }
}
