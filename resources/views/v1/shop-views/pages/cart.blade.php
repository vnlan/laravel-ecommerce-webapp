
@extends('v1.shop-views.layouts.shop-layout')


@section('v1-shop-title')
    <title>Giỏ hàng</title>
@endsection


@section('v1-shop-js')
<script src="{{ asset('v1/themes/molla-shop-template/assets/js/bootstrap-input-spinner.js') }}">
</script>
<script src="{{ asset('v1/resources/js/shop-page/reuseable/update-cart.js') }}"></script>
@endsection

@section('v1-shop-css')
<link rel="stylesheet" href="{{ asset('v1/resources/css/admin-page/reuseable/hide-input-file.css') }}">
</link>
<link rel="stylesheet" href="{{ asset('v1/resources/css/admin-page/reuseable/color-toast.css') }}">
@endsection

@section('v1-shop-content')
<div class="my-3"></div>
<main class="main">
    <div class="page-header text-center" style="background-image: url('v1/themes/molla-shop-template/assets/images/page-header-bg.jpg')" > 
        <div class="container">
            <h1 class="page-title">Giỏ hàng
                <!-- <span>Shop</span> -->
            </h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Cửa hàng</a></li>
                <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <table class="table table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($carts as $cart)
                               
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="{{$cart->options->feature_image}}" alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="#">{{$cart->name}}</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">{{ number_format($cart->price)}} đ</td>
                                    <td class="quantity-col">
                                        <div class="cart-product-quantity">
                                            <input type="number" id="inputCartQty{{$cart->rowId}}" class="form-control" value="{{$cart->qty}}" min="1" max="{{$cart->options->stock}}" step="1" data-decimals="0" onchange="updateCart('{{$cart->rowId}}')"  required>
                                        </div><!-- End .cart-product-quantity -->
                                    
                                    
                                    </td>



                                    <td class="price-col">{{number_format($cart->price * $cart->qty)}} đ</td>
                                    <td class="remove-col"><a href="{{route('shop.cart.delete', ['rowId' => $cart->rowId])}}" class="btn-remove"><i class="icon-close"></i></a></td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table><!-- End .table table-wishlist -->

                        <div class="cart-bottom">
                            <div class="cart-discount">
                                <form action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control" required placeholder="coupon code">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                                        </div><!-- .End .input-group-append -->
                                    </div><!-- End .input-group -->
                                </form>
                            </div><!-- End .cart-discount -->

                            <a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a>
                        </div><!-- End .cart-bottom -->
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Tổng giỏ hàng</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Tạm tính:</td>
                                        <td>{{number_format($cartSubtotal)}} đ</td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr class="summary-shipping">
                                        <td>Phí vận chuyển:</td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="free-shipping" name="shipping" class="custom-control-input" checked>
                                                <label class="custom-control-label" for="free-shipping">Miễn phí</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td>0 đ</td>
                                    </tr><!-- End .summary-shipping-row -->


                     

                                    <!-- <tr class="summary-shipping-estimate">
                                        <td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a></td>
                                        <td>&nbsp;</td>
                                    </tr> -->
                                    <!-- End .summary-shipping-estimate -->

                                    <tr class="summary-total">
                                        <td>Tổng cộng:</td>
                                        <td>{{number_format($cartTotal)}} đ</td>
                                    </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->

                            <a href="{{route('shop.checkout.index')}}" class="btn btn-outline-primary-2 btn-order btn-block">TIẾN HÀNH ĐẶT HÀNG</a>
                        </div><!-- End .summary -->

                        <a href="{{route('shop.products.all')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>TIẾP TỤC MUA SẮM</span><i class="icon-refresh"></i></a>
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection