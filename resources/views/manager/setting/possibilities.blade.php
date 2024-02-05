@extends('layouts/layoutMaster')

@section('title', 'eCommerce Settings Checkout - Apps')

@section('page-script')
    <script src="{{ asset('assets/js/app-ecommerce-settings.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">مدیریت /</span> تنظیمات
    </h4>

    <div class="row g-4">

        <!-- Navigation -->
        <div class="col-12 col-lg-4">
            <div class="d-flex justify-content-between flex-column mb-3 mb-md-0">
                <ul class="nav nav-align-left nav-pills flex-column">
                    <li class="nav-item mb-1">
                        <a class="nav-link py-2" href="{{ url('/manager/setting/setFy') }}">
                            <i class="ti ti-table-options me-2"></i>
                            <span class="align-middle">تنظیم فی</span>
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a class="nav-link py-2 active" href="{{ url('/manager/setting/possibilities') }}">
                            <i class="ti ti-adjustments-horizontal me-2"></i>
                            <span class="align-middle">امکانات</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /Navigation -->

        <!-- Options -->
        <div class="col-12 col-lg-8 pt-4 pt-lg-0">
            <div class="tab-content p-0">
                <!-- Checkout Tab -->
                <div class="tab-pane fade show active" id="checkout" role="tabpanel">
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="card-title m-0">
                                <h4 class="m-0">امکانات</h4>
                                <p class="text-muted mb-0">در این بخش می توانید امکانات زیر را فعال یا غیر فعال کنید</p>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="d-flex flex-column">
                            <label class="switch switch-square">
                                <input type="checkbox" class="switch-input">
                                <span class="switch-toggle-slider">
                                    <span class="switch-on"><i class="ti ti-check"></i></span>
                                    <span class="switch-off"><i class="ti ti-x"></i></span>
                                </span>
                                <h5 class="switch-label">امکان ثبت نام</h5>
                            </label>
                            <label class="switch switch-square">
                                <input type="checkbox" class="switch-input">
                                <span class="switch-toggle-slider">
                                    <span class="switch-on"><i class="ti ti-check"></i></span>
                                    <span class="switch-off"><i class="ti ti-x"></i></span>
                                </span>
                                <h5 class="switch-label">امکان ثبت سفارش آبشده</h5>
                            </label>
                            <label class="switch switch-square">
                                <input type="checkbox" class="switch-input">
                                <span class="switch-toggle-slider">
                                    <span class="switch-on"><i class="ti ti-check"></i></span>
                                    <span class="switch-off"><i class="ti ti-x"></i></span>
                                </span>
                                <h5 class="switch-label">امکان ثبت سفارش بنکداری</h5>
                            </label>
                        </div>
                            <div class="d-flex justify-content-start mt-4 gap-3">
                                <a class="btn btn-primary"
                                    href="{{ url('/app/ecommerce/settings/notifications') }}">ذخیره</a>

                            </div>

                        </div>
                    </div>


                </div>

            </div>
        </div>
        <!-- /Options-->
    </div>

@endsection
