<div class="middle">
    <div class="main-content" style="flex: 0 auto;">
        <img src="{{ asset('img/slider.png') }}" alt="Image" class="image-main">
        <div class="content-middle">
            <div class="content-head__container">
                <div class="content-head__title-wrap">
                    <div class="content-head__title-wrap__title bcg-title">Все новости</div>
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
                                                Все новости
                                            </div>
                                            <div class="col-md-6">
                                                <a href="{{route('admin.addnews')}}" class="btn btn-success pull-right">Добавить новость</a>
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
                                                <th>News Name</th>
                                                <th>Image</th>
                                                <th>Slug</th>
                                                <th>Date</th>
                                                <th style="width: 350px;">Description</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($news as $article)
                                                <tr>
                                                    <td>{{$article->id}}</td>
                                                    <td>{{$article->news_name}}</td>
                                                    <td>
                                                        <img src="{{asset('img/cover/news')}}/{{$article->news_image}}" width="100"/>
                                                    </td>
                                                    <td>{{$article->news_slug}}</td>
                                                    <td>{{$article->date}}</td>
                                                    <td class="table_description" >{{$article->description}}</td>
                                                    <td>
                                                        <a href="{{route('admin.editnews',['news_slug'=>$article->news_slug])}}">
                                                            <i  class="fa fa-edit fa-2x"></i>
                                                        </a>
                                                        <a href="" style="margin-left: 10px;">
                                                            <i class="fa fa-times fa-2x text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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
