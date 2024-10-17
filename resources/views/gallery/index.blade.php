@extends('layouts.layoutMaster')

@section('title', 'Gallery Index')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/datatables.min.css') }}">
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/css/gallery.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/datatables/datatables.min.js') }}"></script>
@endsection

@section('page-script')
    <script>
        $(document).ready(function() {
            $('#galleryTable').DataTable();
        });
    </script>
@endsection

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Gallery /</span> Index</h4>

    <a href="{{ route('gallery.create') }}" class="btn btn-primary mb-3">Add New Gallery Item</a>

    <div class="table-responsive">
        <table class="table" id="galleryTable">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($galleries as $gallery)
                    <tr>
                        <td>{{ $gallery->title }}</td>
                        <td>{{ $gallery->description }}</td>
                        <td><img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}" style="width: 100px;"></td>
                        <td>{{ $gallery->category->name }}</td>
                        <td>
                            <a href="{{ route('gallery.show', $gallery->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
