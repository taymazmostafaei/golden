@extends('layouts.layoutMaster')

@section('title', 'Categories')

@section('vendor-style')

@endsection

@section('vendor-script')

@endsection

@section('page-script')

@endsection

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Categories</span></h4>
    {{-- <a href="{{ route('user.categories.index') }}" type="button" class="btn btn-label-secondary waves-effect">
        <span class="ti-xs ti ti-arrow-back-up me-2"></span>بازگشت
    </a>
    <hr> --}}
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-lg-3 col-sm-6">
                <a href="{{ route('user.categories.galleries', $category->id) }}">
                <div class="card h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h5 class="mb-1 me-2">{{ $category->name }}</h5>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-primary rounded p-2">
                                <i class="ti ti-diamond ti-26px"></i>
                            </span>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            {{-- <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <a href="{{ route('user.categories.galleries', $category->id) }}" class="btn btn-primary">View
                            Galleries</a>
                    </div>
                </div>
            </div> --}}
        @endforeach
    </div>
@endsection
