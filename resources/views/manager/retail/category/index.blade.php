@extends('layouts/layoutMaster')

@section('title', 'دسته بندی بنک داری')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/typography.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/katex.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/editor.css')}}" />
@endsection

@section('page-style')
@livewireStyles
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/app-ecommerce.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/quill/katex.js')}}"></script>
<script src="{{asset('assets/vendor/libs/quill/quill.js')}}"></script>
@endsection

@section('page-script')
@livewireScripts
<script>
  var GetCategoryListUrl = "{{route('retail-category-list')}}";
</script>
<script src="{{asset('assets/js/create_cat.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-2">
  <span class="text-muted fw-light">محصولات بنکداری /</span> دسته بندی
</h4>

<div class="app-ecommerce-category">
  <!-- Category List Table -->
  <div class="card">
    <div class="card-datatable table-responsive">
      <table class="datatables-category-list table border-top">
        <thead>
          <tr>
            <th></th>
            <th></th>
            <th>نام دسته بندی</th>
            {{-- <th class="text-nowrap text-sm-end">Total Products &nbsp;</th>
            <th class="text-nowrap text-sm-end">Total Earning</th> --}}
            <th class="text-lg-center">Actions</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
      <!-- Offcanvas to add new customer -->
  <div class="offcanvas offcanvas-end addnewcat" tabindex="-1" id="offcanvasEcommerceCategoryList"
      aria-labelledby="offcanvasEcommerceCategoryListLabel">
  <livewire:retail.category />
  </div>
</div>
@include('_partials/_modals/manage-modal-edit-cat')

@endsection
