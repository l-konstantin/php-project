<?php

namespace App\Http\Livewire\User;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDashboardComponent extends Component
{
    public function render()
    {
        $categories = Category::all();
        $newsRandom = News::inRandomOrder()->limit(3)->get();

        return view('livewire.user.user-dashboard-component',[
            'categories' => $categories,
            'newsRandom' => $newsRandom,
        ])->layout('layouts.main');
    }
}
