@php
    $customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Register Basic - Pages')

@section('vendor-style')
    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />
@endsection

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/pages-auth.js') }}"></script>
@endsection

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4" style="max-width: 500px">

                <!-- Register Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand mb-2">
                            <a href="{{ url('/') }}" class="app-brand-link gap-2">
                                {{-- <span class="app-brand-logo demo">@include('_partials.macros',["height"=>20,"withbg"=>'fill: #fff;'])</span> --}}
                                <span
                                    class="app-brand-text demo text-body fw-bold ms-1">{{ config('variables.templateName') }}</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-1 text-center">ثبت نام</h4>
                        {{-- <h4 class="mb-1 pt-2">Adventure starts here 🚀</h4> --}}
                        {{-- <p class="mb-4">Make your app management easy and fun!</p> --}}
                        <form id="formAuthentication" class="mb-3" action="{{ url('/') }}" method="GET">

                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">نام و نام خانوادگی</label>
                                <div class="input-group">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="ti ti-user"></i></span>
                                    <input type="text" class="form-control" id="multicol-first-name" placeholder="حسین"
                                        autofocus />
                                    <input type="text" class="form-control" id="multicol-last-name"
                                        placeholder="غفوری" />

                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">کدملی</label>
                                <div class="input-group">
                                    <span id="basic-icon-default-company2" class="input-group-text"><i
                                            class="ti ti-creative-commons-by"></i></span>
                                    <input type="text" id="collapsible-pincode" class="form-control"
                                        placeholder="1369878896" />

                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-phone">شماره موبایل</label>
                                <div class="input-group">
                                    <span id="basic-icon-default-phone2 " class="input-group-text"><i
                                            class="ti ti-device-mobile"></i></span>
                                    <input type="tel" style="direction: ltr" class="form-control" id="phone"
                                        name="phone" placeholder=" 09">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-phone">شماره ثابت</label>
                                <div class="input-group">
                                    <span id="basic-icon-default-phone2" class="input-group-text"><i
                                            class="ti ti-phone"></i></span>
                                    <input type="tel" style="direction: ltr" class="form-control" id="phone"
                                        name="phone" placeholder=" 041">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-phone">عکس کارت زرگری یا پروانه کسب</label>
                                <div class="input-group">
                                    <span id="basic-icon-default-phone2" class="input-group-text"><i
                                            class="ti ti-photo"></i></span>
                                    <input class="form-control" type="file" id="formFile" placeholder="dsfdf">

                                </div>
                            </div>
                            <button class="btn btn-primary d-grid w-100">
                                ثبت نام
                            </button>
                        </form>

                        <p class="text-center">
                            <span>از قبل حساب کاربری دارید؟
                            </span>
                            <a href="{{ url('auth/login-basic') }}">
                                <span>وارد شوید</span>
                            </a>
                        </p>

                        {{-- <div class="divider my-4">
                            <div class="divider-text">or</div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
                                <i class="tf-icons fa-brands fa-facebook-f fs-5"></i>
                            </a>

                            <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
                                <i class="tf-icons fa-brands fa-google fs-5"></i>
                            </a>

                            <a href="javascript:;" class="btn btn-icon btn-label-twitter">
                                <i class="tf-icons fa-brands fa-twitter fs-5"></i>
                            </a>
                        </div> --}}
                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>
@endsection
