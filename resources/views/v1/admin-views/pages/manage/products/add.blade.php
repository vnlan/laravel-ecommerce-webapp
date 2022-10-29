<!DOCTYPE html >
@extends('v1.admin-views.layouts.admin-layout')

@section('v1-admin-title')
<title>Thêm mới Sản phẩm</title>
@endsection

@section('v1-admin-js')
<script type="text/javascript" src="{{ asset('v1/resources/js/admin-page/reuseable/preview-image.js') }}"></script>
<script type="text/javascript" src="{{ asset('v1/resources/js/admin-page/reuseable/select2.js') }}"></script>
<script type="text/javascript" src="{{ asset('v1/resources/js/admin-page/reuseable/tinymce.js') }}"></script>

@endsection

@section('v1-admin-css')
<link rel="stylesheet" href="{{ asset('v1/resources/css/admin-page/reuseable/img-fit.css') }}">
</link>
@endsection

<style>
  .select2 {
    width: 100% !important;
  }
</style>

@section('v1-admin-content')

<div class="container-xxl flex-grow-1 container-p-y">

  @include('v1.admin-views.partials.content-header',['pageParent' => 'Quản lý Sản phẩm', 'pageName' => 'Thêm mới Sản phẩm'])


  <div class="row">

    <!-- Button with Badges -->
    <div class="col-lg">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between my-2">
          <div class="p-2">
            <h5 class="card-title mb-0">Thêm mới Sản phẩm</h5>
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
          <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label" for="basic-default-fullname">Mã sản phẩm</label>
                <div class="input-group input-group-merge speech-to-text">
                  <input type="text" name="sku" class="form-control" placeholder="Nhập hoặc nói mã sản phẩm" aria-describedby="text-to-speech-addon" required>
                  <span class="input-group-text" id="text-to-speech-addon">
                    <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                  </span>
                </div>
              </div>
              <div class="col-md-6 mb-3">

                <label class="form-label" for="basic-default-fullname">Tên sản phẩm</label>
                <div class="input-group input-group-merge speech-to-text">
                  <input type="text" name="name" class="form-control" placeholder="Nhập hoặc nói tên sản phẩm" aria-describedby="text-to-speech-addon" required>
                  <span class="input-group-text" id="text-to-speech-addon">
                    <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                  </span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label" for="basic-default-fullname">Chọn hãng sản xuất</label>
                <select class="form-select" name="product_company_id" required>
                  @foreach ($productCompanies as $productCompany)
                    <option value="{{$productCompany->id}}">{{$productCompany->company_short_name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label" for="basic-default-fullname">Chọn danh mục:</label>

                <select class="form-control select2-multiple" name="category_id[]" multiple required>
                 @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}<option>
                  @endforeach
                </select>

              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label" for="basic-default-fullname">Giá sản phẩm:</label>
                <div class="input-group input-group-merge speech-to-text">
                  <input type="number" min="0" name="price" class="form-control" placeholder="Nhập hoặc nói giá sản phẩm" aria-describedby="text-to-speech-addon" required>
                  <span class="input-group-text" id="text-to-speech-addon">
                    <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                  </span>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label" for="basic-default-fullname">Số lượng:</label>
                <div class="input-group input-group-merge speech-to-text">
                  <input type="number" min="0" name="stock" class="form-control" placeholder="Nhập hoặc nói số lượng sản phẩm" aria-describedby="text-to-speech-addon" required>
                  <span class="input-group-text" id="text-to-speech-addon">
                    <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                  </span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label" for="basic-default-fullname">Ảnh đại diện:</label>
                <div class="">
                  <input type="file" class="form-control" name="feature_image_path" onchange="showSinglePicture(this,1);" id="" placeholder="ACME Inc.">
                  <img class="avatar1 my-3 img-custom" width="250" height="200" src="https://banksiafdn.com/wp-content/uploads/2019/10/placeholde-image.jpg">
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label" for="basic-default-fullname">Ảnh chi tiết:</label>
                <div >
                  <input type="file" class="form-control" name="image_path[]" onchange="showMultiplePictures(this,1);" id="multiple-images-1" placeholder="" multiple>
                  <div class="multiple-images-holder-1">
                      <img class=" my-3 img-custom" width="250" height="200" src="https://banksiafdn.com/wp-content/uploads/2019/10/placeholde-image.jpg">
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label class="form-label" for="basic-default-company">Mô tả ngắn</label>
              <div class="input-group input-group-merge speech-to-text">
                <textarea class="form-control" name="short_description" placeholder="Điền hoặc nói mô tả ngắn" rows="4"></textarea>
                <span class="input-group-text">
                  <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                </span>
              </div>
            </div>

            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Mô tả chi tiết</label>
              <textarea class="form-control tinymce-editor" name="long_description" id="exampleFormControlTextarea1" rows="25"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Xác nhận thêm</button>
            <button type="reset" class="btn btn-secondary">Hủy</button>
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