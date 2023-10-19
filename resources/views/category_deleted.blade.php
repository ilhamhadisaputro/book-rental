@extends('layout.mainlayout')
@section('title', 'Deleted Categoy')
@section('content')
<h1>Deleted Categoy</h1>

    <div class="my-5">
        <a href="category" class="btn btn-primary me-3">Back</a>

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
                @foreach ($deletedcategorys as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="category_restore/{{ $item->slug }}">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
    