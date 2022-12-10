@extends('v1.shop-views.layouts.shop-layout')

@section('v1-shop-title')
<title>Trang chủ</title>
@endsection

@section('v1-shop-css')
<link rel="stylesheet" href="{{ asset('v1/resources/css/admin-page/reuseable/hide-input-file.css') }}">
</link>
<link rel="stylesheet" href="{{ asset('v1/resources/css/admin-page/reuseable/color-toast.css') }}">
@endsection

@section('v1-shop-content')

<main class="main">
    <div class="intro-slider-container mb-5">
        <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" data-owl-options='{
                        "dots": true,
                        "nav": false, 
                        "responsive": {
                            "1200": {
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>

            @foreach ($sliders as $slider)
            <div class="intro-slide" style="background-image: url('{{$slider->avatar_path}}');">
                <div class="container intro-content">
                    <div class="row justify-content-end">
                        <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                           
                            <h2 class="fw-bold">{{$slider->title}}</h2>
                            <h5 class="intro-subtitle text-third">{{$slider->short_description}}</h5><!-- End .h3 intro-subtitle -->

                            <div class="my-5"></div>

                            <a href="{{$slider->link}}" class="btn btn-primary btn-round">
                                <span>Xem ngay</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div><!-- End .col-lg-11 offset-lg-1 -->
                    </div><!-- End .row -->
                </div><!-- End .intro-content -->
            </div><!-- End .intro-slide -->
            @endforeach
  


        </div><!-- End .intro-slider owl-carousel owl-simple -->

        <span class="slider-loader"></span><!-- End .slider-loader -->
    </div><!-- End .intro-slider-container -->

    <div class="container">
        <h2 class="title text-center mb-4">Các danh mục sản phẩm</h2><!-- End .title text-center -->

        <div class="cat-blocks-container">
            <div class="row">
                @foreach ($newestCategories as $category)
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="#" class="cat-block">
                        <figure>
                            <span>
                                <img src="{{$category->avatar_path}}" alt="Category image">
                            </span>
                        </figure>

                        <h3 class="cat-block-title">{{$category->name}}</h3><!-- End .cat-block-title -->
                    </a>
                </div><!-- End .col-sm-4 col-lg-2 -->
                @endforeach
            </div><!-- End .row -->
        </div><!-- End .cat-blocks-container -->
    </div><!-- End .container -->

    <div class="mb-4"></div><!-- End .mb-4 -->



    <div class="mb-5"></div><!-- End .mb-5 -->

    <div class="container for-you">
        <h2 class="title text-center mb-4">Sản phẩm mới nhất</h2><!-- End .title text-center -->

        <div class="products">
            <div class="row justify-content-center">

                @foreach ($newestProducts as $product)
                <div class="col-6 col-md-4 col-lg-3 text-center">
                    <div class="product product-2">
                        <figure class="product-media">
                            <a href="{{route('shop.products.detail',['id' =>$product->id])}}">
                                <img src="{{$product->feature_image_path}}" alt="Product image" class="product-image">
                            </a>



                            <div class="product-action">
                                <a href="{{route('shop.cart.addOne',['id' => $product->id])}}" class="btn-product btn-cart" title="Add to cart"><span>Thêm vào giỏ hàng</span></a>

                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body ">
                            <div class="product-cat">
                                @foreach ($product->categories as $category)
                                <a href="#">{{$category->name}}, </a>
                                @endforeach

                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="{{route('shop.products.detail',['id' =>$product->id])}}">{{$product->name}}</a></h3><!-- End .product-title -->
                            <div class="product-price d-flex justify-content-center">
                               
                                {{number_format($product->price)}} đ
                            </div><!-- End .product-price -->

                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                @endforeach

            </div><!-- End .row -->
        </div><!-- End .products -->
    </div><!-- End .container -->


    <div class="container">
        <hr class="mb-0">
        <div class="owl-carousel mt-5 mb-5 owl-simple" data-toggle="owl" data-owl-options='{
                        "nav": false, 
                        "dots": false,
                        "margin": 30,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":6
                            }
                        }
                    }'>
            <a href="#" class="brand">
                <img src="{{asset('v1/themes/molla-shop-template/assets/images/brands/1.png')}}" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="{{asset('v1/themes/molla-shop-template/assets/images/brands/2.png')}}" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="{{asset('v1/themes/molla-shop-template/assets/images/brands/3.png')}}" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="{{asset('v1/themes/molla-shop-template/assets/images/brands/4.png')}}" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="{{asset('v1/themes/molla-shop-template/assets/images/brands/5.png')}}" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="{{asset('v1/themes/molla-shop-template/assets/images/brands/6.png')}}" alt="Brand Name">
            </a>
        </div><!-- End .owl-carousel -->
    </div><!-- End .container -->


    <div class="container for-you">
        <h2 class="title text-center mb-4">Sản phẩm đề xuất cho bạn</h2><!-- End .title text-center -->

        <div class="products">
            <div class="row justify-content-center">

                @foreach ($recommendedProducts as $product)
                <div class="col-6 col-md-4 col-lg-3 text-center">
                    <div class="product product-2">
                        <figure class="product-media">
                            <a href="{{route('shop.products.detail',['id' =>$product->id])}}">
                                <img src="{{$product->feature_image_path}}" alt="Product image" class="product-image">
                            </a>



                            <div class="product-action">
                                <a href="{{route('shop.cart.addOne',['id' => $product->id])}}" class="btn-product btn-cart" title="Add to cart"><span>Thêm vào giỏ hàng</span></a>

                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                @foreach ($product->categories as $category)
                                <a href="#">{{$category->name}}, </a>
                                @endforeach

                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="{{route('shop.products.detail',['id' =>$product->id])}}">{{$product->name}}</a></h3><!-- End .product-title -->
                            <div class="product-price d-flex justify-content-center">
                                {{number_format($product->price)}} đ
                            </div><!-- End .product-price -->

                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                @endforeach

            </div><!-- End .row -->
        </div><!-- End .products -->
    </div><!-- End .container -->



    <div class="mb-5"></div><!-- End .mb-4 -->

    <div class="container for-you">
        <h2 class="title text-center mb-4">Sản phẩm ngẫu nhiên</h2><!-- End .title text-center -->

        <div class="products">
            <div class="row justify-content-center">

                @foreach ($randomProducts as $product)
                <div class="col-6 col-md-4 col-lg-3 text-center">
                    <div class="product product-2">
                        <figure class="product-media">
                            <a href="{{route('shop.products.detail',['id' => $product->id])}}">
                                <img src="{{$product->feature_image_path}}" alt="Product image" class="product-image">
                            </a>



                            <div class="product-action">
                                <a href="{{route('shop.cart.addOne',['id' => $product->id])}}" class="btn-product btn-cart" title="Add to cart"><span>Thêm vào giỏ hàng</span></a>

                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                @foreach ($product->categories as $category)
                                <a href="#">{{$category->name}}, </a>
                                @endforeach

                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="{{route('shop.products.detail',['id' =>$product->id])}}">{{$product->name}}</a></h3><!-- End .product-title -->
                            <div class="product-price d-flex justify-content-center">
                                {{number_format($product->price)}} đ
                            </div><!-- End .product-price -->

                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                @endforeach

            </div><!-- End .row -->
        </div><!-- End .products -->
    </div><!-- End .container -->

    <div class="mb-5"></div><!-- End .mb-4 -->

    <div class="container">
        <hr class="mb-0">
    </div><!-- End .container -->

    <div class="icon-boxes-container bg-transparent">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-rocket"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Miễn phí vận chuyển</h3><!-- End .icon-box-title -->
                            <p>Chúng tôi cam kết miễn phí vận chuyển</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-rotate-left"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Hủy đơn </h3><!-- End .icon-box-title -->
                            <p>Khi chưa duyệt bạn có thể hủy đơn</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-info-circle"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Sản phẩm chất lượng</h3><!-- End .icon-box-title -->
                            <p>Sản phẩm luôn chất lượng nhất</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-life-ring"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Hỗ trợ tận tình</h3><!-- End .icon-box-title -->
                            <p>Chúng tôi hỗ trợ 24/7 bất kì thắc mắc nào</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .icon-boxes-container -->
</main><!-- End .main -->
@endsection



<!-- advertisement popup -->

<div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="row no-gutters bg-white newsletter-popup-content">
                <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                    <div class="banner-content text-center">
                        <img src="assets/images/popup/newsletter/logo.png" class="logo" alt="logo" width="60" height="15">
                        <h2 class="banner-title">get <span>25<light>%</light></span> off</h2>
                        <p>Subscribe to the Molla eCommerce newsletter to receive timely updates from your favorite products.</p>
                        <form action="#">
                            <div class="input-group input-group-round">
                                <input type="email" class="form-control form-control-white" placeholder="Your Email Address" aria-label="Email Adress" required>
                                <div class="input-group-append">
                                    <button class="btn" type="submit"><span>go</span></button>
                                </div><!-- .End .input-group-append -->
                            </div><!-- .End .input-group -->
                        </form>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                            <label class="custom-control-label" for="register-policy-2">Do not show this popup again</label>
                        </div><!-- End .custom-checkbox -->
                    </div>
                </div>
                <div class="col-xl-2-5col col-lg-5 ">
                    <img src="assets/images/popup/newsletter/img-1.jpg" class="newsletter-img" alt="newsletter">
                </div>
            </div>
        </div>
    </div>
</div>