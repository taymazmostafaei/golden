@extends('layouts.layoutMaster')

@section('title', 'Categories Index')

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
            $('#categoryTable').DataTable();
        });
    </script>
@endsection

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Categories /</span> Index</h4>

    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add New Category</a>

    <div class="table-responsive">
        <table class="table" id="categoryTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
