@extends('layouts.layoutMaster')

@section('title', 'Galleries in ' . $category->name)

@section('vendor-style')

@endsection

@section('vendor-script')

@endsection

@section('page-script')

@endsection

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Galleries in </span>{{ $category->name }}</h4>
    <a href="{{ route('user.categories.index') }}" type="button" class="btn btn-label-secondary waves-effect">
        <span class="ti-xs ti ti-arrow-back-up me-2"></span>بازگشت
    </a>
    <hr>
    <div class="row">
        @foreach($galleries as $gallery)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ asset('storage/' . $gallery->image_path) }}" loading="lazy" class="card-img-top" alt="{{ $gallery->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $gallery->title }}</h5>
                        <p class="card-text">{{ Str::limit($gallery->description, 100) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
