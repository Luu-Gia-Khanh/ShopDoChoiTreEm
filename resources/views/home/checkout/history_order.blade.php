@extends('layout1')
@section('content')
    <!--Cart Table-->
    <div class="container">

        <div class="shopping-cart-container">
            {{ Cart::destroy() }}
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h3 class="box-title">Your order</h3>
                        <form class="shopping-cart-form" action="#" method="post">
                            <table class="shop_table cart-form">
                                <thead>
                                    <tr>
                                        <th class="product-name">Order ID</th>
                                        <th class="product-price">Date</th>
                                        <th class="product-quantity">Status</th>
                                        {{-- <th class="product-subtotal">Payment Method</th> --}}
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-subtotal">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $or)
                                        <tr class="cart_item table-bordered">
                                            <td class="product-price" data-title="Price">
                                                <div class="price price-contain">
                                                    <ins><span class="price-amount"><span
                                                                class="currencySymbol"></span>{{ $or->id }}</span></ins>
                                                </div>
                                            </td>
                                            <td class="product-price" data-title="Price">
                                                <div class="price price-contain">
                                                    <ins><span class="price-amount"><span
                                                                class="currencySymbol"></span>{{ $or->timestamp }}</span></ins>
                                                </div>
                                            </td>
                                            <td class="product-price" data-title="Price">
                                                <div class="price price-contain">
                                                    <ins><span class="price-amount"><span
                                                                class="currencySymbol"></span>{{ $or->orderstatus }}</span></ins>
                                                </div>
                                            </td>
                                            {{-- <td class="product-price" data-title="Price">
                                                <div class="price price-contain">
                                                    <ins><span class="price-amount"><span
                                                                class="currencySymbol"></span>{{ $or->paymentmethod }}</span></ins>
                                                </div>
                                            </td> --}}
                                            <td class="product-price" data-title="Price">
                                                <div class="price price-contain">
                                                    <ins><span class="price-amount"><span
                                                                class="currencySymbol"></span>{{ number_format($or->totalprice, 0, ',','.') }}đ</span></ins>
                                                </div>
                                            </td>
                                            <td class="product-price" data-title="Price">
                                                <div class="price price-contain">
                                                    <ins><a class="price-amount" href="order_item/{{ $or->id }}"><span
                                                                class="currencySymbol"></span>View</a></ins>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <br><br>

@endsection
