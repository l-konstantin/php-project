<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminAddCategoryComponent extends Component
{
    public $category_name;
    public $category_slug;
    public $description;

    public function generateSlug()
    {
        $this->category_slug = Str::slug($this->category_name);
    }

    public function storeCategory()
    {
        $category = new Category();
        $category->category_name = $this->category_name;
        $category->category_slug = $this->category_slug;
        $category->description = $this->description;
        $category->save();
        session()->flash('message','Категория успешно добавлена');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.admin-main');
    }
}
