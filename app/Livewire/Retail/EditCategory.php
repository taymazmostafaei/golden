<?php

namespace App\Livewire\Retail;

use App\Models\RetailCategory;
use Livewire\Component;

class EditCategory extends Component
{

    public $type;
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


        $this->dispatch('CloseEditCatModel');

        session()->flash('success', 'با موفقیت بروزرسانی شد.');
    }

    public function UpdateCatEditModal($id)
    {
        if (!$id) {
            return;
        }
        
        $rt = RetailCategory::find($id);
        $this->id = $rt->id;
        if ($this->type == 'edit') {
            $this->name = $rt->name;
            $this->desc = $rt->desc;
        }

    }

    public function create(RetailCategory $rt)
    {
        $this->validate();

        $rt->create([
            'parent_id' => $rt->id,
            'name' => $this->name,
            'desc' => $this->desc,
        ]);

        $this->dispatch('CloseEditCatModel');

        session()->flash('success', 'با موفقیت ساخته شد.');
    }

    public function render()
    {
        return view('livewire.retail.edit-category');
    }
}
