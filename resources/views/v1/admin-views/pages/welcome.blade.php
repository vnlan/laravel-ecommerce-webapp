<!DOCTYPE html>
@extends('v1.admin-views.layouts.admin-layout')

@section('v1-admin-title')
<title>Trang chào mừng</title>
@endsection

@section('v1-admin-js')
<script type="text/javascript" src="{{ asset('v1/resources/js/admin-page/reuseable/preview-image.js') }}"></script>
@endsection

@section('v1-admin-css')
<link rel="stylesheet" href="{{ asset('v1/resources/css/admin-page/reuseable/img-fit.css') }}">
</link>
@endsection

@section('v1-admin-content')

<div class="container-xxl flex-grow-1 container-p-y">

    @include('v1.admin-views.partials.content-header',['pageParent' => 'Trang chủ', 'pageName' => 'Chào mừng'])


    <div class="row">

        <!-- Examples -->
        <div class="row mb-5">
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100">
                    <img class="card-img-top" src="https://www.kindpng.com/picc/m/766-7662648_statistics-clipart-png-transparent-png.png" alt="Card image cap" />
                    <div class="card-body">
                        <h5 class="card-title">Xem thống kê</h5>
                        <p class="card-text">
                            Tinawatch Admin giúp bạn xem chi tiết thống kê
                        </p>
                        <a href="javascript:void(0)" class="btn btn-outline-primary">Xem ngay</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100">
                    <img class="card-img-top" src="https://www.pngitem.com/pimgs/m/87-872141_catalog-png-pic-catalogue-catalog-clip-art-transparent.png" alt="Card image cap" />
                    <div class="card-body">
                        <h5 class="card-title">Quản lý danh mục sản phẩm</h5>
                        <p class="card-text">
                           Tinawatch Admin giúp bạn Quản lý các danh mục sản phẩm
                        </p>
                        <a href="javascript:void(0)" class="btn btn-outline-primary">Xem ngay</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100">
                    <img class="card-img-top" src="https://www.freeiconspng.com/uploads/company-icon--desktop-business-icons--softiconsm-23.png" alt="Card image cap" />
                    <div class="card-body">
                        <h5 class="card-title">Quản lý hãng sản xuất</h5>
                        <p class="card-text">
                        Tinawatch Admin giúp bạn Quản lý các hãng sản xuất
                        </p>
                        <a href="javascript:void(0)" class="btn btn-outline-primary">Xem ngay</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Examples -->

        <!-- Examples -->
        <div class="row mb-5">
                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                    <img class="card-img-top" src="https://png.pngtree.com/png-vector/20190721/ourlarge/pngtree-wrist-watch-icon-png-image_1567358.jpg" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title">Quản lý Sản phẩm</h5>
                      <p class="card-text">
                      Tinawatch Admin giúp bạn Quản lý các sản phẩm
                      </p>
                      <a href="javascript:void(0)" class="btn btn-outline-primary">Xem ngay</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                    <img class="card-img-top" src="https://cdn-icons-png.flaticon.com/512/3336/3336049.png" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title">Quản lý Đơn hàng</h5>
                      <p class="card-text">
                      Tinawatch Admin giúp bạn Quản lý các Đơn hàng
                      </p>
                      <a href="javascript:void(0)" class="btn btn-outline-primary">Xem ngay</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                    <img class="card-img-top" src="https://png.pngtree.com/png-clipart/20210424/ourlarge/pngtree-suits-middle-aged-men-cartoon-characters-png-image_3232208.jpg" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title">Quản lý Tài khoản</h5>
                      <p class="card-text">
                      Tinawatch Admin giúp bạn Quản lý các Tài khoản
                      </p>
                      <a href="javascript:void(0)" class="btn btn-outline-primary">Xem ngay</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Examples -->
    </div>
    @endsection