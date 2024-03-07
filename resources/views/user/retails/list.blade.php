@extends('layouts/layoutMaster')

@section('title', 'بنک داری دسته بندی ' . $category->name)

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
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">بنکداری /</span> لیست محصولات</h4>

    <div class="app-academy">
        <div class="card p-0 mb-4">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
                <div class="app-academy-md-25 card-body py-0">
                    <img src="{{ asset('assets/img/illustrations/page-pricing-enterprise.png') }}"
                        class="img-fluid app-academy-img-height scaleX-n1-rtl" alt="Bulb in hand"
                        data-app-light-img="illustrations/page-pricing-enterprise.png"
                        data-app-dark-img="illustrations/page-pricing-enterprise.png" height="90" />
                </div>
                <div class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center">
                    <h3 class="card-title mb-4 lh-sm px-md-5 lh-lg">
                        جست و جوی محصول
                    </h3>
                    {{-- <p class="mb-3">
                    بین مطلب های که نوشتید جست و جو کنید
                </p> --}}
                    <div class="d-flex align-items-center justify-content-between app-academy-md-80">
                        <button type="submit" class="btn btn-primary btn-icon me-2"><i class="ti ti-search"></i></button>
                        <input type="search" placeholder="جست و جوی محصول" class="form-control" />
                    </div>
                </div>
                <div class="app-academy-md-25 d-flex align-items-end justify-content-end m-4">
                    <img src="{{ asset('assets/img/illustrations/diom.png') }}" alt="pencil rocket" height="100"
                        class="scaleX-n1-rtl" />
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header d-flex flex-wrap justify-content-between gap-3">
                <div class="card-title mb-0 me-1">
                    <h5 class="mb-1">{{ $category->name }}</h5>
                    <p class="text-muted mb-0">{{ $category->desc }}</p>
                </div>
                <div class="d-flex justify-content-md-end align-items-center gap-4 flex-wrap">
                    {{-- <select id="select2_course_select" class="select2 form-select" data-placeholder="All Courses">
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
                    </label> --}}
                    <div class="d-flex flex-column flex-md-row gap-2 text-nowrap">
                        <div class="d-grid gap-2 col-lg-12 mx-auto">
                            <span class="badge rounded-pill bg-danger text-white badge-notifications p-1"
                                style="z-index: 1000">10</span>
                            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasScroll" aria-controls="offcanvasScroll" style="z-index: 999"><i
                                    class="ti ti-shopping-cart"></i>سبدخرید</button>


                        </div>


                    </div>
                    <!-- Enable Body Scrolling Offcanvas -->
                    <div class="col-lg-4 col-md-6">
                        <div class="mt-3">

                            <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false"
                                tabindex="-1" id="offcanvasScroll" aria-labelledby="offcanvasScrollLabel">
                                <div class="offcanvas-header border-bottom">
                                    <h5 id="offcanvasScrollLabel" class="offcanvas-title"><i
                                            class="ti ti-shopping-cart"></i>سبد خرید شما</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body my-auto mx-0">
                                    <div class="col-md-12 col-xl-12">
                                        <div class="card shadow-none bg-transparent border border-secondary mb-3">
                                            <div class="p-2 d-flex">
                                                <div class="text-center col-3 d-flex">
                                                    <img class="card-img card-img-left rounded" style="margin-bottom: 0"
                                                        src="{{ asset('assets/img/pages/ring.jpg') }}"
                                                        alt="tutor image 1" />
                                                </div>
                                                <div class="col-9">
                                                    <div class="position-absolute float-left"
                                                        style="left: 20px; cursor: pointer;" title="حذف">
                                                        <button class="btn waves-effect" style="padding: 5px"><i
                                                                class="ti ti-trash text-danger"
                                                                style="font-size:25px;"></i></button>

                                                    </div>

                                                    <h5 class="card-title ms-3">حلقه الماس</h5>
                                                    <p class="d-block text-muted mb-0 ms-3" style="font-size:15px;">
                                                        86,500,00000000 ریال</p>


                                                    <div class="input-number d-flex gap-2 text-nowrap ms-3 mt-2">
                                                        <button class="btn btn-primary btn-icon input-number__plus"
                                                            type="button" style="height:20px; width:20px;"><i
                                                                class="ti ti-plus"></i></button>
                                                        <input
                                                            class="form-control text-center form__input input-number__input"
                                                            min="0" max="1000000" type="number"
                                                            id="html5-number-input" style="width: 30%; height:20px;" />
                                                        <button class="btn btn-primary btn-icon input-number__minus"
                                                            type="button" style="height:20px; width:20px;"><i
                                                                class="ti ti-minus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="offcanas-footer border-top p-3">
                                    <div class="col-12 d-flex justify-content-between">
                                        <span class="">مبلغ سبد خرید:</span><span
                                            class="text-primary fw-bold">8,000,000,000,000 ریال</span>
                                    </div>
                                    <div class="d-grid gap-2 col-12 mx-auto mt-4">
                                        <button class="btn btn-primary waves-effect waves-light" type="button">نهایی کردن
                                            خرید</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row gy-4 mb-4">
                    @foreach ($category->retails as $retial)
                        <div class="col-sm-6 col-lg-4">
                            <div class="card p-2 h-100 shadow-none border">
                                <div class="rounded-2 text-center mb-3">
                                    <a href="{{ url('app/academy/course-details') }}"><img class="img-fluid"
                                            src="{{ asset('assets/img/pages/ring.jpg') }}" alt="tutor image 1" /></a>
                                </div>
                                <div class="card-body p-3 pt-2">
                                    {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="badge bg-label-primary">Web</span>
                                    <h6 class="d-flex align-items-center justify-content-center gap-1 mb-0">
                                        4.4 <span class="text-warning"><i
                                                class="ti ti-star-filled me-1 mt-n1"></i></span><span
                                            class="text-muted">(1.23k)</span>
                                    </h6>
                                </div> --}}
                                    <a href="{{ url('app/academy/course-details') }}" class="h5">{{$retial->name}}</a>
                                    <p class="mt-2">{{$retial->desc}}</p>
                                    <p class="d-flex align-items-center justify-content-end text-success">{{$retial->priceFormated()}} ریال
                                    </p>
                                    <div class="d-flex flex-column flex-md-row gap-2 text-nowrap">
                                        <div class="d-grid gap-2 col-12 mx-auto">
                                            <button class="btn btn-primary" id="addToCart" type="button">افزودن به سبد
                                                خرید</button>
                                        </div>

                                    </div>
                                    <div class="input-number d-none flex-column flex-md-row gap-2 text-nowrap">
                                        <div class="d-grid gap-2 col-lg-3 mx-auto">
                                            <button class="btn btn-primary input-number__plus" type="button"><i
                                                    class="ti ti-plus"></i></button>
                                        </div>
                                        <div class="d-grid gap-2 col-lg-4 mx-auto">
                                            <input class="form-control text-center form__input input-number__input"
                                                min="0" max="1000000" type="number" id="html5-number-input" />

                                        </div>

                                        <div class="d-grid gap-2 col-lg-3 mx-auto">
                                            <button class="btn btn-primary input-number__minus" type="button"><i
                                                    class="ti ti-minus"></i></button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- <nav aria-label="Page navigation" class="d-flex align-items-center justify-content-center">
                    <ul class="pagination">
                        <li class="page-item prev">
                            <a class="page-link" href="javascript:void(0);"><i
                                    class="ti ti-chevron-left ti-xs scaleX-n1-rtl"></i></a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="javascript:void(0);">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">4</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">5</a>
                        </li>
                        <li class="page-item next">
                            <a class="page-link" href="javascript:void(0);"><i
                                    class="ti ti-chevron-right ti-xs scaleX-n1-rtl"></i></a>
                        </li>
                    </ul>
                </nav> --}}
            </div>
        </div>

    </div>
    <script>
        // Custom input['number']
        let addToCart = document.querySelector('#addToCart'),
            numberMinus = document.querySelector('.input-number__minus'),
            numberPlus = document.querySelector('.input-number__plus'),
            numberField = document.querySelector('.input-number__input'),
            numberFieldMin = +numberField.getAttribute('min'),
            numberFieldMax = +numberField.getAttribute('max');

        numberMinus.addEventListener("click", () => {
            if (numberField.value > numberFieldMin) {
                numberField.value = +numberField.value - 1;
            }
            return;
        })

        numberPlus.addEventListener("click", () => {
            if (numberField.value < numberFieldMax) {
                numberField.value = +numberField.value + 1;
            }
            return;
        })
    </script>
@endsection
