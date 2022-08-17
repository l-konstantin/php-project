<?php

namespace App\Http\Livewire\Admin;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditNewsComponent extends Component
{
    use WithFileUploads;
    public $news_name;
    public $news_slug;
    public $news_image;
    public $description;
    public $date;
    public $newNewsImage;
    public $news_id;

    public function mount($news_slug)
    {
        $news = News::where('news_slug',$news_slug)->first();
        $this->news_name = $news->news_name;
        $this->news_slug = $news->news_slug;
        $this->news_image = $news->news_image;
        $this->description = $news->description;
        $this->date = $news->date;
        $this->news_id = $news->id;
    }

    public function generateSlug()
    {
        $this->news_slug = Str::slug($this->news_slug,'-');
    }

    public function updateNews()
    {
        $news = News::find($this->news_id);
        $news->news_name = $this->news_name;
        $news->news_slug = $this->news_slug;
        $news->description = $this->description;
        $news->date = $this->date;

        if($this->newNewsImage)
        {
            $imageName = Carbon::now()->timestamp . '.' . $this->newNewsImage->extension();
            $this->newNewsImage->storeAs('news',$imageName);
            $news->news_image = $imageName;
        }

        $news->save();
        session()->flash('message','Новость обновлена!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-news-component')->layout('layouts.admin-main');
    }
}
