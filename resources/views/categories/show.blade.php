@extends('layouts.layoutMaster')

@section('title', 'Category Details')

@section('vendor-style')

@endsection

@section('vendor-script')

@endsection

@section('page-script')

@endsection

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Categories /</span> Category Details</h4>

    <div class="mb-4">
        <h5>Category Name: {{ $category->name }}</h5>
    </div>

    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
    </form>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
@endsection
