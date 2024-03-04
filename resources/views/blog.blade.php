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
        <!-- Useful features: Start -->
        <section id="landingFeatures" class="section-py landing-features mt-5">
            <div class="container">
                <div class="row">
                    <div class="text-center mb-3 pb-1">
                        <span class="badge bg-label-primary">اخبار</span>
                    </div>
                    <h3 class="text-center mb-3">
                        <span class="section-title">موضوع اخبار</span>
                    </h3>


                    <div class="text-center mt-4">
                        <img src="{{ asset('assets/img/front-pages/landing-page/4.jpg') }}"class="rounded mx-auto d-block"
                            alt="..." width="70%">

                    </div>
                    <div class="d-flex     justify-content-center">
                        <p class="text-start mt-5 pb-3" style="line-height: 50px; width:70%">
                            رنگ هایی که برای تزئین رستوران خود استفاده می کنید، تاثیر زیادی بر مشتریان، مدت زمانی که در
                            رستورانتان صرف می کنند و احساسشان، میگذارد. در این مطلب، درمورد طرح رنگ فضای رستوران، تاثیر آن
                            بر مشتریان و همینطور روانشناسی رنگ ها صحبت خواهیم کرد. با ما همراه باشید.

                            رنگ ها می توانند مشتریان شما را خوشحال کنند، اشتهای آن ها و گردش میز را افزایش دهند یا فضای
                            رستوران را بزرگتر نشان دهند. اما می توانند تاثیر منفی هم بگذارند. بنابراین مهم است که بدانید
                            انتخاب رنگ داخلی رستوران شما چگونه بر پیام آن تاثیر می گذارد. برای این کار، ابتدا باید روانشناسی
                            رنگ ها را درک کنید. سپس یاد بگیرید که چگونه رنگ ها باهم در یک طرح رنگی دلپذیر و مکمل قرار می
                            گیرند.

                            ۵ ایده طرح رنگ داخلی رستوران
                            حال که می دانید رنگ ها چگونه بر مشتریان شما تاثیر می گذارند، باید این را هم بدانید که کدام رنگ
                            ها باهم ترکیب می شوند و چگونه یک طرح رنگی دلپذیر ایجاد کنید. برای کسانی که تجربه زیادی در
                            دکوراسیون داخلی ندارند، ما فهرستی از چند طرح رنگی همه کاره و پرطرفدار آماده کرده ایم تا برای شما
                            ایده ای درباره اینکه چه رنگ هایی باهم تطابق دارند، ارائه دهیم.
                        </p>
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
                    <span class="section-title">اخبار بیشتر</span>
                </h3>
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
            </div>
        </section>
        <!-- Useful features: End -->
    </div>
@endsection
