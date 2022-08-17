<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId,$qty);
    }

    public function checkout()
    {
        if (Auth::check())
        {
            return redirect()->route('checkout');
        } else {
            return redirect()->route('login');
        }
    }

    public function render()
    {
        $categories = Category::all();
        $newsRandom = News::inRandomOrder()->limit(3)->get();
        return view('livewire.cart-component',[
            'categories' => $categories,
            'newsRandom' => $newsRandom,
        ])->layout("layouts.main");
    }
}
