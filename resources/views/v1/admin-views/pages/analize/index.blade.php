@extends('v1.admin-views.layouts.admin-layout')

@section('v1-admin-title')
<title>Thống kê</title>
@endsection

@section('v1-admin-content')

<div class="container-xxl flex-grow-1 container-p-y">

    @include('v1.admin-views.partials.content-header',['pageName' => 'Thống kê', 'pageParent' => 'Trang chủ'])


    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Khách hàng</span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">{{$totalCustomers}}</h4>
                                <!-- <small class="text-success">(+29%)</small> -->
                            </div>
                            <small>Tổng số khách hàng</small>
                        </div>
                        <span class="badge bg-label-primary rounded p-2">
                                <i class='bx bxs-user'></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Đơn hàng đang chờ duyệt</span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">{{$notCheckOrders}}</h4>
                                <!-- <small class="text-success">(+18%)</small> -->
                            </div>
                            <small>Tổng số đơn đang chờ duyệt</small>
                        </div>
                        <span class="badge bg-label-secondary rounded p-2">
                            <i class='bx bxs-time-five' ></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Đơn hàng thành công</span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">{{$successOrders}}</h4>
                                <!-- <small class="text-danger">(-14%)</small> -->
                            </div>
                            <small>Tổng số đơn thành công</small>
                        </div>
                        <span class="badge bg-label-success rounded p-2">
                            <i class='bx bx-check' ></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Tổng thu nhập</span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">{{number_format($totalMoney)}} đ</h4>
                                <!-- <small class="text-success">(+42%)</small> -->
                            </div>
                            <small>Từ các đơn hàng thành công</small>
                        </div>
                        <span class="badge bg-label-warning rounded p-2">
                             <i class='bx bx-dollar' ></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Accordion -->
    <h5 class="mt-4">Top cần lưu ý</h5>
    <div class="row">
        <!-- <div class="col-md mb-4 mb-md-0">
            <small class="text-light fw-semibold">Basic Accordion</small>
            <div class="accordion mt-3" id="accordionExample">
                <div class="card accordion-item active">
                    <h2 class="accordion-header" id="headingOne">
                        <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="true" aria-controls="accordionOne">
                            Accordion Item 1
                        </button>
                    </h2>

                    <div id="accordionOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Lemon drops chocolate cake gummies carrot cake chupa chups muffin topping. Sesame snaps icing
                            marzipan gummi bears macaroon dragée danish caramels powder. Bear claw dragée pastry topping
                            soufflé. Wafer gummi bears marshmallow pastry pie.
                        </div>
                    </div>
                </div>
                <div class="card accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
                            Accordion Item 2
                        </button>
                    </h2>
                    <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Dessert ice cream donut oat cake jelly-o pie sugar plum cheesecake. Bear claw dragée oat cake
                            dragée ice cream halvah tootsie roll. Danish cake oat cake pie macaroon tart donut gummies.
                            Jelly beans candy canes carrot cake. Fruitcake chocolate chupa chups.
                        </div>
                    </div>
                </div>
                <div class="card accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionThree" aria-expanded="false" aria-controls="accordionThree">
                            Accordion Item 3
                        </button>
                    </h2>
                    <div id="accordionThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Oat cake toffee chocolate bar jujubes. Marshmallow brownie lemon drops cheesecake. Bonbon
                            gingerbread marshmallow sweet jelly beans muffin. Sweet roll bear claw candy canes oat cake
                            dragée caramels. Ice cream wafer danish cookie caramels muffin.
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- <div class="col-md">
            <small class="text-light fw-semibold">Accordion Without Arrow</small>
            <div id="accordionIcon" class="accordion mt-3 accordion-without-arrow">
                <div class="accordion-item card">
                    <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionIcon-1" aria-controls="accordionIcon-1">
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
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionIcon-2" aria-controls="accordionIcon-2">
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
                        <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionIcon-3" aria-expanded="true" aria-controls="accordionIcon-3">
                            Accordion Item 3
                        </button>
                    </h2>
                    <div id="accordionIcon-3" class="accordion-collapse collapse show" data-bs-parent="#accordionIcon">
                        <div class="accordion-body">
                            Oat cake toffee chocolate bar jujubes. Marshmallow brownie lemon drops cheesecake. Bonbon
                            gingerbread marshmallow sweet jelly beans muffin. Sweet roll bear claw candy canes oat cake
                            dragée caramels. Ice cream wafer danish cookie caramels muffin.
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


        <div class="col-md-6 col-lg-6 order-2 mb-4">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Top 5 khách hàng mới nhất</h5>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <!-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID" style="">
                          <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                          <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                          <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div> -->
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">

                        @foreach ($top5NewCustomers as $customer)
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{$customer->avatar_path}}" alt="User" class="rounded">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class=" d-block mb-1">{{$customer->display_name}}</h6>
                                    <h6 class="text-muted mb-0">
                                       {{$customer->email}}
                                        
                                    </h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{$customer->phone}}</h6>
                                    <span class="text-muted"></span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-6 order-2 mb-4">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Top 5 sản phẩm giá cao</h5>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <!-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID" style="">
                          <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                          <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                          <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div> -->
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">

                       @foreach ($top5ExpensiveProducts as $product)
                           
                       
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{$product->feature_image_path}}" alt="User" class="rounded">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class=" d-block mb-1">{{$product->name}}</h6>
                                    <h6 class="text-muted mb-0">
                                        {{$product->companies->company_name}}
                                    </h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{number_format($product->price)}}</h6>
                                    <span class="text-muted"> đ</span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        
    </div>
    <!--/ Accordion -->

    <!--/ Advance Styling Options -->
</div>

@endsection