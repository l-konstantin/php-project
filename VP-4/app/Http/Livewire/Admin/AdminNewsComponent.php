<?php

namespace App\Http\Livewire\Admin;

use App\Models\News;
use Livewire\Component;

class AdminNewsComponent extends Component
{
    public function render()
    {
        $news = News::all();
        return view('livewire.admin.admin-news-component',[
            'news' => $news
        ])->layout('layouts.admin-main');
    }
}
