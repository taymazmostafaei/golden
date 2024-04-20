@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'اخبار و اطلاعیه ها')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/nouislider/nouislider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}" />
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/front-page-landing.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/nouislider/nouislider.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/index.js') }}"></script>
@endsection

@section('content')
    <div data-bs-spy="scroll" class="scrollspy-example">
        <!-- Useful features: Start -->
        <section id="landingFeatures" class="section-py landing-features mt-5">
            <div class="container mt-5">
                <h3 class="text-center mb-3 mb-md-5 p-3 ">
                    <span class="section-title">اخبار و اطلاعیه</span>
                </h3>
                <div class="features-icon-wrapper row gx-0 gy-4 g-sm-5">

                    @foreach ($blogs as $blog)
                        <x-blog-card :blog="$blog"/>
                            
                    @endforeach
                </div>
                {{ $blogs->links('pagination::bootstrap-4') }}
            </div>
        </section>
        <!-- Useful features: End -->
    </div>
@endsection
