<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\News;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;

class CheckoutComponent extends Component
{
    public $firstname;
    public $email;
    public $mobile;

    public $thankyou;

    public function placeOrder()
    {
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];

        $order->firstname = $this->firstname;
        $order->email = $this->email;
        $order->mobile = $this->mobile;
        $order->save();

        foreach (Cart::content() as $item)
        {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        $this->thankyou = 1;
        Cart::destroy();
        session()->forget('checkout');
    }

    public function verifyForCheckout()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        } else if ($this->thankyou){
            return redirect()->route('thankyou');
        } else if(!session()->get('checkout')) {
            return redirect()->route('product.cart');
        }
    }

    public function render()
    {
        $categories = Category::all();
        $newsRandom = News::inRandomOrder()->limit(3)->get();

        $this->verifyForCheckout();
        return view('livewire.checkout-component',[
            'categories' => $categories,
            'newsRandom' => $newsRandom
        ])->layout('layouts.main');
    }
}
