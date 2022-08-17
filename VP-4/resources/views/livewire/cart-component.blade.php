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
                    <div class="content-head__title-wrap__title bcg-title">Мои заказы</div>
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

            @if(Session::has("success_message"))
                <strong>{{Session::get('success_message')}}</strong>
            @endif
            <div class="cart-product-list">
                @if(Cart::count() > 0)
                    @foreach(Cart::content() as $item)
                        <div class="cart-product-list__item">
                            <div class="cart-product__item__product-photo">
                                <img src="{{ asset('img/cover/products') }}/{{$item->model->image}}" alt="{{$item->model->product_name}}" class="cart-product__item__product-photo__image">
                            </div>
                            <div class="cart-product__item__product-name">
                                <div class="cart-product__item__product-name__content">
                                    <a href="{{route('product.details',['product_slug',$item->model->product_slug])}}">{{$item->model->product_name}}</a>
                                </div>
                            </div>
                            <div class="cart-product__item__product-price"><span class="product-price__value">{{$item->model->product_price}} рублей</span></div>
                            <div class="cart-product__item__cart-date">
                                <div class="cart-product__item__cart-date__content">
                                    <div class="quantity">
                                        <div class="quantity-input" style="display: flex; justify-content: space-between; width: 100px; align-items: center;">
                                            <a class="btn btn-increase" style="width: 30px;" href="#" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')">-</a>
                                            <input type="text" style="width: 30px; height: 30px;" name="product-quatity" value="{{$item->qty}}" data-max="120" pattern="[0-9]*" >
                                            <a class="btn btn-reduce" style="width: 30px;" href="#" wire:click.prevent="increaseQuantity('{{$item->rowId}}')">+</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-product__item__product-price"><span class="product-price__value">{{$item->subtotal()}} рублей</span></div>
                        </div>
                    @endforeach
                @else
                    <p>В корзине нет товаров</p>
                @endif
                <div class="cart-product-list__result-item">
                    <div class="cart-product-list__result-item__text">Итого</div>
                    <div class="cart-product-list__result-item__value">{{Cart::subtotal()}} рублей</div>
                </div>
            </div>
            <div class="content-footer__container">
                <div class="btn-buy-wrap">
                    <a href="#" class="btn-buy-wrap__btn-link" wire:click.prevent="checkout">Перейти к оплате</a>
                </div>
            </div>
        </div>
        <div class="content-bottom"></div>
    </div>
</div>
