@extends('layout.mainlayout')
@section('title', 'Dasboard')
@section('content')
<div>
    <h1> Books List </h1>
</div>

<div class="mt-5">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</div>

<div class="my-5 d-flex justify-content-end">

    <a href="book_deleted" class="btn btn-secondary me-3">View deleted data</a>
    <a href="books_add" class="btn btn-primary">Add Data</a>
</div>

<div class="my-5">
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Book Code</th>
                <th>Title</th>
                <th>Status</th>
                <th>Categorys</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->book_code }}</td>
                    <td>{{ $item->title }}</td>
                    <td>
                        @foreach ($item->category as $categorys)
                            {{ $categorys->name .',' }} <br>
                        @endforeach
                    </td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="/book_edit/{{ $item->slug }}">Edit</a>
                        <a href="/book_delete/{{ $item->slug }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
    