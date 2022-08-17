<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use Livewire\Component;

class CategoryComponent extends Component
{
    public $category_slug;

    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
    }

    public function render()
    {
        $categoryDetails = Category::where(['category_slug' => $this->category_slug])->first();
        $category_id = $categoryDetails->id;
        $category_name = $categoryDetails->category_name;
        $products = Product::where('category_id',$category_id)->paginate(6);
        $newsRandom = News::inRandomOrder()->limit(3)->get();

        $categories = Category::all();

        return view('livewire.category-component', [
            'categoryDetails' => $categoryDetails,
            'category_name' => $category_name,
            'products' => $products,
            'categories' => $categories,
            'newsRandom' => $newsRandom
        ])->layout('layouts.main');
    }
}
