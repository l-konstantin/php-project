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
                    <div class="content-head__title-wrap__title bcg-title">Данные покупки</div>
                </div>
                <div class="content-head__search-block">
                    <div class="search-container">
                    </div>
                </div>
            </div>
            <form wire:submit.prevent="placeOrder">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                            <h3 class="box-title">Данные покупателя</h3>
                            <div class="billing-address">
                                <p class="row-in-form">
                                    <label for="name">Имя<span>*</span></label>
                                    <input type="text" name="name" value="" placeholder="Your name" wire:model="firstname">
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" value="" placeholder="Type your email" wire:model="email">
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Телефон:<span>*</span></label>
                                    <input type="number" name="phone" value="" placeholder="10 digits format" wire:model="mobile">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                @if(Session::has('checkout'))
                    <div class="cart-product-list">
                        <div class="cart-product-list__result-item">
                            <div class="cart-product-list__result-item__text">Итого</div>
                            <div class="cart-product-list__result-item__value">{{Session::get('checkout')['total']}} рублей</div>
                        </div>
                    </div>
                @endif
                <div class="content-footer__container">
                    <div class="btn-buy-wrap">
                        <button type="submit" class="btn-buy-wrap__btn-link">Оплатить сейчас</button>
                    </div>
                </div>
            </form>

        </div>
        <div class="content-bottom"></div>
    </div>
</div>
