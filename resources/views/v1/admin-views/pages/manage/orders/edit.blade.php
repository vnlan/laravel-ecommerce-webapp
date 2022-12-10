<!DOCTYPE html>
@extends('v1.admin-views.layouts.admin-layout')

@section('v1-admin-title')
<title>Sửa Đơn hàng</title>
@endsection

@section('v1-admin-js')
<script type="text/javascript" src="{{ asset('v1/resources/js/admin-page/reuseable/preview-image.js') }}"></script>
<script type="text/javascript" src="{{ asset('v1/resources/js/admin-page/reuseable/select2.js') }}"></script>
<script type="text/javascript" src="{{ asset('v1/resources/js/admin-page/reuseable/tinymce.js') }}"></script>

@endsection

@section('v1-admin-css')
<link rel="stylesheet" href="{{ asset('v1/resources/css/admin-page/reuseable/img-fit.css') }}">
</link>
<link rel="stylesheet" href="{{ asset('v1/resources/css/admin-page/reuseable/hide-input-file.css') }}">
</link>
@endsection

<style>
    .select2 {
        width: 100% !important;
    }
</style>

@section('v1-admin-content')

<div class="container-xxl flex-grow-1 container-p-y">

    @include('v1.admin-views.partials.content-header',['pageParent' => 'Quản lý Đơn hàng', 'pageName' => 'Sửa Đơn hàng'])



    <div class="row">

        <!-- Button with Badges -->
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between my-2">
                    <div class="p-2">
                        <h5 class="card-title mb-0">Chi tiết đơn hàng</h5>
                    </div>

                </div>

                <div class="card-body">

                    <div class="table-responsive text-nowrap">
                        <table style="line-height: 3" id="table1" class="table table-hover table-lg">
                            <thead class="table-light">
                                <tr>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Tạm tính</th>

                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">


                                @foreach ($order->products as $product)


                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>
                                        <span><img style="border-radius:50%" width="60" height="60" src="{{$product->feature_image_path}}"></span>
                                        <a href="{{route('products.edit',['id' => $product->id])}}"><span class="fw-bold fs-5 mx-3">{{$product->name}}</span></a>
                                    </td>
                                    <td>{{number_format($product->pivot->price)}} đ</td>
                                    <td>{{$product->pivot->quantity}}</td>
                                    <td> <span class="fw-bold fs-5">{{number_format($product->pivot->total)}} đ</span></td>

                                    <!-- @if ($order->status == 1)
                    <td><span class="badge rounded-pill bg-secondary"><i class='bx bx-question-mark'></i> Chờ phê duyệt</span></td>
                  @elseif ($order->status == 2)
                    <td><span class="badge rounded-pill bg-warning"><i class='bx bx-stopwatch'></i> Đang lấy hàng</span></td>
                  @elseif ($order->status == 3)
                    <td><span class="badge rounded-pill bg-info"><i class='bx bxs-truck'></i> Đang vận chuyển</span></td>
                  @elseif ($order->status == 4)
                    <td><span class="badge rounded-pill bg-success"><i class='bx bxs-check-circle'></i> Đã hoàn thành</span></td>
                  @else
                  <td><span class="badge rounded-pill bg-danger"><i class='bx bxs-x-circle'></i> Đã hủy đơn</span></td>
                  @endif -->



                                </tr>
                                @endforeach

                                <tr>
                                    <td class="text-center fs-3 fw-bold" colspan="4"><span>Tổng cộng:</span></td>
                                    <td><span class="fw-bold fs-3">{{number_format($order->total)}} đ</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <div class="my-5 text-center">
                        <form action="{{route('orders.update', ['id' => $order->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-5">

                                <label class="col-sm-2 col-form-label fw-bold fs-6" for="basic-default-name">Ngày đặt:</label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{$order->created_at}}" disabled>
                                    </div>
                                </div>

                                <label class="col-sm-2 col-form-label fw-bold fs-6" for="basic-default-name">Trạng thái đơn hàng:</label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <select class="form-select" name="status">

                                            <option value="1" {{($order->status == 1) ? 'selected' : ''}}>Chờ phê duyệt</option>
                                            <option value="2" {{($order->status == 2) ? 'selected' : ''}}>Đang lấy hàng</option>
                                            <option value="3" {{($order->status == 3) ? 'selected' : ''}}>Đang vận chuyển</option>
                                            <option value="4" {{($order->status == 4) ? 'selected' : ''}}>Đã hoàn thành</option>
                                            <option value="5" {{($order->status == 5) ? 'selected' : ''}}>Đã hủy đơn</option>
                                        </select>
                                    </div>
                                </div>


                            </div>

                            <button type="submit" class="btn btn-primary">Xác nhận Sửa</button>
                            <button type="reset" class="btn btn-secondary">Hủy</button>
                        </form>
                    </div>


                </div>

            </div>



        </div>



    </div>

    <div class="row">

        <!-- Button with Badges -->
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between my-2">
                    <div class="p-2">
                        <h5 class="card-title mb-0">Thông tin người nhận hàng</h5>
                    </div>
                    <!-- <div class="pt-md-0">
        <button class="dt-button create-new btn btn-primary" type="button">
            <span>
                <i class="bx bx-plus me-sm-2"></i>
                <span class="d-none d-sm-inline-block">Thêm mới danh mục</span>
            </span>
        </button>
    </div> -->
                </div>

                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">


                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="basic-default-fullname">Họ và tên</label>
                                <div class="input-group">
                                    <input type="text" name="name" value="{{$order->receiver_name}}" class="form-control" placeholder="Nhập hoặc nói Họ và tên" disabled>

                                </div>
                            </div>




                        </div>
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-default-fullname">Số điện thoại</label>
                                <div class="input-group ">
                                    <input type="text" name="phone" value="{{$order->receiver_phone}}" class="form-control" placeholder="Nhập hoặc nói số điện thoại" disabled>

                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-default-fullname">Email</label>
                                <div class="input-group">
                                    <input type="email" name="email" value="{{$order->receiver_email}}" class="form-control" placeholder="Nhập hoặc nói email" disabled>

                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-default-fullname">Địa chỉ</label>
                                <textarea class="form-control" placeholder="Địa chỉ người nhận không có" rows="5" disabled>{{$order->receiver_address}}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-default-fullname">Lời nhắn</label>
                                <textarea class="form-control" placeholder="Người đặt không để lại lời nhắn" rows="5" disabled>{{$order->note}}</textarea>
                            </div>
                        </div>



                        <!-- <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Tiểu sử hoặc mô tả</label>
            <textarea class="form-control tinymce-editor" name="description" id="exampleFormControlTextarea1" rows="25">{{$order->description}}</textarea>
        </div> -->

                        <!-- <button type="submit" class="btn btn-primary">Xác nhận Sửa</button>
        <button type="reset" class="btn btn-secondary">Hủy</button> -->
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="row">

        <!-- Button with Badges -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between my-2">
                    <div class="p-2">
                        <h5 class="card-title mb-0">Thông tin người đặt</h5>
                    </div>
                    <!-- <div class="pt-md-0">
                        <button class="dt-button create-new btn btn-primary" type="button">
                            <span>
                                <i class="bx bx-plus me-sm-2"></i>
                                <span class="d-none d-sm-inline-block">Thêm mới danh mục</span>
                            </span>
                        </button>
                    </div> -->
                </div>

                <div class="card-body">
                    <form action="{{route('orders.update',['id' => $order->id ])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-5">
                            @if (isset($order->customer->avatar_path))
                            <div class="img-upload-container">
                                <img class="avatar1 img-upload-holder" src="{{$order->customer->avatar_path}}">
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
                            <div class="col-md-8 mb-3">
                                <label class="form-label" for="basic-default-fullname">Họ và tên</label>
                                <div class="input-group">
                                    <input type="text" name="name" value="{{$order->customer->display_name}}" class="form-control" placeholder="Nhập hoặc nói Họ và tên" disabled>

                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="basic-default-fullname">Giới tính</label>
                                <select class="form-select" name="gender" disabled>
                                    @if ($order->customer->gender == 0)
                                    <option value="0" selected>Nam</option>
                                    <option value="1">Nữ</option>
                                    @else
                                    <option value="0">Nam</option>
                                    <option value="1" selected>Nữ</option>

                                    @endif
                                </select>
                            </div>


                        </div>
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-default-fullname">Số điện thoại</label>
                                <div class="input-group ">
                                    <input type="text" name="phone" value="{{$order->customer->phone}}" class="form-control" placeholder="Nhập hoặc nói số điện thoại" disabled>

                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-default-fullname">Email</label>
                                <div class="input-group">
                                    <input type="email" name="email" value="{{$order->customer->email}}" class="form-control" placeholder="Nhập hoặc nói email" disabled>

                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-default-fullname">Vai trò</label>
                                <select class="form-select" name="role_id" disabled>
                                    <option value="1" {{($order->customer->role_id == 1) ? 'selected' : ''}}>Quản trị viên cấp cao</option>
                                    <option value="2" {{($order->customer->role_id == 2) ? 'selected' : ''}}>Quản trị viên</option>
                                    <option value="3" {{($order->customer->role_id == 3) ? 'selected' : ''}}>Người soạn nội dung</option>
                                    <option value="4" {{($order->customer->role_id == 4) ? 'selected' : ''}}>Nhà thiết kế</option>
                                    <option value="5" {{($order->customer->role_id == 5) ? 'selected' : ''}}>Khách hàng VIP</option>
                                    <option value="6" {{($order->customer->role_id == 6) ? 'selected' : ''}}>Khách hàng thường</option>

                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-default-fullname">Trạng thái</label>
                                <select class="form-select" name="active" disabled>
                                    @if ($order->customer->active == 1)
                                    <option value="1" selected>Đang hoạt động</option>
                                    <option value="0">Không hoạt động</option>
                                    @else
                                    <option value="1">Đang hoạt động</option>
                                    <option value="0" selected>Không hoạt động</option>

                                    @endif
                                </select>
                            </div>
                        </div>



                        <!-- <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Tiểu sử hoặc mô tả</label>
                            <textarea class="form-control tinymce-editor" name="description" id="exampleFormControlTextarea1" rows="25">{{$order->description}}</textarea>
                        </div> -->

                        <!-- <button type="submit" class="btn btn-primary">Xác nhận Sửa</button>
                        <button type="reset" class="btn btn-secondary">Hủy</button> -->
                    </form>
                </div>

            </div>
        </div>
        <!-- Button with Badges -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between my-2">
                    <div class="p-2">
                        <h5 class="card-title mb-0">Thông tin nhân viên duyệt</h5>
                    </div>
                    <!-- <div class="pt-md-0">
                        <button class="dt-button create-new btn btn-primary" type="button">
                            <span>
                                <i class="bx bx-plus me-sm-2"></i>
                                <span class="d-none d-sm-inline-block">Thêm mới danh mục</span>
                            </span>
                        </button>
                    </div> -->
                </div>

                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="row mb-5">
                            @if (isset($order->employee->avatar_path))
                            <div class="img-upload-container">
                                <img class="avatar1 img-upload-holder" src="{{$order->employee->avatar_path}}">
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
                            <div class="col-md-8 mb-3">
                                <label class="form-label" for="basic-default-fullname">Họ và tên</label>
                                <div class="input-group">
                                    <input type="text" name="name" value="{{$order->employee->display_name}}" class="form-control" placeholder="Nhập hoặc nói Họ và tên" disabled>

                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="basic-default-fullname">Giới tính</label>
                                <select class="form-select" name="gender" disabled>
                                    @if ($order->employee->gender == 0)
                                    <option value="0" selected>Nam</option>
                                    <option value="1">Nữ</option>
                                    @else
                                    <option value="0">Nam</option>
                                    <option value="1" selected>Nữ</option>

                                    @endif
                                </select>
                            </div>


                        </div>
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-default-fullname">Số điện thoại</label>
                                <div class="input-group ">
                                    <input type="text" name="phone" value="{{$order->employee->phone}}" class="form-control" placeholder="Nhập hoặc nói số điện thoại" disabled>

                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-default-fullname">Email</label>
                                <div class="input-group">
                                    <input type="email" name="email" value="{{$order->employee->email}}" class="form-control" placeholder="Nhập hoặc nói email" disabled>

                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-default-fullname">Vai trò</label>
                                <select class="form-select" name="role_id" disabled>
                                    <option value="1" {{($order->employee->role_id == 1) ? 'selected' : ''}}>Quản trị viên cấp cao</option>
                                    <option value="2" {{($order->employee->role_id == 2) ? 'selected' : ''}}>Quản trị viên</option>
                                    <option value="3" {{($order->employee->role_id == 3) ? 'selected' : ''}}>Người soạn nội dung</option>
                                    <option value="4" {{($order->employee->role_id == 4) ? 'selected' : ''}}>Nhà thiết kế</option>
                                    <option value="5" {{($order->employee->role_id == 5) ? 'selected' : ''}}>Khách hàng VIP</option>
                                    <option value="6" {{($order->employee->role_id == 6) ? 'selected' : ''}}>Khách hàng thường</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-default-fullname">Trạng thái</label>
                                <select class="form-select" name="active" disabled>
                                    @if ($order->employee->active == 1)
                                    <option value="1" selected>Đang hoạt động</option>
                                    <option value="0">Không hoạt động</option>
                                    @else
                                    <option value="1">Đang hoạt động</option>
                                    <option value="0" selected>Không hoạt động</option>

                                    @endif
                                </select>
                            </div>
                        </div>



                        <!-- <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Tiểu sử hoặc mô tả</label>
                            <textarea class="form-control tinymce-editor" name="description" id="exampleFormControlTextarea1" rows="25">{{$order->description}}</textarea>
                        </div> -->

                        <!-- <button type="submit" class="btn btn-primary">Xác nhận Sửa</button>
                        <button type="reset" class="btn btn-secondary">Hủy</button> -->
                    </form>
                </div>

            </div>
        </div>


    </div>









</div>
@endsection