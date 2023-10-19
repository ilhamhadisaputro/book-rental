@extends('layout.mainlayout')
@section('title', 'Banned Users')
@section('content')
<h1>Banned Users</h1>

    <div class="my-5">
        <a href="/user" class="btn btn-primary me-3">Back</a>

    </div>

    <div>
        <table class="table">
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Name</td>
                    <td>Phone</td>
                    <td>Address</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($bannedUser as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->address }}</td>
                        <td>
                            <a href="user_restore/{{ $item->slug }}" class="btn btn-warning">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
    