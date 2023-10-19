@extends('layout.mainlayout')
@section('title', 'Delete User')
@section('content')

    <h2>Are you sure to delete user {{ $username->username }}</h2>
    <div class="mt-3">
        <a href="/user_destroy/{{ $username->slug }}"class="btn btn-danger" >Sure</a>
        <a href="/user"class="btn btn-info" class="me-5">Cancel</a>
    </div>
@endsection
    