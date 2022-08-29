<div class="middle">
    <div class="main-content"><img src="{{ asset('img/slider.png') }}" alt="Image" class="image-main">
        <div class="content-middle">
            <div class="content-head__container">
                <div class="content-head__title-wrap">
                    <div class="content-head__title-wrap__title bcg-title">Детализация заказа</div>
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
                                                Детализация заказа
                                            </div>
                                            <div class="col-md-6">
                                                <a href="{{route('admin.orders')}}" class="btn btn-success pull-right">Все заказы</a>
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-6">
                                                Данные заказчика
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Имя</th>
                                                <td>{{$order->firstname}}</td>
                                            </tr>
                                            <tr>
                                                <th>Телефон</th>
                                                <td>{{$order->mobile}}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{$order->email}}</td>
                                            </tr>
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
