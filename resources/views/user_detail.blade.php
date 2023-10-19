@extends('layout.mainlayout')
@section('title', 'Users')
@section('content')
<h1>User Detail</h1>

<div class="my-5">
    @if ($user->status == 'inactive')
        <a href="/user_approve/{{ $user->slug }}" class="btn btn-info me-2">Approve User</a>
    @endif
        
    <a href="/registered_users" class="btn btn-warning">Back</a>
</div>

<div class="mt-5">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</div>


    <div class="my-5">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" readonly value="{{ $user->username }}">
        </div>
    </div>
    <div class="my-5">
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" readonly value="{{ $user->phone }}">
        </div>
    </div>
    <div class="my-5">
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="" id="" cols="30" rows="5" class="form-control" style="resize: none">{{ $user->address }}</textarea>
        </div>
    </div>
    <div class="my-5">
        <div class="mb-3">
            <label for="status" class="form-label">status</label>
            <input type="text" class="form-control" readonly value="{{ $user->status }}">
        </div>
    </div>


@endsection