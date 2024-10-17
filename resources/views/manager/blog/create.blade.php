@extends('layouts/layoutMaster')

@section('title', 'وبلاگ جدید')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/katex.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/editor.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/quill/katex.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/app-ecommerce-product-add.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">اخبار(وبلاگ) / </span>وبلاگ جدید</h4>
    @include('components.alert')
    <div class="app-ecommerce">
        <form action="{{ route('blog.store') }}" method="post">
            @csrf
            <!-- Add Product -->
            <div
                class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1 mt-3">یک وبلاگ جدید اضافه کنید</h4>
                    {{-- <p class="text-muted">Orders placed across your store</p> --}}
                </div>
                <div class="d-flex align-content-center flex-wrap gap-3">
                    <button type="submit" class="btn btn-primary">انتشار وبلاگ</button>
                </div>

            </div>

            <div class="row">

                <!-- First column-->
                <div class="col-12 col-lg-8">
                    <!-- Product Information -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">اطلاعات وبلاگ</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="ecommerce-product-name">عنوان</label>
                                <input type="text" class="form-control" id="ecommerce-product-name"
                                    placeholder="موضوع وبلاگ" name="title" value="{{ old('title') }}" aria-label="Product title">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="ecommerce-product-name">توضیح کوتاه</label>
                                <input type="text" class="form-control" id="ecommerce-product-name"
                                    placeholder="توضیح کوتاه اختیاری است" value="{{ old('desc') }}" name="desc" aria-label="Product title">
                            </div>
                            <!-- Description -->
                            <div>
                                <label class="form-label">متن</label>
                                <div class="form-control p-0 pt-1">
                                    <div class="comment-toolbar border-0 border-bottom">
                                        <div class="d-flex justify-content-start">
                                            <span class="ql-formats me-0">
                                                <button class="ql-bold"></button>
                                                <button class="ql-italic"></button>
                                                <button class="ql-underline"></button>
                                                <button class="ql-list" value="ordered"></button>
                                                <button class="ql-list" value="bullet"></button>
                                                <button class="ql-link"></button>
                                                <button class="ql-image"></button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="comment-editor border-0 pb-4" id="ecommerce-category-description">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Product Information -->
                </div>
                <!-- /Second column -->

                <!-- Second column -->
                <div class="col-12 col-lg-4">
                    <!-- امکانات Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">امکانات</h5>
                        </div>
                        <div class="card-body">
                            <!-- Instock switch -->
                            <div class="d-flex justify-content-between align-items-center border-top pt-3">
                                <h6 class="mb-0">عدم نمایش</h6>
                                <div class="w-25 d-flex justify-content-end">
                                    <label class="switch switch-primary switch-sm me-4 pe-2">
                                        <input type="checkbox" class="switch-input" name="hide">
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on">
                                                <span class="switch-off"></span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h6 class="mb-0">برند بنک داری</h6>
                                <div class="w-25 d-flex justify-content-end">
                                    <label class="switch switch-primary switch-sm me-4 pe-2">
                                        <input type="checkbox" class="switch-input" name="isbrand">
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on">
                                                <span class="switch-off"></span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            {{-- <div class="input-group mt-4">
                            <button class="btn btn-outline-primary waves-effect" type="button" id="button-addon2">مشاهده
                                مطلب</button>
                            <input type="text" class="form-control" placeholder="آدرس مطلب"
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                        </div> --}}
                        </div>
                    </div>
                </div>
                <!-- /Second column -->
            </div>
        </form>
    </div>

@endsection
