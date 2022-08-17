<div class="middle">
    <div class="sidebar">
        <div class="sidebar-item">
            <div class="sidebar-item__title">Категории</div>
            <div class="sidebar-item__content">
                <ul class="sidebar-category">
                    @foreach($categories as $category)
                        <li class="sidebar-category__item">
                            <a href="{{route('category.details',['category_slug'=>$category->category_slug])}}" class="sidebar-category__item__link">{{$category->category_name}}</a>
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
                                <a href="{{route('news.details',['news_slug'=>$r_news->news_slug])}}" class="sidebar-news__item__title-news__link">О новых играх в режиме VR</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="content-top">
            <h3 class="title">Купить игры неборого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</h3>
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
                <div class="news-list__container">
                    @foreach($newsAll as $news)
                        <div class="news-list__item">
                            <div class="news-list__item__thumbnail">
                                <img src="{{asset('img/cover/news')}}/{{$news->news_image}}">
                            </div>
                            <div class="news-list__item__content">
                                <div class="news-list__item__content__news-title">{{$news->news_name}}</div>
                                <div class="news-list__item__content__news-date">{{$news->date}}</div>
                                <div class="news-list__item__content__news-content">{{$news->description}}</div>
                            </div>
                            <div class="news-list__item__content__news-btn-wrap">
                                <a href="{{route('news.details', ['news_slug' => $news->news_slug])}}" class="btn btn-brown">Подробнее</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="content-bottom"></div>
    </div>
</div>
