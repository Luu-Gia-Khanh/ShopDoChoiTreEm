@extends('layout1')
@section('content')
    <!--Cart Table-->
    <div class="container">
        <div class="shopping-cart-container">
            @php
                $content = Cart::content();
            @endphp
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <h3 class="box-title">Your cart items</h3>
                    @if (Cart::count() == 0)
                        <span style="font-size: 25px;text-align: center;margin-left: 400px;margin-top:
                            400px">No item cart</span>
                    @else
                        <form class="shopping-cart-form" action="#" method="post">
                            <table class="shop_table cart-form">
                                <thead>
                                    <tr>
                                        <th class="product-name">Product Name</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($content as $con)
                                        <tr class="cart_item">
                                            <td class="product-thumbnail" data-title="Product Name">
                                                <a class="prd-thumb" href="#">
                                                    <figure><img width="113" height="113"
                                                            src="{{ asset('public/upload/' . $con->options->image) }}"
                                                            alt="shipping cart"></figure>
                                                </a>
                                                <a class="prd-name" href="#">{{ $con->name }}</a>
                                                <div class="action">
                                                    <a href="{{ URL::to('remove_item_cart/' . $con->rowId) }}"
                                                        class="remove"><i class="fa fa-trash-o" aria-hidden="true"
                                                            style="font-size: 25px"></i></a>
                                                </div>
                                            </td>
                                            <td class="product-price" data-title="Price">
                                                <div class="price price-contain">
                                                    <ins><span class="price-amount"><span
                                                                class="currencySymbol"></span>{{ number_format($con->price, 0, ',', '.') }}đ</span></ins>
                                                </div>
                                            </td>
                                            <td class="product-quantity" data-title="Quantity">
                                                <div class="quantity-box type1">
                                                    <div class="qty-input">
                                                        @csrf
                                                        <input class="qty_{{ $con->rowId }}" type="text" name="qty"
                                                            id="qty_update_cart" value="{{ $con->qty }}"
                                                            data-max_value="20" data-min_value="1" data-step="1">
                                                        <a href="#" class="qty-btn btn-up btnUp"
                                                            data-id_cart="{{ $con->rowId }}"><i class="fa fa-caret-up"
                                                                aria-hidden="true"></i></a>
                                                        <a href="#" class="qty-btn btn-down btnDown"
                                                            data-id_cart="{{ $con->rowId }}"><i class="fa fa-caret-down"
                                                                aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="product-subtotal" data-title="Total">
                                                <div class="price price-contain">
                                                    <ins><span class="price-amount"><span
                                                                class="currencySymbol"></span>{{ number_format($con->price * $con->qty, 0, ',', '.') }}đ</span></ins>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="cart_item wrap-buttons">
                                        <td class="wrap-btn-control" colspan="4">
                                            <a href="{{ URL::to('TrangChu') }}" class="btn back-to-shop">Back to Shop</a>
                                            {{-- <button class="btn btn-update" type="submit" disabled>update</button> --}}
                                            <a href="{{ URL::to('clear_cart') }}" class="btn btn-clear">clear all</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    @endif
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="shpcart-subtotal-block">
                        <div class="subtotal-line">
                            <b class="stt-name">Subtotal <span class="sub">{{ Cart::count() }}item</span></b>
                            <span class="stt-price">{{ Cart::subtotal(0, ',', '.') }}đ</span>
                        </div>
                        {{-- <div class="subtotal-line">
                            <b class="stt-name">Shipping</b>
                            <span class="stt-price">£0.00</span>
                        </div>
                        <div class="tax-fee">
                            <p class="title">Est. Taxes & Fees</p>
                            <p class="desc">Based on 56789</p>
                        </div> --}}
                        <div class="btn-checkout">
                            @if (Cart::count() == 0)
                                <a class="btn checkout" disabled>Check out</a>
                            @else
                                @php
                                    $user_id = Session::get('user_id');
                                    $usermeta_id = Session::get('usermeta_id');
                                    if ($user_id != null && $usermeta_id != null) {
                                        echo '<a href="check_out" class="btn checkout">Check out</a>';
                                    } elseif ($user_id != null && $usermeta_id == null) {
                                        echo '<a href="add_user_meta" class="btn checkout">Check out</a>';
                                    } else {
                                        echo '<a href="login_user" class="btn checkout">Check out</a>';
                                    }
                                @endphp
                            @endif

                        </div>
                        {{-- <div class="biolife-progress-bar">
                            <table>
                                <tr>
                                    <td class="first-position">
                                        <span class="index">$0</span>
                                    </td>
                                    <td class="mid-position">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 25%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="last-position">
                                        <span class="index">$99</span>
                                    </td>
                                </tr>
                            </table>
                        </div> --}}
                        <p class="pickup-info"><b>Free Pickup</b> is available as soon as today More about shipping and
                            pickup</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
@endsection
