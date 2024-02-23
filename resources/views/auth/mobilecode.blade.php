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
@livewireStyles
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
@endsection

@section('page-script')
@livewireScripts
<script src="{{asset('assets/js/pages-auth.js')}}"></script>
<script src="{{asset('assets/js/pages-auth-two-steps.js')}}"></script>
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('displayDivAfter120Seconds', function () {
            // Call your JavaScript function here
            document.getElementById("code-again").style.display = "none"; // Show the div
            document.getElementById("countdown").style.display = "block"; // Hide the countdown display
            displayDivAfter120Seconds();
        });
    });
  // Function to display the div after 120 seconds
  function displayDivAfter120Seconds() {
    var countdown = 120; // Countdown duration in seconds

    // Function to update countdown and display div
    function updateCountdown() {
      countdown--;
      document.getElementById("countdown").innerText = countdown + " ثانیه تا ارسال مجدد کد " ; // Update countdown display
      if (countdown <= 0) {
        clearInterval(timer); // Stop the timer
        document.getElementById("code-again").style.display = "block"; // Show the div
        document.getElementById("countdown").style.display = "none"; // Hide the countdown display
      }
    }

    // Initial call to updateCountdown
    updateCountdown();

    // Timer to call updateCountdown every second
    var timer = setInterval(updateCountdown, 1000);
  }

  // Call the function to start the countdown
  displayDivAfter120Seconds();
</script>
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
        @if ( isset($wrongcode) )
				<div class="alert alert-danger">
					<ul>
						{{$wrongcode}}
					</ul>
				</div>
				@endif
        <livewire:mobilecode :mobile=$mobile /> 
      </div>
    </div>
    <!-- / Two Steps Verification -->
  </div>
</div>
@endsection