<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-4 hidden-sm hidden-xs">
            <div class="biolife-vertical-menu none-box-shadow  ">
                <div class="vertical-menu vertical-category-block always ">
                    <div class="block-title">
                        <span class="menu-icon">
                            <span class="line-1"></span>
                            <span class="line-2"></span>
                            <span class="line-3"></span>
                        </span>
                        <span class="menu-title">All Category</span>
                        <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                    </div>
                    <div class="wrap-menu">
                        <ul class="menu clone-main-menu">
                            @if (isset($cate))
                                @foreach ($cate as $ct)
                                <li class="menu-item menu-item-has-children has-megamenu">
                                    <a href="" class="menu-name" style="font-size: 17px">{{ $ct->name }}</a>
                                </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @include('stored.slider')
    </div>
</div>
