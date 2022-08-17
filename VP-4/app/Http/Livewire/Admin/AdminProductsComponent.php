<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductsComponent extends Component
{
    use WithPagination;

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        session()->flash('message','Продукт удален успешно!');
    }

    public function render()
    {
        $products = Product::paginate(15);
        return view('livewire.admin.admin-products-component',[
            'products' => $products
        ])->layout('layouts.admin-main');
    }
}
