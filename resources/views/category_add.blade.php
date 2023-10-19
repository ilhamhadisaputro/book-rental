@extends('layout.mainlayout')
@section('title', 'Add Category')
@section('content')
    <h1>Add New Category</h1>

    <div>
        <form action="category_add" method="POST" class="mt-5 w-50">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            @csrf
            <div>
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Category Name">
            </div>

            <div>
                <button type="submit" class="btn btn-success mt-5">Submit</button>
            </div>
        </form>
    </div>
@endsection

