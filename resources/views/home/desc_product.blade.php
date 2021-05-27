@extends('layout1')
@section('content')
    <!--Hero Section-->
    {{-- <div class="hero-section hero-background" style="background-size: cover;background-attachment: fixed;background-image: url('{{ asset('public/upload/'.$pro->image) }}');">
        <h1 class="page-title">{{ $pro->title }}</h1>
    </div> --}}
    {{-- <div class="hero-section hero-background" style="background-color: pink">
        <h1 class="page-title">{{ $pro->title }}</h1>
    </div> --}}
    <br><br>
    <div class="page-contain single-product">
        <div class="container">

            <!-- Main content    -->
            <div id="main-content" class="main-content">

                <!-- summary info -->
                <div class="sumary-product single-layout">
                    <div class="media">
                        <ul class="biolife-carousel slider-for" data-slick='{"arrows":false,"dots":false,"slidesMargin":30,"slidesToShow":1,"slidesToScroll":1,"fade":true,"asNavFor":".slider-nav"}'>
                            <li><img src="{{ asset('public/upload/'.$pro->image) }}" alt="" width="500" height="500"></li>
                        </ul>
                    </div>
                    <div class="product-attribute">
                        <h3 class="title">{{ $pro->title }}</h3>
                        <div class="rating">
                            <p class="star-rating"><span class="width-80percent"></span></p>
                            <span class="review-count">(04 Reviews)</span>
                            <span class="qa-text">Q&A</span>
                            <b class="category">By: Natural food</b>
                        </div>
                        <span class="sku">Sku: #{{ $pro->id }}</span>
                        <p class="excerpt">{{ $pro->description }}</p>
                        <div class="price">
                            <ins><span class="price-amount"><span class="currencySymbol"></span>{{ number_format($pro->price,0,',','.') }}đ</span></ins>
                        </div>
                        <div class="shipping-info">
                            <p class="shipping-day">3-Day Shipping</p>
                            <p class="for-today">Pree Pickup Today</p>
                        </div>
                    </div>

                    {{-- Cart --}}

                        @csrf
                        <div class="action-form">
                            <div class="quantity-box">
                                <span class="title">Quantity:</span>
                                <div class="qty-input">
                                    <input type="text" class="qty_{{ $pro->id }}" id="qty" name="qty" value="1" data-max_value="20" data-min_value="1" data-step="1">
                                    <input type="hidden" class="product_id" id="product_id" name="product_id" value="{{ $pro->id }}">
                                    <a href="#" class="qty-btn btn-up"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                                    <a href="#" class="qty-btn btn-down"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="buttons">
                                <input type="submit" id="btn_addcart" value="add to cart" class="btn add-to-cart-btn btn_addcart" style="height: 40px;width: 300px">
                            </div>
                            <div class="buttons" style="text-align: center">
                                <p class="pull-row" style="text-align: center">
                                    <a href="#" class="btn wishlist-btn">wishlist</a>
                                    <a href="#" class="btn compare-btn">compare</a>
                                </p>
                            </div>
                            <div class="social-media">
                                <ul class="social-list">
                                    <li><a href="#" class="social-link"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#" class="social-link"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#" class="social-link"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                    <li><a href="#" class="social-link"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
                                    <li><a href="#" class="social-link"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>

                </div>
                <br><br>
                <!-- related products -->
                <div class="product-related-box single-layout">
                    <div class="biolife-title-box lg-margin-bottom-26px-im">
                        <span class="biolife-icon icon-organic"></span>
                        <span class="subtitle">All the best item for You</span>
                        <h3 class="main-title">Related Products</h3>
                    </div>
                    <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":0,"slidesToShow":5, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":20 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}}]}'>
                        @foreach ($rela_pro as $rela)
                        <li class="product-item">
                            <div class="contain-product layout-default">
                                <div class="product-thumb">
                                    <a href="{{ URL::to('desc_product/'.$rela->id) }}" class="link-to-product" id="wishlist_productUrl{{ $rela->id }}">
                                        <img src="{{asset('public/upload/'.$rela->image)}}" id="wishlist_image{{ $rela->id }}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                    </a>
                                </div>
                                <div class="info">
                                    <b class="categories">
                                        @foreach ($cate as $ct)
                                            @if ($ct->id==$rela->cateid)
                                                {{ $ct->name }}
                                            @endif
                                        @endforeach
                                    </b>
                                    {{-- wishlist get input --}}
                                    <input type="hidden" id="wishlist_name{{ $rela->id }}" value="{{ $rela->title }}">
                                    <input type="hidden" id="wishlist_price{{ $rela->id }}" value="{{ $rela->price }}">


                                    {{-- end wishlist get input --}}
                                    <h4 class="product-title"><a href="#" class="pr-name">{{ $rela->title }}</a></h4>
                                    <div class="price ">
                                        <ins><span class="price-amount"><span class="currencySymbol"></span>{{ number_format($rela->price, 0, ',','.') }}đ</span></ins>
                                        {{-- <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del> --}}
                                    </div>
                                    <div class="slide-down-box">
                                        <p class="message">You want to buy it ?</p>
                                        <div class="buttons">
                                            <a class="btn wishlist-btn" id="{{ $rela->id }}" onclick="return add_wishlish(this.id)"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                            <button class="btn add-to-cart-btn btn_addcart" data-id_product="{{ $rela->id }}"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</button>
                                            <input type="hidden" class="qty_{{ $rela->id }}" value="1">
                                            @csrf
                                            <input type="hidden" value="{{ $rela->id }}" >
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

@endsection
