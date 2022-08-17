<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use Livewire\Component;

class NewsDetailsComponent extends Component
{
    public $news_slug;

    public function mount($news_slug)
    {
        $this->news_slug = $news_slug;
    }

    public function render()
    {
        $newsDetails = News::where(['news_slug' => $this->news_slug])->first();
        $categories = Category::all();
        $newsRandom = News::inRandomOrder()->limit(3)->get();
        $productRandom = Product::inRandomOrder()->limit(3)->get();
        return view('livewire.news-details-component', [
            'newsDetails' => $newsDetails,
            'categories' => $categories,
            'newsRandom' => $newsRandom,
            'productRandom' => $productRandom
        ])->layout('layouts.main');
    }
}
