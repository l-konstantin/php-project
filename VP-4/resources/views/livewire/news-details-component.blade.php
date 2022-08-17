<div class="middle">
    <div class="sidebar">
        <div class="sidebar-item">
            <div class="sidebar-item__title">Категории</div>
            <div class="sidebar-item__content">
                <ul class="sidebar-category">
                    @foreach($categories as $category)
                        <li class="sidebar-category__item">
                            <a href="{{route('category.details',['category_slug' => $category->category_slug])}}" class="sidebar-category__item__link">{{$category->category_name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="sidebar-item">
            <div class="sidebar-item__title">Последние новости</div>
            <div class="sidebar-item__content">
                <div class="sidebar-news">
                    @foreach($newsRandom as $r_news)
                        <div class="sidebar-news__item">
                            <div class="sidebar-news__item__preview-news">
                                <img src="{{asset('img/cover/news')}}/{{$r_news->news_image}}" alt="{{$r_news->news_name}}" class="sidebar-new__item__preview-new__image">
                            </div>
                            <div class="sidebar-news__item__title-news">
                                <a href="{{route('news.details',['news_slug'=>$r_news->news_slug])}}" class="sidebar-news__item__title-news__link">{{$r_news->news_name}}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="content-top">
            <div class="content-top__text">Купить игры неборого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</div>
            <div class="slider"><img src="{{asset('img/slider.png')}}" alt="Image" class="image-main"></div>
        </div>
        <div class="content-middle">
            <div class="content-head__container">
                <div class="content-head__title-wrap">
                    <div class="content-head__title-wrap__title bcg-title">Новости</div>
                </div>
                <div class="content-head__search-block">
                    <div class="search-container">
                        <form class="search-container__form">
                            <input type="text" class="search-container__form__input">
                            <button class="search-container__form__btn">search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="content-main__container">
                <div class="news-block content-text">
                    <h3 class="content-text__title">{{$newsDetails->news_name}}</h3>
                    <img src="{{asset('img/cover/news')}}/{{$newsDetails->news_image}}" alt="Image" class="alignleft img-news">
                    <p>
                        {{$newsDetails->description}}
                    </p>
                    <p>
                        {{$newsDetails->description}}
                    </p>
                    <p>
                        {{$newsDetails->description}}
                    </p>
                    <p>
                        {{$newsDetails->description}}
                    </p>
                    <p>
                        {{$newsDetails->description}}
                    </p>
                </div>
            </div>
        </div>
        <div class="content-bottom">
            <div class="line"></div>
            <div class="content-head__container">
                <div class="content-head__title-wrap">
                    <div class="content-head__title-wrap__title bcg-title">Посмотрите наши товары</div>
                </div>
            </div>
            <div class="content-main__container">
                <div class="products-columns">
                    @foreach($productRandom as $r_product)
                        <div class="products-columns__item">
                            <div class="products-columns__item__title-product">
                                <a href="{{route('product.details',['product_slug'=>$r_product->product_slug])}}" class="products-columns__item__title-product__link">{{$r_product->product_name}}</a>
                            </div>
                            <div class="products-columns__item__thumbnail">
                                <a href="{{route('product.details',['product_slug'=>$r_product->product_slug])}}" class="products-columns__item__thumbnail__link">
                                    <img src="{{asset('img/cover/products')}}/{{$r_product->image}}" alt="{{$r_product->product_name}}" class="products-columns__item__thumbnail__img">
                                </a>
                            </div>
                            <div class="products-columns__item__description">
                                <span class="products-price">{{$r_product->product_price}} руб</span>
                                <a href="#" class="btn btn-blue">Купить</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
