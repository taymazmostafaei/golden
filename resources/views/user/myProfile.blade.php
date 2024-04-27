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

@endsection

@section('page-script')
    <script src="{{ asset('assets/js/modal-edit-user.js') }}"></script>
    <script src="{{ asset('assets/js/app-user-view.js') }}"></script>
    <script src="{{ asset('assets/js/app-user-view-account.js') }}"></script>
    <script src="{{ asset('assets/js/forms-file-upload.js') }}"></script>
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
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"> /</span> پروفایل من
    </h4>
    @include('components.alert')
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
                                @switch($user->status)
                                @case('verify')
                                    <span class="badge bg-label-success" text-capitalized="">تایید شده</span>
                                @break

                                @case('wait')
                                    <span class="badge bg-label-warning" text-capitalized="">در انتظار</span>
                                @break

                                @default
                                    <span class="badge bg-label-danger" text-capitalized="">رد شده</span>
                            @endswitch
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
                        <form action="{{ route('profile-cert-upload') }}" method="post"
                            enctype="multipart/form-data" class="dropzone" id="image-upload">
                            @csrf
                            <div class="dz-message needsclick" data-dz-message>
                                عکس ها را اینجا رها کنید یا برای آپلود کلیک کنید
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card mb-4">
                        <h5 class="card-header">عکس کارت زرگری یا پروانه کسب</h5>
                        <img class="img-fluid d-flex mx-auto my-4 rounded"
                            src="{{ asset('storage/certs/' . $user->cert) }}" alt="Card image cap">

                    </div>
                </div>

            </div>
            <!-- /Basic  -->

        </div>
        <!--/ User Content -->
    </div>

    <!-- Modal -->
    <!-- Edit User Modal -->
    <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">ویرایش اطلاعات کاربری</h3>
                        {{-- <p class="text-muted">Updating user details will receive a privacy audit.</p> --}}
                    </div>
                    <form class="row g-3" method="POST" action="{{ route('users.update', $user) }}">
                        @csrf
                        @method('put')
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="firstname">نام</label>
                            <input type="text" name="firstname" class="form-control"
                                value="{{ $user->firstname }}" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="lastname">نام خانوادگی</label>
                            <input type="text" name="lastname" class="form-control" value="{{ $user->lastname }}" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="national_id">کدملی</label>
                            <input type="number" name="national_id" class="form-control"
                                value="{{ $user->national_id }}" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="address">آدرس</label>
                            <input type="text" name="address" class="form-control" value="{{ $user->address }}" />
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label" for="status">تغییر وضعیت</label>
                            <select id="modalEditUserStatus" name="status" class="select2 form-select"
                                aria-label="Default select example">
                                <option @selected($user->status == 'verify') value="verify">تایید شده</option>
                                <option @selected($user->status == 'wait') value="wait">در انتظار</option>
                                <option @selected($user->status == 'reject') value="reject">رد شده</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="phone">شماره موبایل</label>
                            <div class="input-group">
                                <span class="input-group-text">IR (09)</span>
                                <input style="direction: ltr" type="text" name="phone"
                                    class="form-control phone-number-mask" value="{{ $user->phone }}" />

                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="telphone">شماره ثابت</label>
                            <div class="input-group">
                                <span class="input-group-text">IR</span>
                                <input type="text" style="direction: ltr" name="telphone"
                                    class="form-control phone-number-mask" value="{{ $user->telphone }}" />

                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">ثبت تغییرات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Edit User Modal -->

    <!-- /Modal -->
@endsection
