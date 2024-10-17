@extends('layouts.layoutMaster')

@section('title', 'Create Category')

@section('vendor-style')

@endsection

@section('vendor-script')

@endsection

@section('page-script')

@endsection

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Categories /</span> Create New Category</h4>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
    </form>
@endsection
