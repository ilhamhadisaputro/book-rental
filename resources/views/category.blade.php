@extends('layout.mainlayout')
@section('title', 'Dasboard')
@section('content')
<h1>Category List</h1>

    <div class="my-5">
        <a href="category_add" class="btn btn-primary me-3">Add</a>
        <a href="category_deleted" class="btn btn-secondary">View deleted data</a>
    </div>

    <div class="mt-5">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div>
        <table class="table">
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Name</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($name_categorys as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="category_edit/{{ $item->slug }}">Edit</a>
                            <a href="category_delete/{{ $item->slug }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
    