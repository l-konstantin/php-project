<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use Livewire\Component;
use Cart;

class CategoryComponent extends Component
{
    public $category_slug;

    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
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
