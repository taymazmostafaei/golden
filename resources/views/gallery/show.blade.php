@extends('layouts.layoutMaster')

@section('title', 'Gallery Item Details')

@section('vendor-style')

@endsection

@section('vendor-script')

@endsection

@section('page-script')

@endsection

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Gallery /</span> Item Details</h4>

    <div class="mb-4">
        <h5>Title: {{ $gallery->title }}</h5>
        <p><strong>Description:</strong> {{ $gallery->description }}</p>
        <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}" style="width: 300px;">
        <p><strong>Category:</strong> {{ $gallery->category->name }}</p>
    </div>

    <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
    </form>
    <a href="{{ route('gallery.index') }}" class="btn btn-secondary">Back to Gallery</a>
@endsection
