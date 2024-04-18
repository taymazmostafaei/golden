@extends('layouts/layoutMaster')
@php
    $configData = Helper::appClasses();
@endphp

@section('title', 'لیست اخبار')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/plyr/plyr.css') }}" />
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-academy.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/plyr/plyr.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/app-academy-course.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">اخبار(وبلاگ) / </span>لیست</h4>
    @include('components.alert')
    <div class="app-academy">
        <div class="card p-0 mb-4">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
                <div class="app-academy-md-25 card-body py-0">
                    <img src="{{ asset('assets/img/illustrations/bulb-' . $configData['style'] . '.png') }}"
                        class="img-fluid app-academy-img-height scaleX-n1-rtl" alt="Bulb in hand"
                        data-app-light-img="illustrations/bulb-light.png" data-app-dark-img="illustrations/bulb-dark.png"
                        height="90" />
                </div>
                <div class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center">
                    <h3 class="card-title mb-4 lh-sm px-md-5 lh-lg">
                        جست و جوی وبلاگ
                    </h3>
                    <p class="mb-3">
                        بین مطلب های که نوشتید جست و جو کنید
                    </p>
                    <form action="{{ route('blog.index') }}" method="get">
                        <div class="d-flex align-items-center justify-content-between app-academy-md-80">
                            <button type="submit" class="btn btn-primary btn-icon me-2"><i
                                    class="ti ti-search"></i></button>
                            <input type="search" name="search" placeholder="جست و جوی وبلاگ" class="form-control" />
                        </div>
                    </form>

                </div>
                <div class="app-academy-md-25 d-flex align-items-end justify-content-end">
                    <img src="{{ asset('assets/img/illustrations/pencil-rocket.png') }}" alt="pencil rocket" height="188"
                        class="scaleX-n1-rtl" />
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header d-flex flex-wrap justify-content-between gap-3">
                <div class="card-title mb-0 me-1">
                    <h5 class="mb-1">لیست وبلاگ ها</h5>
                    {{-- <p class="text-muted mb-0">Total 6 course you have purchased</p> --}}
                </div>
                {{-- <div class="d-flex justify-content-md-end align-items-center gap-4 flex-wrap">
        <select id="select2_course_select" class="select2 form-select" data-placeholder="All Courses">
          <option value="">All Courses</option>
          <option value="ui/ux">UI/UX</option>
          <option value="seo">SEO</option>
          <option value="web">Web</option>
          <option value="music">Music</option>
          <option value="painting">Painting</option>
        </select>

        <label class="switch">
          <input type="checkbox" class="switch-input">
          <span class="switch-toggle-slider">
            <span class="switch-on"></span>
            <span class="switch-off"></span>
          </span>
          <span class="switch-label text-nowrap mb-0">Hide completed</span>
        </label>
      </div> --}}
            </div>
            <div class="card-body">
                <div class="row gy-4 mb-4">
                    @if (count($blogs) > 0)
                        @foreach ($blogs as $blog)
                            <div class="col-sm-6 col-lg-4">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        <a href="{{ route('blog.edit', $blog->id) }}"><img class="img-fluid"
                                                src="{{ asset('storage/blog/' . $blog->media_path) }}"
                                                alt="no picture" /></a>
                                    </div>
                                    <div class="card-body p-3 pt-2">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <span class="badge bg-label-primary">اخبار</span>
                                            {{-- <h6 class="d-flex align-items-center justify-content-center gap-1 mb-0">
                                        4.4 <span class="text-warning"><i
                                                class="ti ti-star-filled me-1 mt-n1"></i></span><span
                                            class="text-muted">(1.23k)</span>
                                    </h6> --}}
                                        </div>
                                        <a href="{{ route('blog.edit', $blog->id) }}"
                                            class="h5">{{ $blog->title }}</a>
                                        <p class="mt-2">{{ $blog->desc }}</p>
                                        <a class="w-100 btn btn-label-primary waves-effect"
                                            href="{{ route('blog.edit', $blog->id) }}"><i
                                                class="ti ti-photo-edit "></i>ویرایش</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>نتیجه پیدا نشد.</p>
                    @endif
                </div>
                {{ $blogs->links('pagination::bootstrap-4') }}
            </div>
        </div>


    </div>
@endsection
