@section('v1-shop-js')
<script type="text/javascript" src="{{ asset('v1/resources/js/shop-page/reuseable/search-ajax.js') }}"></script>
@endsection




<header class="header header-intro-clearance header-4">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <a href="tel:#"><i class="icon-phone"></i>Gọi ngay: +0123 456 789</a>
            </div><!-- End .header-left -->

            <div class="header-right">

                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>

                            <li>
                                <div class="header-dropdown">
                                    <a href="#">Tiếng Việt</a>
                                    <div class="header-menu">
                                        <ul>
                                            <li><a href="#">English</a></li>
                                            <li><a href="#">French</a></li>
                                            <li><a href="#">Spanish</a></li>
                                        </ul>
                                    </div><!-- End .header-menu -->
                                </div>
                            </li>
                            <li><a href="#signin-modal" data-toggle="modal">Trang đăng kí/đăng nhập</a></li>
                        </ul>
                    </li>
                </ul><!-- End .top-menu -->
            </div><!-- End .header-right -->

        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="/" class="logo">
                    <img src="{{asset('v1/themes/molla-shop-template/assets/images/TinaWatch2.png')}}" alt="Molla Logo" width="150" height="150">
                </a>
            </div><!-- End .header-left -->

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Tìm kiếm</label>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                            <input type="search" class="form-control" name="searchkey" id="searchkey" placeholder="Nhập tên sản phẩm ..." required>
                        </div><!-- End .header-search-wrapper -->
                        <div id="searchResult">
                            <!-- <div class="header-search-wrapper search-wrapper-wide">
                                <div class="row my-2">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="#">
                                                    <h6>Sản phẩm</h6>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>10000đ</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 my-1">
                                        <a href="#"><img width="auto" height="200" src="https://cdn.sforum.vn/sforum/wp-content/uploads/2018/11/3-8.png"></a>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div> -->
                            <!-- End .header-search-wrapper -->
                        </div>

                    </form>

                </div><!-- End .header-search -->

            </div>

            <div class="header-right">
                @if (Auth::check())
                <div class="dropdown compare-dropdown">

                    
                
            
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
                        <!-- <div class="icon">
                            <i class="icon-random"></i>
                        </div>
                        <img width="60" height="60" style="border-radius:100%" src="https://cdn.tgdd.vn/Files/2019/07/25/1181734/do-sau-truong-anh-la-gi-cach-thiet-lap-de-chup-anh-dep-nhat--1.jpg">
                        <p> </p> -->
                        <div class="row">
                            <div class="col-sm-5">
                                <img width="50" height="50" class="rounded-circle" src="{{Auth::user()->avatar_path}}">
                            </div>
                            <div class="col-sm-7">
                                <p style="font-size:16px" class="h1">{{Auth::user()->display_name}}</p>
                                <p>{{Auth::user()->role->display_name}}</p>
                            </div>
                        </div>
                    </a>
                    <div class="mx-5"></div>
                  
                    <!-- <div class="mx-2"></div>
                    <a href="#" style="align-items:left" class=" dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
                     
                        <p style="font-size:16px; text-align:left!important" class=" h1">Lân Võ</p>
                        <p style="font-size:12px; text-align:left" class=" h1">Khách hàng thường</p>
                    </a> -->

                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="compare-products">
                            <li class="my-3">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img width="50" height="50" class="rounded-circle" src="{{Auth::user()->avatar_path}}">
                                    </div>
                                    <div class="col-sm-8">
                                        <p style="font-size:16px" class="h1">{{Auth::user()->display_name}}</p>
                                        <p>{{Auth::user()->role->display_name}}</p>
                                    </div>
                                </div>
                            </li>
                            <li class="mt-2">
                                
                                <h4 class="compare-product-title"><span class="mr-5"><i class="fa-solid fa-user"></i></span><a href="{{route('shop.my-info.index')}}">Thông tin cá nhân</a></h4>
                            </li>
                            <li class="mt-2">
                                
                                <h4 class="compare-product-title"><span class="mr-5"><i class="fa-solid fa-power-off"></i></span><a href="{{route('shop.auth.logout')}}">Đăng xuất</a></h4>
                            </li>
                        </ul>

                        <!-- <div class="compare-actions">
                            <a href="#" class="action-link">Clear All</a>
                            <a href="#" class="btn btn-outline-primary-2"><span>Compare</span><i class="icon-long-arrow-right"></i></a>
                        </div> -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .compare-dropdown -->
                    @else
                        <a href="#signin-modal" data-toggle="modal"><i class="fa-solid fa-user mr-2"></i>Đăng nhập</a>
                    @endif
                <!-- <div class="wishlist">
                    <a href="wishlist.html" title="Wishlist">
                        <div class="icon">
                            <i class="icon-heart-o"></i>
                            <span class="wishlist-count badge">3</span>
                        </div>
                        <p>Wishlist</p>
                    </a>
                </div> -->
                <!-- End .compare-dropdown -->

                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <div class="icon">
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count">{{Cart::content()->count()}}</span>
                        </div>
                        <p>Giỏ hàng</p>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-cart-products">
                            @foreach (Cart::content() as $productInCart )
                            <div class="product">
                                <div class="product-cart-details">
                                    <h4 class="product-title">
                                        <a href="{{route('shop.products.detail',['id' => $productInCart->id])}}">{{$productInCart->name}}</a>
                                    </h4>

                                    <span class="cart-product-info">
                                        <span class="cart-product-qty">{{number_format($productInCart->price)}} đ</span>
                                        x {{$productInCart->qty}}
                                    </span>
                                </div><!-- End .product-cart-details -->

                                <figure class="product-image-container">
                                    <a href="{{route('shop.products.detail',['id' => $productInCart->id])}}" class="product-image">
                                        <img src="{{$productInCart->options->feature_image}}" alt="product">
                                    </a>
                                </figure>
                                <a href="{{route('shop.cart.delete', ['rowId' => $productInCart->rowId])}}" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                            </div><!-- End .product -->
                            @endforeach

                        </div><!-- End .cart-product -->

                        <div class="dropdown-cart-total">
                            <span>Tổng cộng:</span>

                            <span class="cart-total-price">{{number_format(Cart::total())}} đ</span>
                        </div><!-- End .dropdown-cart-total -->

                        <div class="dropdown-cart-action">
                            <a href="{{route('shop.cart.index')}}" class="btn btn-primary">Xem giỏ</a>
                            <a href="{{route('shop.checkout.index')}}" class="btn btn-outline-primary-2">Đặt hàng</a>
                        </div><!-- End .dropdown-cart-total -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .cart-dropdown -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="header-left">
                <div class="dropdown category-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                        Các danh mục <i class="icon-angle-down"></i>
                    </a>

                    <div class="dropdown-menu">
                        <nav class="side-nav">
                            <ul class="menu-vertical sf-arrows">
                               
                                <li><a href="#">Danh mục 1</a></li>
                                <li><a href="#">Danh mục 2</a></li>
                                <li><a href="#">Danh mục 3</a></li>
                                <li><a href="#">Danh mục 4</a></li>
                               
                            </ul><!-- End .menu-vertical -->
                        </nav><!-- End .side-nav -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .category-dropdown -->
            </div><!-- End .header-left -->

            <div class="header-center">
                <nav class="main-nav">
                    <ul class="menu ">
                        <li class="megamenu-container {{ request()->is('*/') ? 'active' : '' }}">
                            <a href="/" class="sf-with-ul">Trang chủ</a>


                        </li>
                        <li class="megamenu-container {{ request()->is('*products*') ? 'active' : '' }}">
                            <a href="/products" class="sf-with-ul">Cửa hàng</a>

                        </li>
       
                        <li class="megamenu-container {{ request()->is('*my-info*') ? 'active' : '' }}">
                            <a href="/my-info" class="sf-with-ul">Tài khoản</a>

                   
                        </li>
                        <li class="megamenu-container {{ request()->is('*blogs*') ? 'active' : '' }}">
                            <a href="#" class="sf-with-ul">Bài viết</a>


                        </li>
                        <!-- <li>
                            <a href="elements-list.html" class="sf-with-ul">Chính sách</a>

                
                        </li> -->
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-center -->

            <div class="header-right">
                <i class="la la-lightbulb-o"></i>
                <p>Những sản phẩm<span class="highlight">&nbsp;tốt nhất</span></p>
            </div>
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
</header><!-- End .header -->