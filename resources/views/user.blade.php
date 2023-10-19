@extends('layout.mainlayout')
@section('title', 'Users')
@section('content')
<h1>User List</h1>

<div class="my-5">
    <a href="/registered_users" class="btn btn-primary me-2">New Register User</a>
    <a href="/user_banned" class="btn btn-secondary">View Banned User</a>
</div>

<div class="mt-5">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</div>


    <div class="my-3">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($username as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->username }}</td>
                    <td>
                        @if ($item->phone)
                            {{ $item->phone }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="/user_detail/{{ $item->slug }}" class="btn btn-info">Detail</a>
                        <a href="{{route('destroy', [$item->slug])}}" class="btn btn-danger" onclick="return confirm('Are you sure delete {{ $item->slug }}')">Ban User</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection