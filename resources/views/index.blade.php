@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Landing - Front Pages')

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
        <!-- Hero: Start -->
        <section id="hero-animation">
            <div id="home" class="section-py landing-hero position-relative">
                <div class="container">

                    <div id="heroDashboardAnimation" class="hero-animation-img">
                        <a href="{{ url('/app/ecommerce/dashboard') }}" target="_blank">
                            <div id="heroAnimationImg" class="position-relative hero-dashboard-img">
                                <img src="{{ asset('assets/img/front-pages/landing-page/home.png') }}" alt="hero dashboard"
                                    class="animation-img" data-app-light-img="front-pages/landing-page/home.png"
                                    data-app-dark-img="front-pages/landing-page/home.png" />
                            </div>
                        </a>
                    </div>

                </div>

            </div>

            <div class="landing-hero-blank"></div>
        </section>
        <div class="hero-text-box text-center">
            {{-- <h1 class="text-primary hero-title display-6 fw-bold">لورم ایپسوم متن ساختگی با تولید سادگی
            </h1>
            <h2 class="hero-sub-title h6 mb-4 pb-1">
              نامفهوم از صنعت چاپ و با استفاده<br class="d-none d-lg-block" />
              از طراحان گرافیک است
            </h2> --}}
            <div class="landing-hero-btn d-inline-block position-relative">

                {{-- <a href="#landingPricing" class="btn btn-primary btn-lg">آبشده</a>
                <a href="#landingPricing" class="btn btn-primary btn-lg">بنکداری</a> --}}
                <div class="d-flex justify-content-center p-4">
                    <div class="col-md-12 col-xl-12 m-4">
                        <a href="">
                            <div class="card bg-primary text-white mb-3">
                                <div class="card-header"></div>
                                <div class="card-body">
                                    <h5 class="card-title text-white">آبشده</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-12 col-xl-12 m-4">
                        <a href="">
                            <div class="card bg-primary text-white mb-3">
                                <div class="card-header"></div>
                                <div class="card-body">
                                    <h5 class="card-title text-white">بنکداری</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <span class="hero-btn-item position-absolute d-none d-md-flex text-heading">انتخاب کنید
                    <img src="{{ asset('assets/img/front-pages/icons/Join-community-arrow.png') }}"
                        alt="Join community arrow" class="scaleX-n1-rtl" /></span>
            </div>
        </div>
        <!-- Hero: End -->

        <!-- Useful features: Start -->
        <section id="news" class="section-py landing-features">
            <div class="container">
                {{-- <div class="text-center mb-3 pb-1">
                    <span class="badge bg-label-primary">ویژگی های مفید</span>
                </div> --}}
                {{-- <h3 class="text-center mb-1">
                    <span class="section-title">همه چیزهایی که برای شروع</span>پروژه بعدی خود نیاز دارید
                </h3> --}}
                <h3 class="text-center mb-3 mb-md-5 p-3 ">
                    <span class="section-title">اخبار</span>
                </h3>
                {{-- <p class="text-center mb-3 mb-md-5 p-3">
                    نه تنها مجموعه ای از ابزارها، این بسته شامل برنامه های مفهومی آماده برای استقرار است.
                </p> --}}
                <div class="features-icon-wrapper row gx-0 gy-4 g-sm-5">

                    <div class="col-lg-4 col-sm-6">
                        <a href="">
                            <div class="card mb-3">
                                <img class="card-img-top" src="{{ asset('assets/img/front-pages/landing-page/4.jpg') }}"
                                    alt="Card image cap" />
                                <div class="card-body">
                                    <h5 class="card-title">عنوان</h5>
                                    <p class="card-text">
                                        این یک کارت عریض‌تر با متن پشتیبانی در زیر به‌عنوان ورودی طبیعی به موارد اضافی است
                                        محتوا. این محتوا یک است
                                        کمی طولانی تر
                                    </p>
                                    <p class="card-text">
                                        <small class="text-muted">آخرین به روز رسانی 3 دقیقه پیش
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a href="">
                            <div class="card mb-3">
                                <img class="card-img-top" src="{{ asset('assets/img/front-pages/landing-page/4.jpg') }}"
                                    alt="Card image cap" />
                                <div class="card-body">
                                    <h5 class="card-title">عنوان</h5>
                                    <p class="card-text">
                                        این یک کارت عریض‌تر با متن پشتیبانی در زیر به‌عنوان ورودی طبیعی به موارد اضافی است
                                        محتوا. این محتوا یک است
                                        کمی طولانی تر
                                    </p>
                                    <p class="card-text">
                                        <small class="text-muted">آخرین به روز رسانی 3 دقیقه پیش
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a href="">
                            <div class="card mb-3">
                                <img class="card-img-top" src="{{ asset('assets/img/front-pages/landing-page/4.jpg') }}"
                                    alt="Card image cap" />
                                <div class="card-body">
                                    <h5 class="card-title">عنوان</h5>
                                    <p class="card-text">
                                        این یک کارت عریض‌تر با متن پشتیبانی در زیر به‌عنوان ورودی طبیعی به موارد اضافی است
                                        محتوا. این محتوا یک است
                                        کمی طولانی تر
                                    </p>
                                    <p class="card-text">
                                        <small class="text-muted">آخرین به روز رسانی 3 دقیقه پیش
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
                <div class="text-center mt-5">
                    <a href="#landingPricing" class="btn btn-outline-primary btn-lg">بیشتر ...</a>
                </div>
        </section>
        <!-- Useful features: End -->
        <!-- Real customers reviews: Start -->
        {{-- <section id="slider" class="section-py bg-body landing-reviews pb-0">
            <!-- What people say slider: Start -->
            <div class="container">
                <div class="d-flex flex-column row align-items-center">

                    <div class="col-md-10 col-lg-10 col-xl-10">
                        <div class="swiper-reviews-carousel overflow-hidden mb-5 pb-md-2 pb-md-3">
                            <div class="swiper" id="swiper-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset('assets/img/front-pages/landing-page/2.webp') }}"
                                            alt="contact customer service"
                                            style="width: 100%; height:400px; border-radius:15px;" />

                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('assets/img/front-pages/landing-page/5.jpg') }}"
                                            alt="contact customer service"
                                            style="width: 100%; height:400px; border-radius:15px;" />

                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('assets/img/front-pages/landing-page/4.jpg') }}"
                                            alt="contact customer service"
                                            style="width: 100%; height:400px; border-radius:15px;" />

                                    </div>

                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-5 col-xl-12 d-flex justify-content-center mb-4">
                        <div class="landing-reviews-btns">
                            <button id="slider-previous-btn" class="btn btn-label-primary reviews-btn me-3 scaleX-n1-rtl"
                                type="button">
                                <i class="ti ti-chevron-left ti-sm"></i>
                            </button>
                            <button id="slider-next-btn" class="btn btn-label-primary reviews-btn scaleX-n1-rtl"
                                type="button">
                                <i class="ti ti-chevron-right ti-sm"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- What people say slider: End -->
            <hr class="m-0" />
        </section> --}}
        <!-- Real customers reviews: End -->
        <!-- Real customers reviews: Start -->
        <section id="slider" class="section-py bg-body landing-reviews pb-0" style="border-radius: 0px">
            <!-- What people say slider: Start -->
            <div class="container">
                <div class="row align-items-center gx-0 gy-4 g-lg-5">

                    <div class="col-md-6 col-lg-7 col-xl-12">
                        <div class="swiper-reviews-carousel overflow-hidden mb-5 pb-md-2 pb-md-3">
                            <div class="swiper" id="swiper-reviews">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset('assets/img/front-pages/landing-page/r3.webp') }}"
                                            alt="contact customer service" class="contact-img w-100 scaleX-n1-rtl" />

                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('assets/img/front-pages/landing-page/a1.webp') }}"
                                            alt="contact customer service" class="contact-img w-100 scaleX-n1-rtl" />

                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('assets/img/front-pages/landing-page/r1.webp') }}"
                                            alt="contact customer service" class="contact-img w-100 scaleX-n1-rtl" />

                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('assets/img/front-pages/landing-page/r2.webp') }}"
                                            alt="contact customer service" class="contact-img w-100 scaleX-n1-rtl" />

                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('assets/img/front-pages/landing-page/a3.webp') }}"
                                            alt="contact customer service" class="contact-img w-100 scaleX-n1-rtl" />

                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('assets/img/front-pages/landing-page/a4.webp') }}"
                                            alt="contact customer service" class="contact-img w-100 scaleX-n1-rtl" />

                                    </div>

                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            <div class="landing-reviews-btns mb-4 text-center">
                                <button id="reviews-previous-btn"
                                    class="btn btn-label-primary reviews-btn me-3 scaleX-n1-rtl" type="button">
                                    <i class="ti ti-chevron-left ti-sm"></i>
                                </button>
                                <button id="reviews-next-btn" class="btn btn-label-primary reviews-btn scaleX-n1-rtl"
                                    type="button">
                                    <i class="ti ti-chevron-right ti-sm"></i>
                                </button>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <!-- What people say slider: End -->
            {{-- <hr class="m-0" />
            <!-- Logo slider: Start -->
            <div class="container">
                <div class="swiper-logo-carousel py-4 my-lg-2">
                    <div class="swiper" id="swiper-clients-logos">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ asset('assets/img/front-pages/branding/logo_1-' . $configData['style'] . '.png') }}"
                                    alt="client logo" class="client-logo"
                                    data-app-light-img="front-pages/branding/logo_1-light.png"
                                    data-app-dark-img="front-pages/branding/logo_1-dark.png" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('assets/img/front-pages/branding/logo_2-' . $configData['style'] . '.png') }}"
                                    alt="client logo" class="client-logo"
                                    data-app-light-img="front-pages/branding/logo_2-light.png"
                                    data-app-dark-img="front-pages/branding/logo_2-dark.png" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('assets/img/front-pages/branding/logo_3-' . $configData['style'] . '.png') }}"
                                    alt="client logo" class="client-logo"
                                    data-app-light-img="front-pages/branding/logo_3-light.png"
                                    data-app-dark-img="front-pages/branding/logo_3-dark.png" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('assets/img/front-pages/branding/logo_4-' . $configData['style'] . '.png') }}"
                                    alt="client logo" class="client-logo"
                                    data-app-light-img="front-pages/branding/logo_4-light.png"
                                    data-app-dark-img="front-pages/branding/logo_4-dark.png" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('assets/img/front-pages/branding/logo_5-' . $configData['style'] . '.png') }}"
                                    alt="client logo" class="client-logo"
                                    data-app-light-img="front-pages/branding/logo_5-light.png"
                                    data-app-dark-img="front-pages/branding/logo_5-dark.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Logo slider: End --> --}}
        </section>
        <!-- Real customers reviews: End -->



        {{-- <!-- Our great team: Start -->
        <section id="landingTeam" class="section-py landing-team">
            <div class="container">
                <div class="text-center mb-3 pb-1">
                    <span class="badge bg-label-primary">تیم بزرگ ما</span>
                </div>
                <h3 class="text-center mb-1"><span class="section-title">پشتیبانی شده</span> توسط افراد واقعی</h3>
                <p class="text-center mb-md-5 pb-3">چه کسی پشت این تیم عالی است؟</p>
                <div class="row gy-5 mt-2">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card mt-3 mt-lg-0 shadow-none">
                            <div class="bg-label-primary position-relative team-image-box">
                                <img src="{{ asset('assets/img/front-pages/landing-page/team-member-1.png') }}"
                                    class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl"
                                    alt="human image" />
                            </div>
                            <div class="card-body border border-top-0 border-label-primary text-center">
                                <h5 class="card-title mb-0">تایماز مصطفایی</h5>
                                <p class="text-muted mb-0">Project Manager</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card mt-3 mt-lg-0 shadow-none">
                            <div class="bg-label-info position-relative team-image-box">
                                <img src="{{ asset('assets/img/front-pages/landing-page/team-member-2.png') }}"
                                    class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl"
                                    alt="human image" />
                            </div>
                            <div class="card-body border border-top-0 border-label-info text-center">
                                <h5 class="card-title mb-0">حسین غفوری</h5>
                                <p class="text-muted mb-0">UI Designer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card mt-3 mt-lg-0 shadow-none">
                            <div class="bg-label-danger position-relative team-image-box">
                                <img src="{{ asset('assets/img/front-pages/landing-page/team-member-3.png') }}"
                                    class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl"
                                    alt="human image" />
                            </div>
                            <div class="card-body border border-top-0 border-label-danger text-center">
                                <h5 class="card-title mb-0">شیما علیزاده</h5>
                                <p class="text-muted mb-0">Development Lead</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card mt-3 mt-lg-0 shadow-none">
                            <div class="bg-label-success position-relative team-image-box">
                                <img src="{{ asset('assets/img/front-pages/landing-page/team-member-4.png') }}"
                                    class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl"
                                    alt="human image" />
                            </div>
                            <div class="card-body border border-top-0 border-label-success text-center">
                                <h5 class="card-title mb-0">علی فضلی</h5>
                                <p class="text-muted mb-0">Marketing Manager</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Our great team: End --> --}}

        {{-- <!-- Fun facts: Start -->
        <section id="landingFunFacts" class="section-py landing-fun-facts">
            <div class="container">
                <div class="row gy-3">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-primary shadow-none">
                            <div class="card-body text-center">
                                <img src="{{ asset('assets/img/front-pages/icons/laptop.png') }}" alt="laptop"
                                    class="mb-2" />
                                <h5 class="h2 mb-1">24</h5>
                                <p class="fw-medium mb-0">
                                    پشتیبانی
                                    <br />
                                    24ساعته
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-success shadow-none">
                            <div class="card-body text-center">
                                <img src="{{ asset('assets/img/front-pages/icons/user-success.png') }}" alt="laptop"
                                    class="mb-2" />
                                <h5 class="h2 mb-1">50k+</h5>
                                <p class="fw-medium mb-0">
                                    به خلاقیت ها بپیوندید<br />
                                    انجمن
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-info shadow-none">
                            <div class="card-body text-center">
                                <img src="{{ asset('assets/img/front-pages/icons/diamond-info.png') }}" alt="laptop"
                                    class="mb-2" />
                                <h5 class="h2 mb-1">4.8/5</h5>
                                <p class="fw-medium mb-0">
                                    دارای رتبه بالا<br />
                                    محصولات
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-warning shadow-none">
                            <div class="card-body text-center">
                                <img src="{{ asset('assets/img/front-pages/icons/check-warning.png') }}" alt="laptop"
                                    class="mb-2" />
                                <h5 class="h2 mb-1">100%</h5>
                                <p class="fw-medium mb-0">
                                    برگشت پول<br />
                                    ضمانت
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Fun facts: End -->

        <!-- FAQ: Start -->
        <section id="landingFAQ" class="section-py bg-body landing-faq">
            <div class="container">
                <div class="text-center mb-3 pb-1">
                    <span class="badge bg-label-primary">سوالات متداول</span>
                </div>
                <h3 class="text-center mb-1">پرسش های متداول <span class="section-title">سوالات</span></h3>
                <p class="text-center mb-5 pb-3">این سؤالات متداول را مرور کنید تا پاسخ سؤالات متداول را بیابید.</p>
                <div class="row gy-5">
                    <div class="col-lg-5">
                        <div class="text-center">
                            <img src="{{ asset('assets/img/front-pages/landing-page/faq-boy-with-logos.png') }}"
                                alt="faq boy with logos" class="faq-image" />
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="accordion" id="accordionExample">
                            <div class="card accordion-item active">
                                <h2 class="accordion-header" id="headingOne">
                                    <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                        data-bs-target="#accordionOne" aria-expanded="true" aria-controls="accordionOne">
                                        آیا برای هر ارتقاء هزینه ای دریافت می کنید؟
                                    </button>
                                </h2>

                                <div id="accordionOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        کیک شکلاتی قطره لیمو کیک هویج چوپا چپس مافین کیک. کنجد
                                        یخ می زند
                                        مارزیپان گومی خرس ماکارونی دراژه پودر کارامل دانمارکی. شیرینی دراژه پنجه خرس
                                        تاپینگ
                                        سوفله ویفر گامی خرس شیرینی ختمی.
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#accordionTwo" aria-expanded="false"
                                        aria-controls="accordionTwo">
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ؟
                                    </button>
                                </h2>
                                <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ لورم ایپسوم متن ساختگی با
                                        تولید سادگی نامفهوم از صنعت چاپ لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                        صنعت چاپ
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#accordionTwo" aria-expanded="false"
                                        aria-controls="accordionTwo">
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ؟
                                    </button>
                                </h2>
                                <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ لورم ایپسوم متن ساختگی با
                                        تولید سادگی نامفهوم از صنعت چاپ لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                        صنعت چاپ
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#accordionTwo" aria-expanded="false"
                                        aria-controls="accordionTwo">
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ؟
                                    </button>
                                </h2>
                                <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ لورم ایپسوم متن ساختگی با
                                        تولید سادگی نامفهوم از صنعت چاپ لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                        صنعت چاپ
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#accordionTwo" aria-expanded="false"
                                        aria-controls="accordionTwo">
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ؟
                                    </button>
                                </h2>
                                <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ لورم ایپسوم متن ساختگی با
                                        تولید سادگی نامفهوم از صنعت چاپ لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                        صنعت چاپ
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- FAQ: End --> --}}

        {{-- <!-- CTA: Start -->
        <section id="landingCTA" class="section-py landing-cta p-lg-0 pb-0">
            <div class="container">
                <div class="row align-items-center gy-5 gy-lg-0">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h6 class="h2 text-primary fw-bold mb-1">برای شروع آماده اید؟</h6>
                        <p class="fw-medium mb-4">پروژه خود را با یک دوره آزمایشی رایگان 14 روزه شروع کنید</p>
                        <a href="{{ url('/front-pages/payment') }}" class="btn btn-lg btn-primary">شروع کنید</a>
                    </div>
                    <div class="col-lg-6 pt-lg-5 text-center text-lg-end">
                        <img src="{{ asset('assets/img/front-pages/landing-page/ring.png') }}" alt="cta dashboard"
                            class="img-fluid" />
                    </div>
                </div>
            </div>
        </section>
        <!-- CTA: End --> --}}

        {{-- <!-- Contact Us: Start -->
        <section id="contact" class="section-py bg-body landing-contact">
            <div class="container">
                <div class="text-center mb-3 pb-1">
                    <span class="badge bg-label-primary">تماس با ما</span>
                </div>
                <h3 class="text-center mb-1"><span class="section-title">با ما </span>در ارتباط باشید</h3>
                <p class="text-center mb-4 mb-lg-5 pb-md-3">سوال یا نکته ای دارید؟ فقط برای ما پیام بنویسید</p>
                <div class="row gy-4">
                    <div class="col-lg-5">
                        <div class="contact-img-box position-relative border p-2 h-100">
                            <img src="{{ asset('assets/img/front-pages/landing-page/conect.jpg') }}"
                                alt="contact customer service" class="contact-img w-100 scaleX-n1-rtl" />
                            <div class="pt-3 px-4 pb-1">
                                <div class="row gy-3 gx-md-4">
                                    <div class="col-md-6 col-lg-12 col-xl-6">
                                        <div class="d-flex align-items-center">
                                            <div class="badge bg-label-primary rounded p-2 me-2"><i
                                                    class="ti ti-mail ti-sm"></i></div>
                                            <div>
                                                <p class="mb-0">ایمیل ما</p>
                                                <h5 class="mb-0">
                                                    <a href="mailto:example@gmail.com"
                                                        class="text-heading">example@gmail.com</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-12 col-xl-6">
                                        <div class="d-flex align-items-center">
                                            <div class="badge bg-label-success rounded p-2 me-2">
                                                <i class="ti ti-phone-call ti-sm"></i>
                                            </div>
                                            <div>
                                                <p class="mb-0">شماره تماس ما</p>
                                                <h5 class="mb-0"><a href="tel:+1234-568-963"
                                                        class="text-heading">09146278894</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-1 mb-4">ارسال پیام</h4>
                                <form>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="contact-form-fullname">نام و نام
                                                خانوادگی</label>
                                            <input type="text" class="form-control" id="contact-form-fullname"
                                                placeholder="حسین غفوری" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="contact-form-email">ایمیل</label>
                                            <input type="text" id="contact-form-email" class="form-control"
                                                placeholder="johndoe@gmail.com" />
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="contact-form-message">پیغام</label>
                                            <textarea id="contact-form-message" class="form-control" rows="8" placeholder="پیام خود را بنویسید"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">ارسال</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Us: End --> --}}
    </div>
@endsection
