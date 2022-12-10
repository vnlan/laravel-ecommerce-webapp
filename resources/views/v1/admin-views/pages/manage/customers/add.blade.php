<!DOCTYPE html>
@extends('v1.admin-views.layouts.admin-layout')

@section('v1-admin-title')
<title>Thêm mới Khách hàng</title>
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

    @include('v1.admin-views.partials.content-header',['pageParent' => 'Quản lý Khách hàng', 'pageName' => 'Thêm mới Khách hàng'])


    <div class="row">

        <!-- Button with Badges -->
        <div class="col-lg">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between my-2">
                    <div class="p-2">
                        <h5 class="card-title mb-0">Thêm mới Khách hàng</h5>
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
                    <form action="{{route('customers.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-5">
                            <div class="img-upload-container">
                                <img class="avatar1 img-upload-holder" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                <input type="file" name="avatar_path" class="hide-file" onchange="showSinglePicture(this,1);">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="basic-default-fullname">Họ và tên</label>
                                <div class="input-group input-group-merge speech-to-text">
                                    <input type="text" name="name" class="form-control" placeholder="Nhập hoặc nói họ tên" aria-describedby="text-to-speech-addon" required>
                                    <span class="input-group-text" id="text-to-speech-addon">
                                        <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">

                                <label class="form-label" for="basic-default-fullname">Ngày sinh</label>
                                <div class="input-group ">
                                    <input type="date" name="dob" class="form-control" placeholder="Nhập hoặc nói tên sản phẩm" aria-describedby="text-to-speech-addon" required>

                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="basic-default-fullname">Giới tính</label>
                                <select class="form-select" name="gender" required>
                                    <option value="0">Nam</option>
                                    <option value="1">Nữ</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="basic-default-fullname">Số điện thoại</label>
                                <div class="input-group input-group-merge speech-to-text">
                                    <input type="number" name="phone" class="form-control" placeholder="Nhập hoặc nói số điện thoại" aria-describedby="text-to-speech-addon" required>
                                    <span class="input-group-text" id="text-to-speech-addon">
                                        <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                                    </span>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="basic-default-fullname">Nhập email</label>
                                <div class="input-group input-group-merge speech-to-text">
                                    <input type="email" name="email" class="form-control" placeholder="Nhập hoặc nói email" aria-describedby="text-to-speech-addon" required>
                                    <span class="input-group-text" id="text-to-speech-addon">
                                        <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-password-toggle">
                                    <label class="form-label" for="basic-default-password32">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" class="form-control" name="password" id="basic-default-password32" placeholder="············" aria-describedby="basic-default-password">
                                        <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="basic-default-fullname">Vai trò</label>
                                <select class="form-select" name="role_id" required>
                                    <option value="6">Khách hàng thường</option>
                                    <option value="5">Khách hàng VIP</option>
                                   
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="basic-default-fullname">Trạng thái</label>
                                <select class="form-select" name="active" required>
                                    <option value="1">Đang hoạt động</option>
                                    <option value="0">Không hoạt động</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="row">
         
                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="basic-default-fullname">Lương tháng</label>
                                <div class="input-group input-group-merge speech-to-text">
                                    <input type="number" min="0" name="salary_per_month" class="form-control" placeholder="Nhập hoặc nói lương tháng" aria-describedby="text-to-speech-addon" required>
                                    <span class="input-group-text" id="text-to-speech-addon">
                                        <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                                    </span>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-default-fullname">Ảnh CMT mặt trước:</label>
                                <div class="">
                                    <input type="file" class="form-control" name="id_card_front" onchange="showSinglePicture(this,2);" id="" placeholder="ACME Inc.">
                                    <img class="avatar2 my-3 img-custom" width="250" height="200" src="https://banksiafdn.com/wp-content/uploads/2019/10/placeholde-image.jpg">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-default-fullname">Ảnh CMT mặt sau:</label>
                                <div class="">
                                    <input type="file" class="form-control" name="id_card_back" onchange="showSinglePicture(this,3);" id="" placeholder="ACME Inc.">
                                    <img class="avatar3 my-3 img-custom" width="250" height="200" src="https://banksiafdn.com/wp-content/uploads/2019/10/placeholde-image.jpg">
                                </div>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <label class="form-label" for="basic-default-company">Địa chỉ</label>
                            <div class="input-group input-group-merge speech-to-text">
                                <textarea class="form-control" name="address" placeholder="Điền hoặc nói địa chỉ" rows="6"></textarea>
                                <span class="input-group-text">
                                    <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                                </span>
                            </div>
                        </div>
<!-- 
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Tiểu sử hoặc mô tả</label>
                            <textarea class="form-control tinymce-editor" name="description" id="exampleFormControlTextarea1" rows="25"></textarea>
                        </div> -->

                        <button type="submit" class="btn btn-primary">Xác nhận thêm</button>
                        <button type="reset" class="btn btn-secondary">Hủy</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection