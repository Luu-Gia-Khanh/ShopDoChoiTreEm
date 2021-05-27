@extends('layout')
@section('content')
{{-- NAV --}}
{{-- End-NAV --}}
<!--Block 04: Product Tab-->
<div class="product-tab z-index-20 sm-margin-top-59px xs-margin-top-20px">
    <div class="container">
        <div class="biolife-title-box slim-item">
            <h3 class="main-title">Our Products</h3>
        </div>
        <div class="biolife-tab biolife-tab-contain sm-margin-top-23px">
            <div class="tab-head tab-head__sample-layout">
                <ul class="tabs">
                    <li class="tab-element active">
                        <a href="#tab01_1st" class="tab-link">Featured</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div id="tab01_1st" class="tab-contain active">
                    <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain" data-slick='{"rows":1 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":20 }},{"breakpoint":768, "settings":{ "slidesToShow": 2,"rows":2, "slidesMargin":15 }}]}'>
                        @foreach ($pro as $p)
                        <li class="product-item">
                            <div class="contain-product layout-default">
                                <div class="product-thumb">
                                    <a href="{{ URL::to('desc_product/'.$p->id) }}" class="link-to-product" id="wishlist_productUrl{{ $p->id }}">
                                        <img src="{{asset('public/upload/'.$p->image)}}" id="wishlist_image{{ $p->id }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                    </a>
                                </div>
                                <div class="info">
                                    <b class="categories">
                                        @foreach ($cate as $ct)
                                            @if ($ct->id==$p->cateid)
                                                {{ $ct->name }}
                                            @endif
                                        @endforeach
                                    </b>
                                    {{-- wishlist get input --}}
                                    <input type="hidden" id="wishlist_name{{ $p->id }}" value="{{ $p->title }}">
                                    <input type="hidden" id="wishlist_price{{ $p->id }}" value="{{ $p->price }}">
                                    {{-- <input type="hidden" id="wishlist_name{{ $p->id }}" value="{{ $nameCate }}"> --}}

                                    {{-- end wishlist get input --}}
                                    <h4 class="product-title"><a href="#" class="pr-name">{{ $p->title }}</a></h4>
                                    <div class="price ">
                                        <ins><span class="price-amount"><span class="currencySymbol"></span>{{ number_format($p->price, 0, ',','.') }}đ</span></ins>
                                        {{-- <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del> --}}
                                    </div>
                                    <div class="slide-down-box">
                                        <p class="message">You want to buy it ?</p>
                                        <div class="buttons">
                                            <a class="btn wishlist-btn" id="{{ $p->id }}" onclick="return add_wishlish(this.id)"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                            <button class="btn add-to-cart-btn btn_addcart" data-id_product="{{ $p->id }}"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</button>
                                            <input type="hidden" class="qty_{{ $p->id }}" value="1">
                                            @csrf
                                            <input type="hidden" value="{{ $p->id }}" >
                                            <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
