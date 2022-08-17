<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\News;
use Livewire\Component;

class NewsComponent extends Component
{
    public function render()
    {
        $newsAll = News::paginate(2);
        $categories = Category::all();
        $newsRandom = News::inRandomOrder()->limit(3)->get();
        return view('livewire.news-component',[
            'newsAll' => $newsAll,
            'categories' => $categories,
            'newsRandom' => $newsRandom
        ])->layout("layouts.main");
    }
}
