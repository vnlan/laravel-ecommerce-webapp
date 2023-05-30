<!DOCTYPE html >
@extends('v1.admin-views.layouts.admin-layout')

@section('v1-admin-title')
<title>Quản lý Đơn hàng</title>
@endsection



@section('v1-admin-js')

<script type="text/javascript" src="{{ asset('v1/resources/js/admin-page/reuseable/hide-toast.js') }}"></script>
<script type="text/javascript" src="{{ asset('v1/resources/js/admin-page/reuseable/sweet-alert-2.js') }}"></script>
<script type="text/javascript" src="{{ asset('v1/resources/js/admin-page/reuseable/deny-order.js') }}"></script>
@endsection


@section('v1-admin-css')
<link rel="stylesheet" href="{{ asset('v1/resources/css/admin-page/reuseable/img-fit.css') }}">
</link>
@endsection



@section('v1-admin-content')



<div class="container-xxl flex-grow-1 container-p-y">

  @include('v1.admin-views.partials.content-header',['pageParent' => 'Quản lý Đơn hàng', 'pageName' => 'Tất cả Đơn hàng'])

  <div class="toast-container">
    @if (session('success'))
    <!-- Toast with Placements -->
    <div class="bs-toast toast toast-placement-ex m-2 bg-success top-0 end-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" id="successToast">
      <div class="toast-header">
        <i class="bx bx-bell me-2"></i>
        <div class="me-auto fw-semibold">Thông báo</div>
        <small>vừa xong</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">{{ Session::get('success') }}</div>
    </div>
    <!-- Toast with Placements -->
    @endif
    @if (session('error'))
    <!-- Toast with Placements -->
    <div class="bs-toast toast toast-placement-ex m-2 bg-danger top-0 end-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" id="successToast">
      <div class="toast-header">
        <i class="bx bx-bell me-2"></i>
        <div class="me-auto fw-semibold">Thông báo</div>
        <small>vừa xong</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">{{ Session::get('error') }}</div>
    </div>
    <!-- Toast with Placements -->
    @endif
  </div>

  
  <div class="row">

    <!-- Button with Badges -->
    <div class="col-lg">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between my-2">
          <div class="p-2">
            <h5 class="card-title mb-0">Danh sách Đơn hàng</h5>
          </div>
     
        </div>


        <div class="card-body ">
          <div class="table-responsive text-nowrap">
            <table style="line-height: 3" id="table1" class="table table-hover table-lg">
              <thead class="table-light">
                <tr>
                  <th>ID</th>
                  <th>Tên người nhận</th>
                  <th>SĐT người nhận</th>
                  <th>Địa chỉ người nhận</th>
                  <th>Tổng cộng</th>
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @foreach($orders as $order)
                <tr>
                  <td>{{$order->id}}</td>
                  <td>{{$order->receiver_name}}</td>
                  <td>{{$order->receiver_phone}}</td>
                  <td>{{$order->receiver_address}}</td>
                  <td>{{number_format($order->total)}} đ</td>
                  @if ($order->status == 1)
                    <td><span class="badge rounded-pill bg-secondary"><i class='bx bx-question-mark'></i> Chờ phê duyệt</span></td>
                  @elseif ($order->status == 2)
                    <td><span class="badge rounded-pill bg-warning"><i class='bx bx-stopwatch'></i> Đang lấy hàng</span></td>
                  @elseif ($order->status == 3)
                    <td><span class="badge rounded-pill bg-info"><i class='bx bxs-truck'></i> Đang vận chuyển</span></td>
                  @elseif ($order->status == 4)
                    <td><span class="badge rounded-pill bg-success"><i class='bx bxs-check-circle'></i> Đã hoàn thành</span></td>
                  @else
                  <td><span class="badge rounded-pill bg-danger"><i class='bx bxs-x-circle'></i> Đã hủy đơn</span></td>
                  @endif
                 
                  <td>
                    @if ($order->status == 5 || $order->status == 4)
                    <a type="button" href="{{ route('orders.edit', ['id' => $order->id]) }}" class="btn btn-primary">
                      <span>
                        <i class='bx bxs-edit'></i>
                        <span class="d-none d-sm-inline-block">Sửa</span>
                      </span>
                    </a>
                    @else
                    <a type="button" href="{{ route('orders.edit', ['id' => $order->id]) }}" class="btn btn-primary">
                      <span>
                        <i class='bx bxs-edit'></i>
                        <span class="d-none d-sm-inline-block">Sửa</span>
                      </span>
                    </a>
                    <!-- Button trigger modal -->
                    <a type="button" href="" class="btn btn-danger mx-1 action-deny-order" data-url="{{route('orders.deny' , ['id' => $order->id])}}">
                      <span>
                        <i class='bx bxs-x-circle'></i>
                        <span class="d-none d-sm-inline-block">Hủy</span>
                      </span>
                    </a>
                    @endif
        

                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</div>
@endsection