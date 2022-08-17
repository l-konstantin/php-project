<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use Livewire\Component;

class AboutComponent extends Component
{
    public function render()
    {
        $categories = Category::all();
        $newsRandom = News::inRandomOrder()->limit(3)->get();
        $productRandom = Product::inRandomOrder()->limit(3)->get();
        return view('livewire.about-component',[
            'categories' => $categories,
            'newsRandom' => $newsRandom,
            'productRandom' => $productRandom
        ])->layout("layouts.main");
    }
}
