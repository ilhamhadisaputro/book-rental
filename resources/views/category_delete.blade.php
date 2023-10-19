@extends('layout.mainlayout')
@section('title', 'Delete Category')
@section('content')

    <h2>Are you sure to delete category {{ $category->name }}</h2>
    <div class="mt-3">
        <a href="/category_destroy/{{ $category->slug }}"class="btn btn-danger" >Sure</a>
        <a href="/category"class="btn btn-info" class="me-5">Cancel</a>
    </div>

@endsection
    