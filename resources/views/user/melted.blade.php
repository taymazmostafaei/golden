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
      {{-- <div class="card-header">
        <div class="d-flex justify-content-between mb-3">
          <h5 class="card-title mb-0">Statistics</h5>
          <small class="text-muted">Updated 1 month ago</small>
        </div>
      </div> --}}
      <div class="alert alert-secondary alert-dismissible d-flex align-items-baseline" role="alert">
        <span class="alert-icon alert-icon-lg text-secondary me-2">
          <i class="ti ti-exchange ti-sm"></i>
        </span>
        <div class="d-flex flex-column ps-1">
          <h5 class="alert-heading mb-2">حداکثر معامله</h5>
          <p class="mb-0">2,000 گرم</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
          </button>
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
                          <livewire:melted.melted />
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
                <h5 class="card-title mb-0">آخرین معاملات</h5>
            </div>
            <table class="datatables-order table border-top">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>شناسه سفارش</th>
                        <th>نوع معامله</th>
                        <th>فی معامله (مثقال)</th>
                        <th>وزن (گرم)</th>
                        <th>مبلغ کل</th>
                        <th>وضعیت</th>
                        <th>تاریخ</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
