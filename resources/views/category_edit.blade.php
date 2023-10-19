@extends('layout.mainlayout')
@section('title', 'Edit Category')
@section('content')
    <h1>Edit Add Category</h1>

    <div>
        <form action="/category_edit/{{ $category->slug }}" method="POST" class="mt-5 w-50">

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
            @method('put')
            <div>
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" placeholder="Category Name">
            </div>

            <div>
                <button type="submit" class="btn btn-success mt-5">Update</button>
            </div>
        </form>
    </div>
@endsection

