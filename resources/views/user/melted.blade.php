@extends('layouts/layoutMaster')

@section('title', 'آبشده')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    @livewireStyles
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    @livewireScripts
@endsection

@section('page-script')
    <script>
        var meltedJsonUrl = "{{route('panel.user.melted.json')}}";
    </script>
    <script src="{{ asset('assets/js/melted-order-list.js') }}"></script>
    <script src="{{ asset('assets/js/user/melted-sweetalert2.js') }}"></script>

@endsection


@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light"><!-- UI elements --> /</span> آبشده</h4>

    <!-- Pills -->
    {{-- <h5 class="text-muted py-3 my-4">Pills</h5> --}}

    {{-- <div class="row">
        <div class="d-flex justify-content-center">
            <div class="col-xl-8 col-12">
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-tabs nav-fill col-xl-12" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-buy" aria-controls="navs-pills-justified-buy"
                                aria-selected="false">خرید</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-sale" aria-controls="navs-pills-justified-sale"
                                aria-selected="false">فروش</button>
                        </li>

                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="navs-pills-justified-buy" role="tabpanel">
                          <livewire:melted.buy />
                        </div>
                        <div class="tab-pane fade" id="navs-pills-justified-sale" role="tabpanel">
                          <livewire:melted.sell />
                        </div>

                    </div>                    
                </div>
            </div>
        </div>

    </div> --}}

  <!-- Statistics -->
  <div class="col-xl-12 mb-4 col-lg-12 col-12">
    <div class="card h-100">
      {{-- <div class="card-header">
        <div class="d-flex justify-content-between mb-3">
          <h5 class="card-title mb-0">Statistics</h5>
          <small class="text-muted">Updated 1 month ago</small>
        </div>
      </div> --}}
      <div class="card-body">
        <div class="row gy-3">
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-primary me-3 p-2"><i class="ti ti-chart-pie-2 ti-sm"></i></div>
              <div class="card-info">
                <h5 class="mb-0">مانده آبشده</h5>
                <small>صفر گرم</small>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-info me-3 p-2"><i class="ti ti-users ti-sm"></i></div>
              <div class="card-info">
                <h5 class="mb-0">مانده پولی</h5>
                <small>صفر تومان</small>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-danger me-3 p-2"><i class="ti ti-shopping-cart ti-sm"></i></div>
              <div class="card-info">
                <h5 class="mb-0">حداکثر خرید</h5>

                <small>2,000 گرم</small>

              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-success me-3 p-2"><i class="ti ti-currency-dollar ti-sm"></i></div>
              <div class="card-info">
                <h5 class="mb-0">حداکثر فروش</h5>

                <small>2,000 گرم</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Statistics -->
    <div class="row">
        <div class="d-flex justify-content-center">
            <div class="col-xl-8 col-12">
                <div class="nav-align-top mb-4">
                    {{-- <ul class="nav nav-tabs nav-fill col-xl-12" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-buy" aria-controls="navs-pills-justified-buy"
                                aria-selected="false">خرید</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-sale" aria-controls="navs-pills-justified-sale"
                                aria-selected="false">فروش</button>
                        </li>

                    </ul> --}}

                    <div class="tab-content">
                <h5 class="card-title mb-4">خرید / فروش</h5>


                        <div class="tab-pane fade show active" id="navs-pills-justified-buy" role="tabpanel">
                          <livewire:melted.buy />
                        </div>
                        {{-- <div class="tab-pane fade" id="navs-pills-justified-sale" role="tabpanel">
                          <livewire:melted.sell />
                        </div> --}}

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
                <h5 class="card-title mb-0">سفارشات اخیر</h5>
            </div>
            <table class="datatables-order table border-top">

                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>شناسه سفارش</th>
                        <th>نوع سفارش</th>
                        <th>قیمت هر گرم</th>
                        <th>مقدار گرم</th>
                        <th>قیمت</th>
                        <th>وضعیت</th>
                        <th>تاریخ</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
