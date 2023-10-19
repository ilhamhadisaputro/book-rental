@extends('layout.mainlayout')
@section('title', 'Delete Category')
@section('content')

    <h2>Are you sure to delete book {{ $book->title }}</h2>
    <div class="mt-3">
        <a href="/book_destroy/{{ $book->slug }}"class="btn btn-danger" >Sure</a>
        <a href="/books"class="btn btn-info" class="me-5">Cancel</a>
    </div>

@endsection
    