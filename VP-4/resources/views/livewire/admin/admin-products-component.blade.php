<div class="middle">
    <div class="main-content" style="flex: 0 auto;">
        <img src="{{ asset('img/slider.png') }}" alt="Image" class="image-main">
        <div class="content-middle">
            <div class="content-head__container">
                <div class="content-head__title-wrap">
                    <div class="content-head__title-wrap__title bcg-title">Все продукты</div>
                </div>
            </div>
            <div class="content-main__container">
                <div class="products-columns">
                    <div class="container" style="padding: 30px 0;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-6">
                                                Все продукты
                                            </div>
                                            <div class="col-md-6">
                                                <a href="{{route('admin.addproduct')}}" class="btn btn-success pull-right">Добавить продукт</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        @if(Session::has('message'))
                                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                        @endif
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Product Name</th>
                                                <th>Image</th>
                                                <th>Slug</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th style="width: 350px;">Description</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($products as $product)
                                                <tr>
                                                    <td>{{$product->id}}</td>
                                                    <td>{{$product->product_name}}</td>
                                                    <td>
                                                        <img src="{{asset('img/cover/products')}}/{{$product->image}}" width="100"/>
                                                    </td>
                                                    <td>{{$product->product_slug}}</td>
                                                    <td>{{$product->category_id}}</td>
                                                    <td>{{$product->product_price}}</td>
                                                    <td class="table_description" >{{$product->description}}</td>
                                                    <td>
                                                        <a href="{{route('admin.editproduct',['product_slug' => $product->product_slug])}}">
                                                            <i  class="fa fa-edit fa-2x"></i>
                                                        </a>
                                                        <a href="" wire:click.prevent="deleteProduct({{$product->id}})"  style="margin-left: 10px;">
                                                            <i class="fa fa-times fa-2x text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{$products->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-bottom"></div>
    </div>
</div>
