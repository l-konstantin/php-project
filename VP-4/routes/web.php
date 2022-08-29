<?php

use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddNewsComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminEditNewsComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminNewsComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\Admin\AdminProductsComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailComponent;
use App\Http\Livewire\IndexComponent;
use App\Http\Livewire\NewsComponent;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\NewsDetailsComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\User\UserOrderComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', IndexComponent::class);
Route::get('/category/{category_slug}', CategoryComponent::class)->name('category.details');
Route::get('/product/{product_slug}',DetailComponent::class)->name('product.details');
Route::get('/news', NewsComponent::class);
Route::get('/news/{news_slug}', NewsDetailsComponent::class)->name('news.details');
Route::get('/about', AboutComponent::class);
Route::get('/cart', CartComponent::class)->name('product.cart');
Route::get('/checkout',CheckoutComponent::class)->name('checkout');
Route::get('/thank-you',ThankyouComponent::class)->name('thankyou');

//for user
Route::middleware(['auth:sanctum','verified'])->group(function() {
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
    //my orders
    Route::get('/user/orders',UserOrderComponent::class)->name('user.orders');
    Route::get('/user/orders/{order_id}',UserOrderDetailsComponent::class)->name('user.orderdetails');
});

//for admin
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function() {
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    //category
    Route::get('/admin/categories',AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add',AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}',AdminEditCategoryComponent::class)->name('admin.editcategory');
    //product
    Route::get('/admin/products',AdminProductsComponent::class)->name('admin.products');
    Route::get('/admin/product/add',AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_slug}',AdminEditProductComponent::class)->name('admin.editproduct');
    //news
    Route::get('/admin/news',AdminNewsComponent::class)->name('admin.news');
    Route::get('/admin/news/add',AdminAddNewsComponent::class)->name('admin.addnews');
    Route::get('/admin/news/edit/{news_slug}',AdminEditNewsComponent::class)->name('admin.editnews');
    //orders
    Route::get('admin/orders',AdminOrderComponent::class)->name('admin.orders');
    Route::get('admin/orders/{order_id}',AdminOrderDetailsComponent::class)->name('admin.orderdetails');
});
