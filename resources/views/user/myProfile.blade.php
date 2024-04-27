@extends('layouts/layoutMaster')

@section('title', 'User View - Pages')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />

@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-user-view.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>

@endsection

@section('page-script')
    <script src="{{ asset('assets/js/modal-edit-user.js') }}"></script>
    <script src="{{ asset('assets/js/app-user-view.js') }}"></script>
    <script src="{{ asset('assets/js/app-user-view-account.js') }}"></script>
    <script src="{{ asset('assets/js/forms-file-upload.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"> /</span> پروفایل من
    </h4>
    <div class="row">
        <!-- User Sidebar -->
        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
            <!-- User Card -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class=" d-flex align-items-center flex-column">
                            <img class="img-fluid rounded mb-3 pt-1 mt-4" src="{{ asset('assets/img/avatars/15.png') }}"
                                height="100" width="100" alt="User avatar" />
                            <div class="user-info text-center">
                                <h4 class="mb-2">{{$user->firstname}} {{$user->lastname}}</h4>
                                <span class="badge bg-label-success" text-capitalized="">تایید شده</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around flex-wrap mt-3 pt-3 pb-4 border-bottom">
                        <div class="d-flex align-items-start me-4 mt-3 gap-2">
                            <span class="badge bg-label-primary p-2 rounded"><i class='ti ti-user-code'></i></span>
                            <div>
                                <p class="mb-0 fw-medium">کدملی</p>
                                <small>{{$user->national_id}}</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-start me-4 mt-3 gap-2">
                            <span class="badge bg-label-primary p-2 rounded"><i class='ti ti-phone'></i></span>
                            <div>
                                <p class="mb-0 fw-medium">شماره ثابت</p>
                                <small>{{$user->phone}}</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-start me-4 mt-3 gap-2">
                            <span class="badge bg-label-primary p-2 rounded"><i class='ti ti-device-mobile'></i></span>
                            <div>
                                <p class="mb-0 fw-medium">شماره موبایل</p>
                                <small>{{$user->telphone}}</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-start me-4 mt-3 gap-2">
                            <span class="badge bg-label-primary p-2 rounded"><i class="ti ti-calendar"></i></span>
                            <div>
                                <p class="mb-0 fw-medium">تاریخ ثبت نام</p>
                                <small>{{$user->created_at}}</small>
                            </div>
                        </div>
                    </div>
                    <div class="info-container p-4">
                        <div class="d-flex justify-content-center">
                            <a href="javascript:;" class="btn btn-primary me-3" data-bs-target="#editUser"
                                data-bs-toggle="modal">ویرایش</a>
                            {{-- <a href="javascript:;" class="btn btn-label-danger suspend-user">Suspended</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /User Card -->
            <!-- Plan Card -->

            <!-- /Plan Card -->
        </div>
        <!--/ User Sidebar -->


        <!-- User Content -->
        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
            <!-- User Pills -->
            <ul class="nav nav-pills flex-column flex-md-row mb-4">
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i
                            class="ti ti-user-check ti-xs me-1"></i>حساب کاربری</a></li>
            </ul>
            <!--/ User Pills -->

            <!-- Basic  -->
            <div class="col-12">
                <div class="card mb-4">
                    <h5 class="card-header">بارگذاری عکس کارت زرگری یا پروانه کسب</h5>
                    <div class="card-body">
                        <form action="/upload" class="dropzone needsclick" id="dropzone-basic">
                            <div class="dz-message needsclick">
                                فایل ها را اینجا رها کنید یا برای آپلود کلیک کنید
                            </div>
                            <div class="fallback">
                                <input name="file" type="file" />
                            </div>
                            <button type="submit" class="btn btn-primary me-2">ذخیره</button>
                        </form>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card mb-4">
                        <h5 class="card-header">عکس کارت زرگری یا پروانه کسب</h5>
                        <img class="img-fluid d-flex mx-auto my-4 rounded"
                            src="//localhost:3000/assets/img/elements/4.jpg" alt="Card image cap">

                    </div>
                </div>

            </div>
            <!-- /Basic  -->

        </div>
        <!--/ User Content -->
    </div>

    <!-- Modal -->
    @include('_partials/_modals/user-modal-edit-user')
@endsection
