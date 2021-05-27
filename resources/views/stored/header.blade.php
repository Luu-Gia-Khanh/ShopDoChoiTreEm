<header id="header" class="header-area style-01 layout-04">
    <div class="header-top bg-main hidden-xs">
        <div class="container">
            <div class="top-bar left">
                <ul class="horizontal-menu">
                    <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>lgkhhn2000@gmail.com</a></li>
                    <li><a href="#">Free Shipping for all Order of $99</a></li>
                </ul>
            </div>
            <div class="top-bar right">
                <ul class="social-list">
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                </ul>
                <ul class="horizontal-menu">
                    @if (Session::get('user_id'))
                        <li><a href="{{URL::to('logout_user')}}" class="login-link"><i class="biolife-icon icon-login"></i>{{ Session::get('user_name') }}</a></li>
                    @else
                        <li><a href="{{URL::to('login_user')}}" class="login-link"><i class="biolife-icon icon-login"></i>Login/Register</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="header-middle biolife-sticky-object ">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-2 col-md-6 col-xs-6">
                    <a href="home-04-light.html" class="biolife-logo"><img src="{{('public/font_end/assets/images/organic-4.png')}}" alt="biolife logo" width="135" height="36"></a>
                </div>
                <div class="col-lg-6 col-md-7 hidden-sm hidden-xs">
                    <div class="primary-menu">
                        <ul class="menu biolife-menu clone-main-menu clone-primary-menu" id="primary-menu" data-menuname="main menu">
                            <li class="menu-item"><a href="{{ URL::to('TrangChu') }}">Home</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-md-6 col-xs-6">
                    <div class="biolife-cart-info">
                        <div class="mobile-search">
                            <a href="javascript:void(0)" class="open-searchbox"><i class="biolife-icon icon-search"></i></a>
                            <div class="mobile-search-content">
                                <form action="#" class="form-search" name="mobile-seacrh" method="get">
                                    <a href="#" class="btn-close"><span class="biolife-icon icon-close-menu"></span></a>
                                    <input type="text" name="s" class="input-text" value="" placeholder="Search here...">
                                    <select name="category">
                                        <option value="-1" selected>All Categories</option>

                                    </select>
                                    <button type="submit" class="btn-submit">go</button>
                                </form>
                            </div>
                        </div>
                        {{-- wishlsit --}}
                        <div class="minicart-block">
                            <div class="minicart-contain">
                                <a href="javascript:void(0)" class="link-to">
                                        <span class="icon-qty-combine">
                                            <i class="icon-heart-bold biolife-icon"></i>
                                            <span class="qty" id="qty_wishlist">0</span>
                                        </span>
                                </a>
                                <div class="cart-content">
                                    <div class="cart-inner">
                                        <ul class="products" id="content_wishlist">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- cart --}}
                        <div class="minicart-block">
                            <div class="minicart-contain">
                                <a href="{{ URL::to('show_cart') }}" class="link-to">
                                    <span class="icon-qty-combine">
                                        <i class="icon-cart-mini biolife-icon"></i>
                                        <span class="qty">{{ Cart::count() }}</span>
                                    </span>
                                    <span class="title">My Cart -</span>
                                    <span class="sub-total">{{ Cart::subtotal(0,',','.') }}đ</span>
                                </a>
                            </div>
                        </div>
                        <div class="mobile-menu-toggle">
                            <a class="btn-toggle" data-object="open-mobile-menu" href="javascript:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
