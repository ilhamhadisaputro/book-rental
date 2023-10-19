
@extends('layout.mainlayout')
@section('title', 'Add Book')
@section('content')

    {{-- Script CSS select2 --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   
    <h1>Add New Category</h1>

    <div>
        <form action="books_add" method="POST" enctype="multipart/form-data" class="mt-5 w-50">

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
            <div class="mb-4">
                <label for="code" class="form-label">Code</label>
                <input type="text" name="book_code" id="code" class="form-control" {{ $value = old('book_code') }} placeholder="Book Code">
            </div>
            <div class="mb-4">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" {{ $value = old('title') }} placeholder="Book Title">
            </div>
            <div class="mb-4">
                <label for="cover" class="form-label">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="categorys[]" id="categorys" class="form-control select-multiple" multiple>
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-success mt-5">Save</button>
            </div>
        </form>
    </div>

    {{-- Script js select2 --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
        $('.select-multiple').select2();
    });
    </script>

@endsection

