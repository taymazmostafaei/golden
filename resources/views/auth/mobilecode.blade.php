@php
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'تایید شماره تلفن')

@section('vendor-style')
<!-- Vendor -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
@endsection

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-auth.js')}}"></script>
<script src="{{asset('assets/js/pages-auth-two-steps.js')}}"></script>
@endsection

@section('content')
<div class="authentication-wrapper authentication-basic px-4">
  <div class="authentication-inner py-4">
    <!--  Two Steps Verification -->
    <div class="card">
      <div class="card-body">
        <!-- Logo -->
        <div class="app-brand justify-content-center mb-4 mt-2">
          <a href="{{url('/')}}" class="app-brand-link gap-2">
            <span class="app-brand-logo demo">@include('_partials.macros',['height'=>20,'withbg' => "fill: #fff;"])</span>
            <span class="app-brand-text demo text-body fw-bold ms-1">{{ config('variables.templateName') }}</span>
          </a>
        </div>
        <!-- /Logo -->
        <h4 class="mb-1 pt-2">تایید دو مرحله ای 💬</h4>
        <p class="text-start mb-4">
          ما یک کد تأیید به تلفن همراه شما ارسال کردیم. کد تأیید را در فیلد زیر وارد کنید.
          <span class="fw-medium d-block mt-2">******1234</span><span>{{$code}}</span>
        </p>
        <p class="mb-0 fw-medium">کد امنیتی 6 رقمی را تایپ کنید</p>
        <form id="twoStepsForm" action="{{route('login')}}" method="POST">
          @csrf
          <div class="mb-3">
            <div style="direction: ltr" class="auth-input-wrapper d-flex align-items-center justify-content-sm-between numeral-mask-wrapper">
              <input name="code1" type="tel" name="code" class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1" autofocus>
              <input name="code2" type="tel" class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
              <input name="code3" type="tel" class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
              <input name="code4" type="tel" class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
              <input name="code5" type="tel" class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
              <input name="code6" type="tel" class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
            </div>
            <!-- Create a hidden field which is combined by 3 fields above -->
            <input type="hidden" name="codecheck" value="{{$mobile}}"/>
          </div>
          <button class="btn btn-primary d-grid w-100 mb-3">
            تایید
          </button>
          <div class="text-center">کد را دریافت نکردید؟
            <a href="javascript:void(0);">
              ارسال دوباره
            </a>
          </div>
        </form>
      </div>
    </div>
    <!-- / Two Steps Verification -->
  </div>
</div>
@endsection