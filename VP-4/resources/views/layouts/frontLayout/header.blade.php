<header class="main-header">
    <div class="logotype-container"><a href="/" class="logotype-link"><img src="{{ asset('img/logo.png') }}" alt="Логотип"></a></div>
    <nav class="main-navigation">
        <ul class="nav-list">
            <li class="nav-list__item"><a href="/" class="nav-list__item__link">Главная</a></li>
            <li class="nav-list__item"><a href="{{route('user.orders')}}" class="nav-list__item__link">Мои заказы</a></li>
            <li class="nav-list__item"><a href="/news" class="nav-list__item__link">Новости</a></li>
            <li class="nav-list__item"><a href="/about" class="nav-list__item__link">О компании</a></li>
        </ul>
    </nav>
    <div class="header-contact">
        <div class="header-contact__phone"><a href="#" class="header-contact__phone-link">Телефон: 33-333-33</a></div>
    </div>
    <div class="header-container">
        <div class="payment-container">
            <div class="payment-basket__status">
                <div class="payment-basket__status__icon-block">
                    <a class="payment-basket__status__icon-block__link" href="/cart" >
                        <i class="fa fa-shopping-basket"></i>
                    </a>
                </div>
                <div class="payment-basket__status__basket">
                    <span class="payment-basket__status__basket-value">{{Cart::count()}}</span>
                    <span class="payment-basket__status__basket-value-descr">товаров</span>
                </div>
            </div>
        </div>
        @if(Route::has('login'))
            @auth
                @if(Auth::user()->utype === 'ADM')
                    <a title="My account" href="">My Account ({{Auth::user()->name}})</a>
                    <ul class="submenu curency">
                        <li class="menu-item">
                            <a title="dashboard" href="{{route('admin.dashboard')}}">dashboard</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        <form id="logout-form" method="POST" action="{{route('logout')}}">
                            @csrf
                        </form>
                    </ul>
                @else
                    <a title="My account" href="">My Account ({{Auth::user()->name}})</a>
                    <ul class="submenu curency">
                        <li class="menu-item">
                            <a title="orders" href="{{route('user.orders')}}">Мои заказы</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        <form id="logout-form" method="POST" action="{{route('logout')}}">
                            @csrf
                        </form>
                    </ul>
                @endif
            @else
                <div class="authorization-block">
                    <a href="{{route('register')}}" class="authorization-block__link">Регистрация</a>
                    <a href="{{route('login')}}" class="authorization-block__link">Войти</a>
                </div>
            @endif
        @endif
    </div>
</header>
