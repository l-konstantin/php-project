<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $product_name;
    public $product_slug;
    public $image;
    public $product_price;
    public $description;
    public $category_id;

    public function generateSlug()
    {
        $this->product_slug = Str::slug($this->product_name,'-');
    }

    public function addProduct()
    {
        $product = new Product();
        $product->product_name = $this->product_name;
        $product->product_slug = $this->product_slug;
        $product->description = $this->description;
        $product->product_price = $this->product_price;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('products',$imageName);
        $product->image = $imageName;
        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('message','Продуст успешно создан!');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-add-product-component',[
            'categories' => $categories
        ])->layout('layouts.admin-main');
    }
}
