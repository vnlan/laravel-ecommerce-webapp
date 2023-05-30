<!DOCTYPE html>
@extends('v1.admin-views.layouts.admin-layout')

@section('v1-admin-title')
<title>Sửa Blogs</title>
@endsection

@section('v1-admin-js')
<script type="text/javascript" src="{{ asset('v1/resources/js/admin-page/reuseable/preview-image.js') }}"></script>
<script type="text/javascript" src="{{ asset('v1/resources/js/admin-page/reuseable/tinymce.js') }}"></script>
@endsection

@section('v1-admin-css')
<link rel="stylesheet" href="{{ asset('v1/resources/css/admin-page/reuseable/img-fit.css') }}">
</link>
@endsection

@section('v1-admin-content')

<div class="container-xxl flex-grow-1 container-p-y">

    @include('v1.admin-views.partials.content-header',['pageParent' => 'Quản lý Blogs', 'pageName' => 'Sửa Blogs'])


    <div class="row">

        <!-- Button with Badges -->
        <div class="col-lg">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between my-2">
                    <div class="p-2">
                        <h5 class="card-title mb-0">Sửa Blogs</h5>
                    </div>
                    <!-- <div class="pt-md-0">
                        <button class="dt-button create-new btn btn-primary" type="button">
                            <span>
                                <i class="bx bx-plus me-sm-2"></i>
                                <span class="d-none d-sm-inline-block">Thêm mới Blogs</span>
                            </span>
                        </button>
                    </div> -->
                </div>

                <div class="card-body">
                    <form action="{{ route('blogs.update',['id' => $blog->id] ) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Tiêu đề Blog:</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge speech-to-text">
                                    <input type="text" name="title" value="{{$blog->title}}" class="form-control" placeholder="Nhập hoặc nói tiêu đề Blogs" aria-describedby="text-to-speech-addon" required>
                                    <span class="input-group-text" id="text-to-speech-addon">
                                        <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Danh mục blog:</label>
                            <div class="col-sm-10">

                                <select class="form-select" name="blog_category" required>

                                    <option value="Chưa đặt tên" {{'Chưa đặt tên' == $blog->blog_category ? 'selected': ''}} >Chưa đặt tên </option>
                                    <option value="Kiến thức" {{'Kiến thức' == $blog->blog_category ? 'selected': ''}}>Kiến thức</option>
                                    <option value="Mẹo vặt" {{'Mẹo vặt' == $blog->blog_category ? 'selected': ''}}>Mẹo vặt</option>
                                    <option value="Review sản phẩm" {{'Review sản phẩm' == $blog->blog_category ? 'selected': ''}}>Review sản phẩm</option>
                                    <option value="Giải trí" {{'Giải trí' == $blog->blog_category ? 'selected': ''}}>Giải trí</option>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Ảnh đại diện Blog:</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="avatar_path" onchange="showSinglePicture(this,1);" id="basic-default-company" placeholder="ACME Inc.">

                                @if (isset($blog->avatar_path))
                                <img class="avatar1 my-3 img-custom" width="250" height="200" src="{{ $blog->avatar_path }}">
                                @else
                                <img class="avatar1 my-3 img-custom" width="250" height="200" src="  https://banksiafdn.com/wp-content/uploads/2019/10/placeholde-image.jpg">
                                @endif

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Mô tả ngắn: </label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge speech-to-text">
                                    <textarea class="form-control" name="short_description" placeholder="Điền hoặc nói mô tả" rows="4">{{$blog->short_description}}</textarea>
                                    <span class="input-group-text">
                                        <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Nội dung blog</label>
                            <textarea class="form-control tinymce-editor" name="content" id="exampleFormControlTextarea1" rows="25">{{$blog->content}}</textarea>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Xác nhận Sửa </button>
                                <button type="reset" class="btn btn-secondary">Hủy </button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
    <!-- Accordion -->
    <!-- <h5 class="mt-4">Accordion</h5>
              <div class="row">
                <div class="col-md mb-4 mb-md-0">
                  <small class="text-light fw-semibold">Basic Accordion</small>
                  <div class="accordion mt-3" id="accordionExample">
                    <div class="card accordion-item active">
                      <h2 class="accordion-header" id="headingOne">
                        <button
                          type="button"
                          class="accordion-button"
                          data-bs-toggle="collapse"
                          data-bs-target="#accordionOne"
                          aria-expanded="true"
                          aria-controls="accordionOne"
                        >
                          Accordion Item 1
                        </button>
                      </h2>

                      <div
                        id="accordionOne"
                        class="accordion-collapse collapse show"
                        data-bs-parent="#accordionExample"
                      >
                        <div class="accordion-body">
                          Lemon drops chocolate cake gummies carrot cake chupa chups muffin topping. Sesame snaps icing
                          marzipan gummi bears macaroon dragée danish caramels powder. Bear claw dragée pastry topping
                          soufflé. Wafer gummi bears marshmallow pastry pie.
                        </div>
                      </div>
                    </div>
                    <div class="card accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button
                          type="button"
                          class="accordion-button collapsed"
                          data-bs-toggle="collapse"
                          data-bs-target="#accordionTwo"
                          aria-expanded="false"
                          aria-controls="accordionTwo"
                        >
                          Accordion Item 2
                        </button>
                      </h2>
                      <div
                        id="accordionTwo"
                        class="accordion-collapse collapse"
                        aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample"
                      >
                        <div class="accordion-body">
                          Dessert ice cream donut oat cake jelly-o pie sugar plum cheesecake. Bear claw dragée oat cake
                          dragée ice cream halvah tootsie roll. Danish cake oat cake pie macaroon tart donut gummies.
                          Jelly beans candy canes carrot cake. Fruitcake chocolate chupa chups.
                        </div>
                      </div>
                    </div>
                    <div class="card accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button
                          type="button"
                          class="accordion-button collapsed"
                          data-bs-toggle="collapse"
                          data-bs-target="#accordionThree"
                          aria-expanded="false"
                          aria-controls="accordionThree"
                        >
                          Accordion Item 3
                        </button>
                      </h2>
                      <div
                        id="accordionThree"
                        class="accordion-collapse collapse"
                        aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample"
                      >
                        <div class="accordion-body">
                          Oat cake toffee chocolate bar jujubes. Marshmallow brownie lemon drops cheesecake. Bonbon
                          gingerbread marshmallow sweet jelly beans muffin. Sweet roll bear claw candy canes oat cake
                          dragée caramels. Ice cream wafer danish cookie caramels muffin.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md">
                  <small class="text-light fw-semibold">Accordion Without Arrow</small>
                  <div id="accordionIcon" class="accordion mt-3 accordion-without-arrow">
                    <div class="accordion-item card">
                      <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
                        <button
                          type="button"
                          class="accordion-button collapsed"
                          data-bs-toggle="collapse"
                          data-bs-target="#accordionIcon-1"
                          aria-controls="accordionIcon-1"
                        >
                          Accordion Item 1
                        </button>
                      </h2>

                      <div id="accordionIcon-1" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                        <div class="accordion-body">
                          Lemon drops chocolate cake gummies carrot cake chupa chups muffin topping. Sesame snaps icing
                          marzipan gummi bears macaroon dragée danish caramels powder. Bear claw dragée pastry topping
                          soufflé. Wafer gummi bears marshmallow pastry pie.
                        </div>
                      </div>
                    </div>

                    <div class="accordion-item card">
                      <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconTwo">
                        <button
                          type="button"
                          class="accordion-button collapsed"
                          data-bs-toggle="collapse"
                          data-bs-target="#accordionIcon-2"
                          aria-controls="accordionIcon-2"
                        >
                          Accordion Item 2
                        </button>
                      </h2>
                      <div id="accordionIcon-2" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                        <div class="accordion-body">
                          Dessert ice cream donut oat cake jelly-o pie sugar plum cheesecake. Bear claw dragée oat cake
                          dragée ice cream halvah tootsie roll. Danish cake oat cake pie macaroon tart donut gummies.
                          Jelly beans candy canes carrot cake. Fruitcake chocolate chupa chups.
                        </div>
                      </div>
                    </div>

                    <div class="accordion-item card active">
                      <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconThree">
                        <button
                          type="button"
                          class="accordion-button"
                          data-bs-toggle="collapse"
                          data-bs-target="#accordionIcon-3"
                          aria-expanded="true"
                          aria-controls="accordionIcon-3"
                        >
                          Accordion Item 3
                        </button>
                      </h2>
                      <div
                        id="accordionIcon-3"
                        class="accordion-collapse collapse show"
                        data-bs-parent="#accordionIcon"
                      >
                        <div class="accordion-body">
                          Oat cake toffee chocolate bar jujubes. Marshmallow brownie lemon drops cheesecake. Bonbon
                          gingerbread marshmallow sweet jelly beans muffin. Sweet roll bear claw candy canes oat cake
                          dragée caramels. Ice cream wafer danish cookie caramels muffin.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
    <!--/ Accordion -->

    <!--/ Advance Styling Options -->
</div>
@endsection