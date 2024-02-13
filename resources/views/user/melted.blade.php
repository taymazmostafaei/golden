@extends('layouts/layoutMaster')

@section('title', 'Tabs and pills - UI elements')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />

<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/melted-order-list.js')}}"></script>
<script src="{{asset('assets/js/user/melted-sweetalert2.js')}}"></script>

@endsection


@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light"><!-- UI elements --> /</span> آبشده</h4>

    <!-- Pills -->
    {{-- <h5 class="text-muted py-3 my-4">Pills</h5> --}}

    <div class="row">
        <div class="d-flex justify-content-center">
            <div class="col-xl-8 col-12">
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3 nav-fill col-xl-12" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-sale" aria-controls="navs-pills-justified-sale"
                                aria-selected="false">فروش</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-buy" aria-controls="navs-pills-justified-buy"
                                aria-selected="false">خرید</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="navs-pills-justified-sale" role="tabpanel">

                            <h1 class="form-label mb-3">می فروشم</h1>
                            <div class="input-group mb-3">
                                {{-- <span class="input-group-text">$</span> --}}
                                <input type="number" class="form-control" placeholder="100,000,000"
                                    aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">$</span>

                            </div>
                            <span class="alert alert-success mb-2 d-flex justify-content-between align-items-center">
                                <span><i class="ti ti-live-photo"></i>قیمت در بازار</span>
                                <span>895,000,000 تومان</span>
                            </span>
                            <span class="badge mb-3 d-flex justify-content-between align-items-center text-muted">
                                <span>در دسترس</span>
                                <span>863 $</span>
                            </span>

                            <h1 class="form-label mb-3">دریافت میکنم</h1>
                            <div class="input-group mb-4">
                                {{-- <span class="input-group-text">$</span> --}}
                                <input type="number" class="form-control" placeholder="150,000"
                                    aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">$</span>
                            </div>
                            <div class="d-grid gap-2 col-lg-6 mx-auto">
                            <button type="button" class="btn btn-danger" id="confirm-buy">
                                فروش
                              </button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-justified-buy" role="tabpanel">
                           
                            <h1 class="form-label mb-3">پرداخت میکنم</h1>
                            <div class="input-group mb-3">
                                {{-- <span class="input-group-text">$</span> --}}
                                <input type="number" class="form-control" placeholder="100,000,000"
                                    aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">$</span>

                            </div>

                            <span class="badge mb-3 d-flex justify-content-between align-items-center text-muted">
                                <span>در دسترس</span>
                                <span>863 $</span>
                            </span>

                            <h1 class="form-label mb-3">دریافت میکنم</h1>
                            <div class="input-group mb-3">
                                {{-- <span class="input-group-text">$</span> --}}
                                <input type="number" class="form-control" placeholder="150,000"
                                    aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">$</span>
                            </div>
                            <span class="alert alert-success mb-4 d-flex justify-content-between align-items-center">
                                <span><i class="ti ti-live-photo"></i>قیمت در بازار</span>
                                <span>895,000,000 تومان</span>
                            </span>
                            <div class="d-grid gap-2 col-lg-6 mx-auto">
                            <button type="button" class="btn btn-success" id="confirm-sale">
                                خرید
                              </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pills -->

    <!-- Order List Table -->

<div class="card">
    <div class="card-datatable table-responsive">
        <div class="card-header">
            <h5 class="card-title mb-0">لیست سفارشات</h5>
          </div>
      <table class="datatables-order table border-top">
        
        <thead>
          <tr>
            <th></th>
            <th></th>
            <th>نوع سفارش</th>
            <th>تاریخ</th>
            <th>قیمت فروش</th>
            <th>قیمت خرید</th>
            <th>وضعیت</th>
            <th>مقدار طلا</th>
            <th>actions</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
@endsection
