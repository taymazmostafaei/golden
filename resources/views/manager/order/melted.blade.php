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
                <h4 class="mb-2">56</h4>
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
                <h4 class="mb-2">12,689</h4>
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
                <h4 class="mb-2">124</h4>
                <p class="mb-0 fw-medium">فروشنده</p>
              </div>
              <span class="avatar p-2 me-sm-4">
                <span class="avatar-initial bg-label-secondary rounded"><i class="ti-md ti ti-user-down text-body"></i></span>
              </span>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <h4 class="mb-2">32</h4>
                <p class="mb-0 fw-medium">خریدار</p>
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
          <th>نوع سفارش</th>
          <th>سفارش دهنده</th>
          <th>تاریخ</th>
          <th>مقدار گرم</th>
          <th>قیمت بسته شده</th>
          <th>عملیات</th>
        </tr>
      </thead>
    </table>
  </div>
  <!-- Offcanvas to add new user -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasAddUserLabel" class="offcanvas-title">افزودن سفارش آبشده</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
      <form class="add-new-user pt-0" id="addNewUserForm" onsubmit="return false">
        <div class="mb-3">
          <label for="exampleFormControlSelect1" class="form-label">نوع سفارش</label>
          <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
            <option value="1">خرید</option>
            <option value="2">فروش</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label" for="add-user-fullname">نام و نام خانوادگی</label>
          <input type="text" class="form-control" id="add-user-fullname" placeholder="علی تیموری" name="userFullname" aria-label="John Doe" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="add-user-email">مقدار گرم</label>
          <input type="number" id="add-user-email" class="form-control" placeholder="65" aria-label="john.doe@example.com" name="userEmail" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="add-user-company">قیمت بسته شده</label>
            <input type="number" id="add-user-company" class="form-control" placeholder="4000000" aria-label="jdoe1" name="companyName" />
          </div>
        <div class="mb-3">
          <label class="form-label" for="add-user-contact">شماره موبایل</label>
          <input type="number" id="add-user-contact" class="form-control phone-mask" placeholder="458***0914" aria-label="john.doe@example.com" name="userContact" />
        </div>

        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">ثبت سفارش</button>
        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">لغو</button>
      </form>
    </div>
  </div>
</div>

@endsection
