@extends('v1.shop-views.layouts.shop-layout')


@section('v1-shop-title')
<title>Đặt hàng</title>
@endsection


@section('v1-shop-css')
<link rel="stylesheet" href="{{ asset('v1/resources/css/admin-page/reuseable/hide-input-file.css') }}">
</link>
<link rel="stylesheet" href="{{ asset('v1/resources/css/admin-page/reuseable/color-toast.css') }}">
@endsection

@section('v1-shop-content')
<div class="my-3"></div>
<main class="main">
    <div class="page-header text-center" style="background-image: url('v1/themes/molla-shop-template/assets/images/page-header-bg.jpg')"">
        <div class=" container">
        <h1 class="page-title">Đặt hàng
            <!-- <span>Shop</span> -->
        </h1>
    </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Cửa hàng</a></li>
                <li class="breadcrumb-item active" aria-current="page">Đặt hàng</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <!-- <div class="checkout-discount">
                    <form action="#">
                        <input type="text" class="form-control" required id="checkout-discount-input">
                        <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
                    </form>
                </div> -->
                <!-- End .checkout-discount -->
                <form action="{{route('shop.checkout.add-order')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            <h2 class="checkout-title">Thông tin đơn hàng</h2><!-- End .checkout-title -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Họ tên người nhận*</label>
                                    <input type="text" name="receiver_name" value="{{Auth::user()->display_name}}" placeholder="Nhập họ tên người nhận" class="form-control" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Số điện thoại *</label>
                                    <input type="tel" name="receiver_phone" value="{{Auth::user()->phone}}" placeholder="Nhập số điện thoại người nhận"  pattern="[0-9]{10}" class="form-control" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <label>Email *</label>
                            <input type="email" name="receiver_email" value="{{Auth::user()->email}}" placeholder="Nhập email người nhận" class="form-control" required>


                            <label>Địa chỉ người nhận *</label>
                            <textarea class="form-control" name="receiver_address" cols="30" rows="4" placeholder="Địa chỉ của người nhận hàng, mặc định sẽ là địa chỉ người đặt" required>{{Auth::user()->address}}</textarea>
                           
                            <label>Ghi chú (Không bắt buộc)</label>
                            <textarea class="form-control" name="note" cols="30" rows="4" placeholder="Ghi chú về đơn hàng ví dụ: giờ nhận hàng, ghi chú cho shop,..."></textarea>
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary">
                                <h3 class="summary-title">Chi tiết đơn hàng</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Tổng</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($carts as $cart)
                                        <tr>
                                            <td><a href="#">{{$cart->name}}</a><span> x {{$cart->qty}}</span></td>
                                            <td>{{number_format($cart->price * $cart->qty)}} đ</td>
                                        </tr>
                                        @endforeach


                                        <tr class="summary-subtotal">
                                            <td>Tạm tính:</td>
                                            <td>{{number_format($cartSubtotal)}} đ</td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr>
                                            <td>Phí vận chuyển:</td>
                                            <td>Miễn phí</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Tổng cộng:</td>
                                            <td>{{number_format($cartTotal)}} đ</td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <div class="accordion-summary" id="accordion-payment">
                                    <div class="card">
                                        <div class="card-header" id="heading-2">
                                            <h2 class="card-title">
                                                <input type="radio" class="collapsed" name="payment_type" value="1" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2" checked>
                                               Thanh toán khi nhận hàng
                                                </input>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-2" class="collapse show" aria-labelledby="heading-2" data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Khách hàng thanh toán bằng tiền mặt cho shipper khi nhận hàng
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->
                                    <p class="my-5"></p>
                      


                                    <div class="card">
                                        <div class="card-header" id="heading-5">
                                            <h2 class="card-title">
                                                <input type="radio" name="payment_type" value="2" class="collapsed"  data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5" disabled>
                                                   Thanh toán Online (Chưa hỗ trợ)
                                                    <p class="my-2"></p>
                                                    <img src="{{asset('v1/themes/molla-shop-template/assets/images/payments-summary.png')}}" alt="payments cards">
                                                </input>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-payment">
                                            <div class="card-body"> Thanh toán qua thẻ ngân hàng hoặc Visa
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->
                                </div><!-- End .accordion -->

                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Đặt hàng</span>
                                    <span class="btn-hover-text">Xác nhận đặt hàng</span>
                                </button>
                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection