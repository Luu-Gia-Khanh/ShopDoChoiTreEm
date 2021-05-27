@extends('layout1')
@section('content')
    <!--Cart Table-->
    <div class="container">

        <div class="shopping-cart-container">
            {{ Cart::destroy() }}
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h3 class="box-title">Your order items</h3>
                    <form class="shopping-cart-form" action="#" method="post">
                        <table class="shop_table cart-form">
                            <thead>
                                <tr>
                                    <th class="product-name">Image</th>
                                    <th class="product-price">Name</th>
                                    <th class="product-quantity">Quantity</th>
                                    {{-- <th class="product-subtotal">Payment Method</th> --}}
                                    <th class="product-subtotal">price</th>
                                    <th class="product-subtotal">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order_item as $or)
                                    <tr class="cart_item table-bordered">
                                        <td class="product-price" data-title="Price">
                                            <img src="{{ asset('public/upload/' . $or->image) }}" height="150px"
                                                width="150px" alt="">
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><span
                                                            class="currencySymbol"></span>{{ $or->title }}</span></ins>

                                            </div>
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><span
                                                            class="currencySymbol"></span>{{ $or->pquantity }}</span></ins>

                                            </div>
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><span
                                                    class="currencySymbol"></span>{{ number_format($or->price,0,',','.') }}đ</span></ins>

                                            </div>
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><span
                                                    class="currencySymbol"></span>{{ $or->timestamp }}</span></ins>

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
