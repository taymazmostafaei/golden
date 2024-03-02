@extends('layouts/layoutMaster')

@section('title', 'لیست محصولات بانک داری')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection

@section('page-script')
<script>
  var categoryLisitUrl = "{{route('retail-category-list-formated')}}";
  var retailLisitUrl = "{{route('retail-list')}}";
  var retailUrl = "{{route('retail.index')}}";
  var csrf = '@csrf';
</script>
<script src="{{asset('assets/js/bonakDary_product_list.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">محصولات بنکداری / </span>لیست محصولات</h4>
@include('components.alert')

<!-- Product List Widget -->

<!-- Product List Table -->
<div class="card">
  <div class="card-header">
    <h5 class="card-title mb-0">جست و جوی فیلتر</h5>
    <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
      <div class="col-md-4 product_status"></div>
      <div class="col-md-4 product_category"></div>
      <div class="col-md-4 product_stock"></div>
    </div>
  </div>
  <div class="card-datatable table-responsive">
    <table class="datatables-products table">
      <thead class="border-top">
        <tr>
          <th></th>
          <th></th>
          <th>نام محصول</th>
          <th>نام دسته بندی</th>
          <th>قیمت</th>
          <th>عملیات</th>
        </tr>
      </thead>
    </table>
  </div>
</div>

@endsection
