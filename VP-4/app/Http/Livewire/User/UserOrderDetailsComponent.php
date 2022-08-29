<?php

namespace App\Http\Livewire\User;

use App\Models\Category;
use App\Models\News;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserOrderDetailsComponent extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function render()
    {
        $order = Order::where('user_id',Auth::user()->id)->where('id',$this->order_id)->first();
        $categories = Category::all();
        $newsRandom = News::inRandomOrder()->limit(3)->get();

        return view('livewire.user.user-order-details-component',[
            'order' => $order,
            'categories' => $categories,
            'newsRandom' => $newsRandom
        ])->layout('layouts.main');
    }
}
