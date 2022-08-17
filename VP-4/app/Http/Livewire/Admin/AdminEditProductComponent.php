<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $product_name;
    public $product_slug;
    public $image;
    public $product_price;
    public $description;
    public $category_id;
    public $newimage;
    public $product_id;

    public function mount($product_slug)
    {
        $product = Product::where('slug',$product_slug)->first();
        $this->product_name = $product->product_name;
        $this->product_slug = $product->product_slug;
        $this->image = $product->image;
        $this->product_price = $product->product_price;
        $this->description = $product->description;
        $this->category_id = $product->category_id;
        $this->product_id = $product->id;
    }

    public function generateSlug()
    {
        $this->product_slug = Str::slug($this->product_name,'-');
    }

    public function updateProduct()
    {
        $product = Product::find($this->product_id);
        $product->product_name = $this->product_name;
        $product->product_slug = $this->product_slug;
        $product->product_price = $this->product_price;
        $product->description = $this->description;

        if($this->newimage)
        {
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('products',$imageName);
            $product->image = $imageName;
        }

        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('message','Данные продукта обновлены!');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-edit-product-component',[
            'categories' => $categories
        ])->layout('layouts.admin-main');
    }
}
