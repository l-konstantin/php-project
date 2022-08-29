<?php

namespace App\Http\Livewire\User;

use App\Models\Category;
use App\Models\News;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserOrderComponent extends Component
{
    public function render()
    {
        $orders = Order::where('user_id',Auth::user()->id)->paginate(10);
        $categories = Category::all();
        $newsRandom = News::inRandomOrder()->limit(3)->get();
        return view('livewire.user.user-order-component',[
            'orders' => $orders,
            'categories' => $categories,
            'newsRandom' => $newsRandom
        ])->layout('layouts.main');
    }
}
