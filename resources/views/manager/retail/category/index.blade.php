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
    <style>
        .category-card {
            position: relative;
            overflow: hidden;
        }

        .category-actions {
            position: absolute;
            bottom: 10px;
            right: 10px;
            display: flex;
            gap: 5px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .category-card:hover .category-actions {
            opacity: 1;
        }
    </style>
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

    @include('components.alert')

    <!-- Horizontal -->
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="pb-1 mb-4 ">دسته بندی محصولات</h5>
        <button type="button" class="btn btn-primary" data-id="{{$parent}}" data-bs-toggle="modal" data-bs-target="#create_cat"> اضافه کردن
            دسته بندی
        </button>
    </div>
    <hr>
    <div class="row mb-5">
        @forelse ($categories as $category)
            <div class="col-md-3 col-sm-4">
                <div class="card mb-3 category-card" style="border-left: 5px solid var(--bs-primary)">
                    <a href="{{ route('retail.category.show', $category->id) }}">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-4 col-4">
                                <img class="card-img card-img-left rounded" src="{{ asset('assets/img/elements/14.jpg') }}"
                                    alt="Card image" />
                            </div>
                            <div class="col-md-8 col-8">
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{ $category->name }}</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="category-actions">
                        <button type="button" class="btn btn-sm btn-warning me-2" data-id="{{$category->id}}" data-bs-toggle="modal" data-bs-target="#edit_cat">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="{{ route('retail.category.destroy', $category->id) }}" method="POST"
                            onsubmit="return confirm('آیا مطمئن هستید که می‌خواهید این دسته بندی را حذف کنید؟');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" title="حذف">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            بدون زیر دسته بندی
        @endforelse
    </div>

    <!--/ Horizontal -->
    <!-- Add New Credit Card Modal -->
    <div class="modal fade" id="create_cat" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <livewire:retail.edit-category type="create"/>
        </div>
    </div>
    <div class="modal fade" id="edit_cat" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <livewire:retail.edit-category type="edit"/>
        </div>
    </div>
    <!--/ Add New Credit Card Modal -->

@endsection
