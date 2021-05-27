@extends('layout1')
@section('content')
    <div class="row">


        <div class="col-lg-3" style="background-color: white"></div>
        <div class="col-lg-6 col-sm-6 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
            <div class="order-summary sm-margin-bottom-80px" style="border:2px solid rgb(245, 242, 242)">
                <div class="title-block">
                    <h3 class="title">Order Summary</h3>
                    <a href="#" class="link-forward">Edit cart</a>
                </div>
                <div class="cart-list-box short-type">
                    <span class="number">{{ Cart::count() }} items</span>
                    <ul class="cart-list">
                        @php
                            $content = Cart::content();
                        @endphp
                        @foreach ($content as $con)
                            <li class="cart-elem">
                                <div class="cart-item">
                                    <div class="product-thumb">
                                        <a class="prd-thumb" href="#">
                                            <figure><img src="{{ asset('public/upload/' . $con->options->image) }}"
                                                    width="113" height="113" alt="shop-cart"></figure>
                                        </a>
                                    </div>
                                    <div class="info">
                                        <span class="txt-quantity">Quantity: {{ $con->qty }}</span>
                                        <a href="#" class="pr-name">{{ $con->name }}</a>
                                    </div>
                                    <div class="price price-contain">
                                        <ins><span class="price-amount"><span
                                                    class="currencySymbol"></span>{{ number_format($con->price, 0, ',', '.') }}đ</span></ins>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <ul class="subtotal">
                        <form action="{{ URL::to('payment') }}" method="POST">
                            @csrf
                            <li>
                                <div class="subtotal-line">
                                    <b class="stt-name">Subtotal</b>
                                    <span class="stt-price">{{ Cart::subtotal(0, ',', '.') }}đ</span>
                                    <input type="hidden" value="{{ Cart::subtotal(0, ',', '') }}" id="subtotal">
                                </div>
                            </li>
                            <br>
                            <li>
                                <div class="subtotal-line">
                                    <b class="stt-name">Voucher </b>
                                    <span class="stt-price" id="span_voucher"><input type="text" name="voucher" id="voucher" placeholder="Enter Your Voucher"></span>
                                </div>
                            </li>
                            <br>
                            <li>
                                <div class="subtotal-line">
                                    <b class="stt-name">Payment Method</b>
                                    <span class="stt-price">
                                        <input type="radio" name="payment" value="0" required>Cash On Delivery
                                        <input type="radio" name="payment" value="1" required>Paypal
                                    </span>
                                </div>
                            </li>
                            <br>
                            <li>
                                <div class="subtotal-line">
                                    <b class="stt-name">total:</b>
                                    <span class="stt-price" id="total">{{ Cart::subtotal(0,',','.') }}đ</span>
                                    <input type="hidden" name="totalprice" value="{{ Cart::subtotal(0,',','') }}" id="v_total">
                                </div>
                            </li>
                            <br>
                            <div class="btn-checkout">
                                <input type="submit" class="btn checkout btn-block btn-danger" value="Payment">
                            </div>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
    <div class="line" style="width: 100%;height: 5px; background-color: rgb(250, 247, 247)"></div>
@endsection
