<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use Livewire\Component;
use Cart;

class DetailComponent extends Component
{
    public $product_slug;

    public function mount($product_slug)
    {
        $this->product_slug = $product_slug;
    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        $productDetail = Product::where('product_slug', $this->product_slug)->first();
        $productRandom = Product::paginate(3);
        $categories = Category::all();

        $category_id = $productDetail->category_id;
        $category_name = "";
        if($category_id == 1) {
            $category_name = "Action";
        } else if ($category_id == 2) {
            $category_name = "RPG";
        } else if($category_id == 3) {
            $category_name = "Квесты";
        } else if($category_id == 4) {
            $category_name = "Онлайн-игры";
        } else if($category_id == 5) {
            $category_name = "Стратегии";
        } else {
            echo "Нет такой категории";
        }

        $newsRandom = News::inRandomOrder()->limit(3)->get();
        return view('livewire.detail-component',[
            'productDetail' => $productDetail,
            'productRandom' => $productRandom,
            'categories' => $categories,
            'category_name' => $category_name,
            'newsRandom' => $newsRandom
        ])->layout('layouts.main');
    }
}
