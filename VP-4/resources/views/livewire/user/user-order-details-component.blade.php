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
                                <img src="{{asset('img/cover/news')}}/{{$r_news->news_image}}" alt="image-new" class="sidebar-new__item__preview-new__image">
                            </div>
                            <div class="sidebar-news__item__title-news">
                                <a href="{{route('news.details',['news_slug' => $r_news->news_slug])}}" class="sidebar-news__item__title-news__link">{{$r_news->news_name}}</a>
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
                    <div class="content-head__title-wrap__title bcg-title">Заказ {{$order->id}}</div>
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
                <div class="products-columns">
                    <div class="container" style="padding: 30px 0;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default" style="display: flex; flex-direction: column;">
                                    <div class="panel-heading" style="margin-bottom: 10px;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="{{route('user.orders')}}" class="btn btn-success pull-right">Все мои заказы</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="wrap-iten-in-cart">
                                            <ul class="products-cart">
                                                @foreach($order->OrderItems as $item)
                                                    <div class="cart-product-list__item">
                                                        <div class="cart-product__item__product-photo">
                                                            <img src="{{ asset('img/cover/products') }}/{{$item->product->image}}" alt="{{$item->product->product_name}}" class="cart-product__item__product-photo__image">
                                                        </div>
                                                        <div class="cart-product__item__product-name">
                                                            <div class="cart-product__item__product-name__content">
                                                                <a href="{{route('product.details',['product_slug',$item->product->product_slug])}}">{{$item->product->product_name}}</a>
                                                            </div>
                                                        </div>
                                                        <div class="cart-product__item__product-price"><span class="product-price__value">{{$item->product->product_price}} рублей</span></div>
                                                        <div class="cart-product__item__cart-date">
                                                            <div class="cart-product__item__cart-date__content">
                                                                <div class="quantity">
                                                                    <h5>{{$item->quantity}}</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="cart-product-list__result-item">
                                            <div class="cart-product-list__result-item__text">Итого</div>
                                            <div class="cart-product-list__result-item__value">{{$order->subtotal}} рублей</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="wrap-iten-in-cart">
                                <div class="products-cart">
                                    <div class="cart-product-list__item">
                                        <div class="cart-product__item__product-price"><span class="product-price__value">Имя: {{$order->firstname}}</span></div>
                                        <div class="cart-product__item__product-price"><span class="product-price__value">Телефон: {{$order->mobile}}</span></div>
                                        <div class="cart-product__item__product-price"><span class="product-price__value">Email: {{$order->email}}</span></div>
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
