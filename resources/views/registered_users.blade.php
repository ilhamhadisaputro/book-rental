@extends('layout.mainlayout')
@section('title', 'Users')
@section('content')
<h1>New Registered User List</h1>

<div class="my-5">
    <a href="user" class="btn btn-primary me-3">Approved Users List</a>
    <a href="/user" class="btn btn-warning">Back</a>
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
                @foreach ($registeredUsers as $item)
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
                        <a href="/user_detail/{{ $item->slug }}">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection