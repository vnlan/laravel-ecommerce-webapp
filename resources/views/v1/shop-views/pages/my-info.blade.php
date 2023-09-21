@extends('v1.shop-views.layouts.shop-layout')


@section('v1-shop-title')
<title>Tài khoản cá nhân</title>
@endsection

@section('v1-shop-js')

<script type="text/javascript" src="{{ asset('v1/resources/js/admin-page/reuseable/deny-order.js') }}"></script>
<script type="text/javascript" src="{{ asset('v1/resources/js/admin-page/reuseable/preview-image.js') }}"></script>
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
        <h1 class="page-title">Tài khoản cá nhân
            <!-- <span>Shop</span> -->
        </h1>
    </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Trang chủ</a></li>

                <li class="breadcrumb-item active" aria-current="page">Tài khoản cá nhân</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    <aside class="col-md-4 col-lg-3">
                        <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Chào mừng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Lịch sử đơn hàng</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Thông tin cá nhân</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('shop.auth.logout')}}">Đăng xuất</a>
                            </li>
                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                <p>Xin chào, <span class="font-weight-normal text-dark">{{Auth::user()->display_name}}</span> (không phải <span class="font-weight-normal text-dark">{{Auth::user()->display_name}}</span>? <a href="{{route('shop.auth.logout')}}">Đăng xuất</a>)
                                    <br>
                                    Từ trang quản trị tài khoản cá nhân, bạn có thể xem <a href="#tab-orders" class="tab-trigger-link link-underline">Lịch sử các đơn hàng</a>, quản lý được <a href="#tab-account" class="tab-trigger-link">Thông tin cá nhân của bạn</a>.
                                </p>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                @foreach ($myOrders as $order)
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-2">Mã đơn: #{{$order->id}}</h4>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p><span class="fw-bold">Người nhận: </span> {{$order->receiver_name}} </p>
                                                <p><span class="fw-bold">SĐT:</span> {{$order->receiver_phone}} </p>
                                                <p><span class="fw-bold">Email:</span> {{$order->receiver_email}}</p>
                                                <p><span class="fw-bold">Địa chỉ:</span> {{$order->receiver_address}}</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><span class="fw-bold">Ghi chú:</span>{{$order->note}}</p>
                                                <p><span class="fw-bold">Ngày đặt:</span> {{$order->created_at}}</p>
                                                <p><span class="fw-bold">Tổng tiền:</span><span> {{number_format($order->total)}} đ</span></p>

                                                @if ($order->status == 1)
                                                <p><span class="fw-bold">Trạng thái: </span><span class="badge rounded-pill bg-dark text-white"><i class="fa-solid fa-question"></i> Chờ duyệt</span></p>
                                                @elseif ($order->status == 2)
                                                <p><span class="fw-bold">Trạng thái: </span><span class="badge rounded-pill bg-warning text-white"><i class="fa-sharp fa-solid fa-clock"></i> Đang lấy hàng</span></p>

                                                @elseif ($order->status == 3)
                                                <p><span class="fw-bold">Trạng thái: </span><span class="badge rounded-pill bg-info text-white"><i class="fa-sharp fa-solid fa-truck"></i> Đang vận chuyển</span></p>
                                                @elseif ($order->status == 4)
                                                <p><span class="fw-bold">Trạng thái: </span><span class="badge rounded-pill bg-success text-white"><i class="fa-solid fa-circle-check"></i> Đã hoàn thành</span></p>
                                                @else
                                                <p><span class="fw-bold">Trạng thái: </span><span class="badge rounded-pill bg-danger text-white"><i class="fa-solid fa-circle-xmark"></i> Đã hủy</span></p>
                                                @endif

                                            </div>
                                            <div class="col-md-2 d-flex justify-content-center align-items-center">
                                                @if ($order->status < 2 ) <a href="#order-detail-modal{{$order->id}}" data-toggle="modal" class="btn btn-info btn-round"><i class="fa-sharp fa-solid fa-pen-to-square"></i>Chi tiết</a>
                                                    <div class="mx-2"></div>
                                                    <a href="" class="btn btn-danger btn-round action-deny-order" data-url="{{route('orders.deny' , ['id' => $order->id])}}"><i class="fa-solid fa-xmark"></i>Hủy đơn</a>
                                                    @else
                                                    <a href="#order-detail-modal{{$order->id}}" data-toggle="modal" class="btn btn-info btn-round"><i class="fa-sharp fa-solid fa-pen-to-square"></i>Chi tiết</a>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Sign in / Register Modal -->
                                <div class="modal fade" id="order-detail-modal{{$order->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><i class="icon-close"></i></span>
                                                </button>

                                                <div class="form-box">
                                                    <div class="form-tab">
                                                        <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="order-detail-tab" data-toggle="tab" href="#receiver-detail{{$order->id}}" role="tab" aria-controls="signin" aria-selected="true">Người nhận</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="product-detail-tab" data-toggle="tab" href="#order-product{{$order->id}}" role="tab" aria-controls="register" aria-selected="false">Sản phẩm</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content" id="tab-content-5">
                                                            <div class="tab-pane fade show active" id="receiver-detail{{$order->id}}" role="tabpanel" aria-labelledby="signin-tab">
                                                                <form action="{{route('shop.my-info.update-order',['id' => $order->id])}}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-lg-12">

                                                                            <div class="row">
                                                                                <div class="col-sm-6">
                                                                                    <label>Họ tên người nhận*</label>
                                                                                    <input type="text" name="receiver_name" value="{{$order->receiver_name}}" placeholder="Nhập họ tên người nhận" class="form-control" required>
                                                                                </div><!-- End .col-sm-6 -->

                                                                                <div class="col-sm-6">
                                                                                    <label>Số điện thoại *</label>
                                                                                    <input type="tel" name="receiver_phone" value="{{$order->receiver_phone}}" placeholder="Nhập số điện thoại người nhận" pattern="[0-9]{10}" class="form-control" required>
                                                                                </div><!-- End .col-sm-6 -->
                                                                            </div><!-- End .row -->

                                                                            <label>Email *</label>
                                                                            <input type="email" name="receiver_email" value="{{$order->receiver_email}}" placeholder="Nhập email người nhận" class="form-control" required>


                                                                            <label>Địa chỉ người nhận *</label>
                                                                            <textarea class="form-control" name="receiver_address" cols="30" rows="4" placeholder="Địa chỉ của người nhận hàng, mặc định sẽ là địa chỉ người đặt" required>{{$order->receiver_address}}</textarea>

                                                                            <label>Ghi chú (Không bắt buộc)</label>
                                                                            <textarea class="form-control" name="note" cols="30" rows="4" placeholder="Ghi chú về đơn hàng ví dụ: giờ nhận hàng, ghi chú cho shop,...">{{$order->note}}</textarea>
                                                                        </div><!-- End .col-lg-9 -->
                                                                    </div>
                                                                    @if ($order->status < 2) <button class="btn btn-primary" type="submit">Sửa </button>
                                                                        @endif

                                                                </form>

                                                            </div><!-- .End .tab-pane -->
                                                            <div class="tab-pane fade" id="order-product{{$order->id}}" role="tabpanel" aria-labelledby="register-tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <table class="table text-center">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th scope="col">Mã</th>
                                                                                    <th scope="col">Tên sản phẩm</th>
                                                                                    <th scope="col">Giá</th>
                                                                                    <th scope="col">SL</th>
                                                                                    <th scope="col">Tổng</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($order->products as $product)


                                                                                <tr>
                                                                                    <td>{{$product->id}}</td>
                                                                                    <td align="center">
                                                                                        <span><img class="center-block" style="border-radius:100%" width="50" height="50" src="{{$product->feature_image_path}}"></span>

                                                                                        <a href="{{route('shop.products.detail',['id' => $product->id])}}"><span class="fw-bold fs-5 mx-3">{{$product->name}}</span></a>
                                                                                    </td>
                                                                                    <td>{{number_format($product->pivot->price)}} đ</td>
                                                                                    <td>{{$product->pivot->quantity}}</td>
                                                                                    <td> <span class="fw-bold fs-5">{{number_format($product->pivot->total)}} đ</span></td>
                                                                                </tr>
                                                                                @endforeach
                                                                                <tr>
                                                                                    <td class="fs-3 fw-bold" colspan="3"><span>Tổng cộng:</span></td>
                                                                                    <td><span class="fw-bold fs-3">{{number_format($order->total)}} đ</span></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>

                                                                    </div>
                                                                </div>

                                                            </div><!-- .End .tab-pane -->
                                                        </div><!-- End .tab-content -->
                                                    </div><!-- End .form-tab -->
                                                </div><!-- End .form-box -->
                                            </div><!-- End .modal-body -->
                                        </div><!-- End .modal-content -->
                                    </div><!-- End .modal-dialog -->
                                </div><!-- End .modal -->
                                @endforeach


                                <!-- <p>No order has been made yet.</p>
                                <a href="category.html" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a> -->
                            </div>

                            <!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-downloads" role="tabpanel" aria-labelledby="tab-downloads-link">
                                <p>No downloads available yet.</p>
                                <a href="category.html" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
                                <p>The following addresses will be used on the checkout page by default.</p>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">Billing Address</h3><!-- End .card-title -->

                                                <p>User Name<br>
                                                    User Company<br>
                                                    John str<br>
                                                    New York, NY 10001<br>
                                                    1-234-987-6543<br>
                                                    yourmail@mail.com<br>
                                                    <a href="#">Edit <i class="icon-edit"></i></a>
                                                </p>
                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->

                                    <div class="col-lg-6">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">Shipping Address</h3><!-- End .card-title -->

                                                <p>You have not set up this type of address yet.<br>
                                                    <a href="#">Edit <i class="icon-edit"></i></a>
                                                </p>
                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->
                                </div><!-- End .row -->
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                <form action="{{route('shop.my-info.update-info',['id' => Auth::user()->id ])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-5">
                                        @if (Auth::user()->avatar_path)
                                        <div class="img-upload-container">
                                            <img class="avatar1 img-upload-holder" src="{{Auth::user()->avatar_path}}">
                                            <input type="file" name="avatar_path" class="hide-file" onchange="showSinglePicture(this,1);">
                                        </div>
                                        @else
                                        <div class="img-upload-container">
                                            <img class="avatar1 img-upload-holder" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                            <input type="file" name="avatar_path" class="hide-file" onchange="showSinglePicture(this,1);">
                                        </div>
                                        @endif

                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Họ tên *</label>
                                            <input type="text" value="{{Auth::user()->display_name}}" name="display_name" class="form-control" required>
                                            <small class="form-text">Đây là tên mặc định khi bạn đặt hàng</small>
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Giới tính *</label>
                                            <select class="form-control" name="gender" required>
                                                <option value="0" {{(Auth::user()->gender == 0) ? 'selected' : ''}}>Nam</option>
                                                <option value="1" {{(Auth::user()->gender == 1) ? 'selected' : ''}}>Nữ</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Ngày sinh *</label>
                                            <input type="date" name="dob" value="{{Auth::user()->dob}}" class="form-control" required>
                                        </div>
                                    </div><!-- End .row -->



                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Số điện thoại *</label>
                                            <input type="text" value="{{Auth::user()->phone}}" name="phone" class="form-control" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Email *</label>
                                            <input type="text" value="{{Auth::user()->email}}" class="form-control" disabled required>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Địa chỉ *</label>
                                            <textarea class="form-control" name="address" rows="6">{{Auth::user()->address}}</textarea>
                                        </div>


                                    </div>



                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>Lưu thay đổi</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>
                            </div><!-- .End .tab-pane -->
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->

</main><!-- End .main -->

@endsection