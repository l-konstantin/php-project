<div class="middle">
    <div class="main-content"><img src="{{ asset('img/slider.png') }}" alt="Image" class="image-main">
        <div class="content-middle">
            <div class="content-head__container">
                <div class="content-head__title-wrap">
                    <div class="content-head__title-wrap__title bcg-title">Добавить продукт</div>
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
                                                Добавить новый продукт
                                            </div>
                                            <div class="col-md-6">
                                                <a href="{{route('admin.products')}}" class="btn btn-success pull-right">Продукци</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        @if(Session::has('message'))
                                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                        @endif
                                        <form class="form-horizontal" wire:submit.prevent="addProduct">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Название продукта</label>
                                                <div class="col-md-4">
                                                    <input type="text" placeholder="Название продукта" class="form-control input-md" wire:model="product_name" wire:keyup="generateSlug"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Slug</label>
                                                <div class="col-md-4">
                                                    <input type="text" placeholder="Slug" class="form-control input-md" wire:model="product_slug"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Стоимоть продукта</label>
                                                <div class="col-md-4">
                                                    <input type="text" placeholder="Стоимость продукта" class="form-control input-md" wire:model="product_price"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Описание</label>
                                                <div class="col-md-4">
                                                    <textarea class="form-control input-md" wire:model="description"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Картинка</label>
                                                <div class="col-md-4">
                                                    <input type="file" class="input-field" wire:model="image"/>
                                                    @if($image)
                                                        <img src="{{$image->temporaryUrl()}}" width="120" />
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Категория продукта</label>
                                                <div class="col-md-4">
                                                    <select class="form-control" wire:model="category_id">
                                                        <option value="">Select Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label"></label>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
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
