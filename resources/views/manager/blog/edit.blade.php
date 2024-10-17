@extends('layouts/layoutMaster')

@section('title', 'ویرایش وبلاگ')

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
    <script src="{{ asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
@endsection

@section('page-script')
    <script>
        const commentEditor = document.querySelector('.comment-editor');

        if (commentEditor) {
            const quill = new Quill(commentEditor, {
                modules: {
                    toolbar: '.comment-toolbar'
                },
                placeholder: 'Product Description',
                theme: 'snow'
            });

            // Update hidden input with editor content
            const editorContentInput = document.querySelector(
                "body > div > div.layout-container > div > div > div.container-xxl.flex-grow-1.container-p-y > div.app-ecommerce > div.row > div.col-12.col-lg-8 > div > div.card-body > div:nth-child(3) > div > input[type=hidden]:nth-child(3)"
                );

            quill.on('text-change', function() {
                editorContentInput.value = quill.root.innerHTML;
            });
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script>
        const previewTemplate = `<div class="dz-preview dz-file-preview">
<div class="dz-details">
<div class="dz-thumbnail">
<img data-dz-thumbnail>
<span class="dz-nopreview">No preview</span>
<div class="dz-success-mark"></div>
<div class="dz-error-mark"></div>
<div class="dz-error-message"><span data-dz-errormessage></span></div>
<div class="progress">
  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
</div>
</div>
<div class="dz-filename" data-dz-name></div>
<div class="dz-size" data-dz-size></div>
</div>
</div>`;
        Dropzone.options.imageUpload = {
            previewTemplate: previewTemplate,
            maxFilesize: 30,
            acceptedFiles: ".jpeg,.jpg"
        };
    </script>
@endsection

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">اخبار(وبلاگ) / </span>وبلاگ جدید</h4>
    @include('components.alert')
    <div class="app-ecommerce">

        <!-- Add Product -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 mt-3">ویرایش وبلاگ</h4>
                {{-- <p class="text-muted">Orders placed across your store</p> --}}
            </div>
            <div class="d-flex align-content-center flex-wrap gap-3">
                <form id="destroy_form" action="{{ route('blog.destroy', $blog) }}" method="post">
                    @csrf
                    @method('delete')
                    <button form="destroy_form" type="submit" class="btn btn-label-danger">حذف وبلاگ</button>
                </form>
                <form id="update_form" action="{{ route('blog.update', $blog->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <button form="update_form" type="submit" class="btn btn-primary">بروزرسانی وبلاگ</button>
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
                            <input type="text" class="form-control" id="ecommerce-product-name" placeholder="موضوع وبلاگ"
                                name="title" aria-label="Product title" value="{{ $blog->title }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="ecommerce-product-name">توضیح کوتاه</label>
                            <input type="text" class="form-control" id="ecommerce-product-name"
                                placeholder="توضیح کوتاه اختیاری است" name="desc" aria-label="Product title"
                                value="{{ $blog->desc }}">
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
                                    {!! $blog->text !!}
                                </div>
                                <input type="hidden" name="text" value="{!! $blog->text !!}">
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
                                    <input type="checkbox" name="hide" class="switch-input" @checked($blog->hide)>
                                    <span class="switch-toggle-slider">
                                        <span class="switch-on">
                                            <span class="switch-off"></span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <h6 class="mb-0">برند بنکداری</h6>
                            <div class="w-25 d-flex justify-content-end">
                                <label class="switch switch-primary switch-sm me-4 pe-2">
                                    <input type="checkbox" name="isbrand" class="switch-input" @checked($blog->isbrand)>
                                    <span class="switch-toggle-slider">
                                        <span class="switch-on">
                                            <span class="switch-off"></span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="input-group mt-4">
                            <button class="btn btn-outline-primary waves-effect" type="button" id="button-addon2">مشاهده
                                مطلب</button>
                            <input type="text" class="form-control" placeholder="آدرس مطلب"
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                        </div>
                    </div>
                </div>
                </form>
                <!-- /امکانات Card -->
                <div class="card mb-4">
                    <h5 class="card-header">عکس وبلاگ</h5>

                    <div class="card-body">
                        {{-- <p class="text-muted">Orders placed across your store</p> --}}
                        <img class="img-fluid d-flex mx-auto my-4 rounded"
                            src="{{ asset('storage/blog/' . $blog->media_path) }}" alt="عکس وبلاگ">
                    </div>
                </div>
            </div>
            <!-- /Second column -->
        </div>
        <!-- Media -->
        <div class="card">
            <h5 class="card-header">آپلود عکس وبلاگ</h5>
            <div class="card-body">
                <form action="{{ route('blog-media-upload', $blog) }}" method="post" enctype="multipart/form-data"
                    class="dropzone" id="image-upload">
                    @csrf
                    <div class="dz-message needsclick" data-dz-message>
                        عکس ها را اینجا رها کنید یا برای آپلود کلیک کنید
                    </div>
                </form>
            </div>
        </div>
        <!-- /Media -->
    </div>

@endsection
