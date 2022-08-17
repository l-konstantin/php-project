<div class="middle">
    <div class="main-content"><img src="{{ asset('img/slider.png') }}" alt="Image" class="image-main">
        <div class="content-middle">
            <div class="content-head__container">
                <div class="content-head__title-wrap">
                    <div class="content-head__title-wrap__title bcg-title">Добавить новость</div>
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
                                                Добавить новость
                                            </div>
                                            <div class="col-md-6">
                                                <a href="{{route('admin.news')}}" class="btn btn-success pull-right">Новости</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        @if(Session::has('message'))
                                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                        @endif
                                        <form class="form-horizontal" wire:submit.prevent="addNews">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Название новости</label>
                                                <div class="col-md-4">
                                                    <input type="text" placeholder="Название новости" class="form-control input-md" wire:model="news_name" wire:keyup="generateSlug"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Slug</label>
                                                <div class="col-md-4">
                                                    <input type="text" placeholder="Slug" class="form-control input-md" wire:model="news_slug"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Описание</label>
                                                <div class="col-md-4">
                                                    <textarea class="form-control input-md" wire:model="description"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Date</label>
                                                <div class="col-md-4">
                                                    <input type="text" placeholder="Date" class="form-control input-md" wire:model="date"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Картинка</label>
                                                <div class="col-md-4">
                                                    <input type="file" class="input-field" wire:model="news_image"/>
                                                    @if($news_image)
                                                        <img src="{{$news_image->temporaryUrl()}}" width="120" />
                                                    @endif
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
