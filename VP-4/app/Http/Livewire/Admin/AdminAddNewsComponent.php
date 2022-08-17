<?php

namespace App\Http\Livewire\Admin;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddNewsComponent extends Component
{
    use WithFileUploads;
    public $news_name;
    public $news_slug;
    public $news_image;
    public $description;
    public $date;

    public function generateSlug()
    {
        $this->news_slug = Str::slug($this->news_name,'-');
    }

    public function addNews()
    {
        $news = new News();
        $news->news_name = $this->news_name;
        $news->news_slug = $this->news_slug;
        $news->description = $this->description;
        $news->date = $this->date;
        $imageName = Carbon::now()->timestamp . '.' . $this->news_image->extension();
        $this->news_image->storeAs('news',$imageName);
        $news->news_image = $imageName;
        $news->save();
        session()->flash('message','Новость успешно создана!');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-news-component')->layout('layouts.admin-main');
    }
}
