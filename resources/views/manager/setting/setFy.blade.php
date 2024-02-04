@extends('layouts/layoutMaster')

@section('title', 'eCommerce Settings Locations - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/app-ecommerce-settings.js')}}"></script>
@endsection

@section('content')

<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">مدیریت /</span> تنظیمات
</h4>

<div class="row g-4">

  <!-- Navigation -->
  <div class="col-12 col-lg-4">
    <div class="d-flex justify-content-between flex-column mb-3 mb-md-0">
      <ul class="nav nav-align-left nav-pills flex-column">
        <li class="nav-item mb-1">
          <a class="nav-link py-2 active" href="{{url('/manager/setting/setFy')}}">
            <i class="ti ti-table-options me-2"></i>
            <span class="align-middle">تنظیم فی</span>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link py-2" href="{{url('/manager/setting/possibilities')}}">
            <i class="ti ti-adjustments-horizontal me-2"></i>
            <span class="align-middle">امکانات</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <!-- /Navigation -->

  <!-- Options -->
  <div class="col-12 col-lg-8 pt-4 pt-lg-0">
    <div class="tab-content p-0">
      <!-- Locations Tab -->
      <div class="tab-pane fade show active" id="locations" role="tabpanel">
        <div class="card mb-4">
          <div class="card-header">
            <h5 class="card-title m-0">تنظیم فی</h5>
          </div>
          <div class="card-body">
            <div class="col-12 mb-3">
              <input class="form-control" type="number" name="locationName" id="locationName" placeholder="56.08">

            </div>
            <div class="d-flex justify-content-start mt-4 gap-3">
                <a class="btn btn-primary" href="{{url('/app/ecommerce/settings/notifications')}}">ذخیره</a>
      
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Options-->
  </div>
</div>
@endsection
