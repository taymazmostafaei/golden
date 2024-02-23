@php
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'ورود به حساب کاربری')

@section('vendor-style')
<!-- Vendor -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
@endsection

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-auth.js')}}"></script>
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">
      <!-- Login -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center mb-4 mt-2">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">@include('_partials.macros',["height"=>20,"withbg"=>'fill: #fff;'])</span>
              <span class="app-brand-text demo text-body fw-bold ms-1">{{config('variables.templateName')}}</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-1 pt-2">ورود به {{config('variables.templateName')}}</h4>
          <br>
          <p class="mb-4">مطمئن شوید که در دامنه 
            <span class="badge bg-label-secondary">{{config('app.url')}}</span>
             هستید.</p>

        @if ($errors->any())
             <div class="alert alert-danger">
                 <ul>
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div>
        @endif

          <form id="formAuthentication" class="mb-3" action="{{route('login')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label"> شماره موبایل </label>
              <input type="tel" style="direction: ltr" class="form-control" id="phone" name="phone" placeholder=" 09" autofocus>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">ادامه</button>
            </div>
          </form>

          <div class="divider my-4">
            <div class="divider-text">یا</div>
          </div>

          <p class="text-center">
            <span>حساب کاربری بسازید</span>
            <a href="{{url('register')}}">
              <span> ثبت نام </span>
            </a>
          </p>

        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>
@endsection