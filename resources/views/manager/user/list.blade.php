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
  var apiUserList = "{{route('user-list-json')}}";
</script>
<script src="{{asset('assets/js/userLists.js')}}"></script>
@endsection

@section('content')

<div class="row g-4 mb-4">
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>مجموع کاربران</span>
            <div class="d-flex align-items-center my-2">
              <h3 class="mb-0 me-2">{{$userCount}}</h3>
            </div>
          </div>
          <div class="avatar">
            <span class="avatar-initial rounded bg-label-primary">
              <i class="ti ti-user ti-sm"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>کاربران رد شده</span>
            <div class="d-flex align-items-center my-2">
              <h3 class="mb-0 me-2">4,567</h3>
            </div>
          </div>
          <div class="avatar">
            <span class="avatar-initial rounded bg-label-danger">
              <i class="ti ti-user-x ti-sm"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>کاربران تائید شده</span>
            <div class="d-flex align-items-center my-2">
              <h3 class="mb-0 me-2">19,860</h3>
            </div>
          </div>
          <div class="avatar">
            <span class="avatar-initial rounded bg-label-success">
              <i class="ti ti-user-check ti-sm"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>کاربران در انتظار</span>
            <div class="d-flex align-items-center my-2">
              <h3 class="mb-0 me-2">237</h3>
            </div>
          </div>
          <div class="avatar">
            <span class="avatar-initial rounded bg-label-warning">
              <i class="ti ti-user-exclamation ti-sm"></i>
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
          <th>نام و نام خانوادگی</th>
          <th>کدملی</th>
          <th>شماره موبایل</th>
          <th>شماره ثابت</th>
          <th>وضعیت</th>
          <th>Actions</th>
        </tr>
      </thead>
    </table>
  </div>
  <!-- Offcanvas to add new user -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasAddUserLabel" class="offcanvas-title">افزودن کاربر</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
      <form class="add-new-user pt-0" id="addNewUserForm" onsubmit="return false">
        <div class="mb-3">
          <label class="form-label" for="add-user-fullname">نام و نام خانوادگی:</label>
          <input type="text" class="form-control" id="add-user-fullname" placeholder="علی تیموری" name="userFullname" aria-label="John Doe" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="add-user-fullname">بارگذاری عکس کارت زرگری یا پروانه کسب:</label>
          <input type="file" class="form-control" id="add-user-fullname" name="userFullname" aria-label="John Doe" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="add-user-email">کدملی:</label>
          <input type="number" id="add-user-email" class="form-control" placeholder="38*****136" aria-label="john.doe@example.com" name="userEmail" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="add-user-contact">شماره موبایل:</label>
          <input type="number" id="add-user-contact" class="form-control phone-mask" placeholder="458***0914" aria-label="john.doe@example.com" name="userContact" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="add-user-company">شماره ثابت:</label>
          <input type="number" id="add-user-company" class="form-control" placeholder="97***36" aria-label="jdoe1" name="companyName" />
        </div>
        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">ثبت کاربر</button>
        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">لغو</button>
      </form>
    </div>
  </div>
</div>

@endsection
