<div class="middle">
    <div class="main-content"><img src="{{ asset('img/slider.png') }}" alt="Image" class="image-main">
        <div class="content-middle">
            <div class="content-head__container">
                <div class="content-head__title-wrap">
                    <div class="content-head__title-wrap__title bcg-title">Все Заказы</div>
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
                                                Все заказы
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Имя покупателя</th>
                                                    <th>Телефон покупателя</th>
                                                    <th>Email</th>
                                                    <th>Стоимость</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td>{{$order->id}}</td>
                                                    <td>{{$order->firstname}}</td>
                                                    <td>{{$order->mobile}}</td>
                                                    <td>{{$order->email}}</td>
                                                    <td>{{$order->subtotal}}</td>
                                                    <td>
                                                        <a href="{{route('admin.orderdetails',['order_id'=>$order->id])}}" class="btn btn-info btn-sm">Подробнее</a>
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
