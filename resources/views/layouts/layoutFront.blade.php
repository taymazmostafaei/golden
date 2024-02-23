@php
$configData = Helper::appClasses();
$isFront = true;
@endphp

@section('layoutContent')

@extends('layouts/commonMaster' )

@include('header')

<!-- Sections:Start -->
@yield('content')
<!-- / Sections:End -->

@include('footer')
@endsection
