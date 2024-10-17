@extends('layouts.layoutMaster')

@section('title', 'Edit Gallery Item')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/css/gallery.css') }}">
@endsection

@section('vendor-script')

@endsection

@section('page-script')

@endsection

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Gallery /</span> Edit Item</h4>

    <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $gallery->title }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" required>{{ $gallery->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Current Image</label><br>
            <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}" style="width: 100px;"><br><br>
            <label for="image" class="form-label">Change Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" class="form-select" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $gallery->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('gallery.index') }}" class="btn btn-secondary">Back to Gallery</a>
    </form>
@endsection
