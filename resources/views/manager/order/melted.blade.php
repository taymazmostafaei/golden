@extends('layouts/layoutMaster')

@section('title', 'User List - Pages')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />

@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
@endsection

@section('page-script')
<script>
  let MeltedJsonUrl = "{{route('orders.melted.json')}}";
</script>
<script src="{{asset('assets/js/orderLists-melted.js')}}"></script>
@endsection

@section('content')

<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">لیست سفارش /</span> آبشده
</h4>

<div class="card mb-4">
    <div class="card-widget-separator-wrapper">
      <div class="card-body card-widget-separator">
        <div class="row gy-4 gy-sm-1">
          <div class="col-sm-6 col-lg-3">
            <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
              <div>
                <h4 class="mb-2">{{$today_orders}}</h4>
                <p class="mb-0 fw-medium">سفارشات امروز</p>
              </div>
              <span class="avatar me-sm-4">
                <span class="avatar-initial bg-label-secondary rounded">
                  <i class="ti-md ti ti-calendar-stats text-body"></i>
                </span>
              </span>
            </div>
            <hr class="d-none d-sm-block d-lg-none me-4">
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
              <div>
                <h4 class="mb-2">{{$status_true_orders}}</h4>
                <p class="mb-0 fw-medium">تایید شده</p>
              </div>
              <span class="avatar p-2 me-lg-4">
                <span class="avatar-initial bg-label-secondary rounded"><i class="ti-md ti ti-checks text-body"></i></span>
              </span>
            </div>
            <hr class="d-none d-sm-block d-lg-none">
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
              <div>
                <h4 class="mb-2">{{$sell_trades}}</h4>
                <p class="mb-0 fw-medium">فروش</p>
              </div>
              <span class="avatar p-2 me-sm-4">
                <span class="avatar-initial bg-label-secondary rounded"><i class="ti-md ti ti-user-down text-body"></i></span>
              </span>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <h4 class="mb-2">{{$buy_trades}}</h4>
                <p class="mb-0 fw-medium">خرید</p>
              </div>
              <span class="avatar p-2">
                <span class="avatar-initial bg-label-secondary rounded"><i class="ti-md ti ti-user-up text-body"></i></span>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('components.alert')
<!-- Users List Table -->
<div class="card">
  <div class="card-header border-bottom">
    <h5 class="card-title mb-3">جست و جوی فیلتر</h5>
    <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
      <div class="col-md-4 user_role"></div>
      <div class="col-md-4 user_plan"></div>
      <div class="col-md-4 user_status"></div>
    </div>
  </div>
  <div class="card-datatable table-responsive">
    <table class="datatables-users table">
      <thead class="border-top">
        <tr>
          <th></th>
          <th>شناسه سفارش</th>
          <th>نوع سفارش</th>
          <th>سفارش دهنده</th>
          <th>قیمت هر گرم</th>
          <th>مقدار گرم</th>
          <th>قیمت</th>
          <th>تاریخ</th>
          <th>عملیات</th>
        </tr>
      </thead>
    </table>
  </div>
</div>

@endsection
