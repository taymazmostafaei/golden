@extends('layouts/layoutMaster')

@section('title', 'دسته بندی بنک داری')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/katex.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/editor.css') }}" />
@endsection

@section('page-style')
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-ecommerce.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/quill/katex.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/quill/quill.js') }}"></script>
@endsection

@section('page-script')
    @livewireScripts
    <script>
        var GetCategoryListUrl = "{{ route('retail-category-list') }}";
    </script>
    <script src="{{ asset('assets/js/create_cat.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">محصولات بنکداری /</span> دسته بندی
    </h4>

    <!-- Horizontal -->
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="pb-1 mb-4 ">دسته بندی محصولات</h5>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewCCModal"> اضافه کردن
            دسته بندی
        </button>
    </div>
    <hr>
    <div class="row mb-5">

        <div class="col-md-3 col-sm-4">
            <a href="{{ route('panel.user.retails.category', 20) }}">
                <div class="card mb-3" style="border-left: 5px solid var(--bs-primary)">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-4 col-4">
                            <img class="card-img card-img-left rounded" src="{{ asset('assets/img/elements/14.jpg') }}"
                                alt="Card image" />
                        </div>
                        <div class="col-md-8 col-8">
                            <div class="card-body">
                                <h5 class="card-title text-center">زشسز</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3 col-sm-4">
          <a href="{{ route('panel.user.retails.category', 20) }}">
              <div class="card mb-3" style="border-left: 5px solid var(--bs-primary)">
                  <div class="row g-0 align-items-center">
                      <div class="col-md-4 col-4">
                          <img class="card-img card-img-left rounded" src="{{ asset('assets/img/elements/14.jpg') }}"
                              alt="Card image" />
                      </div>
                      <div class="col-md-8 col-8">
                          <div class="card-body">
                              <h5 class="card-title text-center">زشسز</h5>
                          </div>
                      </div>
                  </div>
              </div>
          </a>
      </div>
    </div>
    <!--/ Horizontal -->
    @include('_partials/_modals/modal-cat-add')

@endsection
