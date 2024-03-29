<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use Livewire\Component;
use Cart;

class IndexComponent extends Component
{
    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        $products = Product::paginate(6);
        $categories = Category::all();
        $news = News::paginate(3);
        $productOneRandom = Product::paginate(1);
        return view('livewire.index-component', [
            'products' => $products,
            'categories' => $categories,
            'news' => $news,
            'productOneRandom' => $productOneRandom
        ])->layout("layouts.main");
    }
}
