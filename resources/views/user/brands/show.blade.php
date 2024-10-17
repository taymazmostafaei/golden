@extends('layouts.layoutMaster')

@section('title', $blog->title)

@section('vendor-style')

@endsection

@section('vendor-script')

@endsection

@section('page-script')

@endsection

@section('content')
<div data-bs-spy="scroll" class="scrollspy-example">
    <!-- Useful features: Start -->
    <section id="landingFeatures" class="section-py landing-features mt-5">
        <div class="container">
            <div class="row">
                <div class="text-center mb-3 pb-1">
                    <span class="badge bg-label-primary">برند</span>
                </div>
                <h3 class="text-center mb-3">
                    <span class="section-title">{{ $blog->title }}</span>
                </h3>


                <div class="text-center mt-4">
                    <img src="{{ asset('storage/blog/' . $blog->media_path) }}" class="rounded mx-auto d-block"
                        alt="..." width="70%">

                </div>
                <div class="d-flex     justify-content-center">
                    <div class="text-start mt-5 pb-3" style="line-height: 50px; width:70%">
                        {{ $blog->desc }}
                        <hr>
                        {!! $blog->text !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            {{-- <div class="text-center mb-3 pb-1">
                        <span class="badge bg-label-primary">ویژگی های مفید</span>
                    </div> --}}
            {{-- <h3 class="text-center mb-1">
                        <span class="section-title">همه چیزهایی که برای شروع</span>پروژه بعدی خود نیاز دارید
                    </h3> --}}
            {{-- <p class="text-center mb-3 mb-md-5 p-3">
                        نه تنها مجموعه ای از ابزارها، این بسته شامل برنامه های مفهومی آماده برای استقرار است.
                    </p> --}}
            <h3 class="text-center mb-3 mb-md-5 p-3 ">
                <span class="section-title">برند های دیگر</span>
            </h3>
            <div class="features-icon-wrapper row gx-0 gy-4 g-sm-5">
                @foreach ($blogs as $blog)
                    <x-blog-card :blog="$blog" :isbrand="1" />
                @endforeach
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('user.retail.brands.index') }}" class="btn btn-outline-primary btn-lg">بیشتر ...</a>
            </div>
        </div>
    </section>
    <!-- Useful features: End -->
</div>
@endsection
