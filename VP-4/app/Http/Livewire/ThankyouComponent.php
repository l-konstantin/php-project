<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\News;
use Livewire\Component;

class ThankyouComponent extends Component
{
    public function render()
    {
        $categories = Category::all();
        $newsRandom = News::inRandomOrder()->limit(3)->get();

        return view('livewire.thankyou-component',[
            'categories' => $categories,
            'newsRandom' => $newsRandom
        ])->layout('layouts.main');
    }
}
