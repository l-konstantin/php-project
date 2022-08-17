<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminEditCategoryComponent extends Component
{
    public $category_slug;
    public $category_id;

    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
        $category = Category::where('category_slug',$category_slug)->first();
        $this->category_id = $category->id;
        $this->category_name = $category->category_name;
        $this->category_slug = $category->category_slug;
        $this->description = $category->description;
    }

    public function generateSlug()
    {
        $this->category_slug = Str::slug($this->category_name);
    }

    public function updateCategory()
    {
        $category = Category::find($this->category_id);
        $category->category_name = $this->category_name;
        $category->category_slug = $this->category_slug;
        $category->description = $this->description;
        $category->save();
        session()->flash('message','Категория была успешно обновлена!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-category-component')->layout('layouts.admin-main');
    }
}
