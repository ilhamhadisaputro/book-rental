
@extends('layout.mainlayout')
@section('title', 'Edit Book')
@section('content')

    {{-- Script CSS select2 --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   
    <h1>Edit Book</h1>
    <div>
        <form action="/book_edit/{{ $book->slug }}" method="POST" enctype="multipart/form-data" class="mt-5 w-50">

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
                <input type="text" name="book_code" id="code" class="form-control" value="{{ $book->book_code }}" placeholder="Book Code">
            </div>
            <div class="mb-4">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value = "{{ $book->title }}" placeholder="Book Title">
            </div>
            <div class="mb-4">
                <label for="cover" class="form-label" >Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="mb-3">
                <label for="currentImage" class="form-label" style="display: block">Current Image</label>
                @if ($book->cover != '')
                <img src="{{ asset('storage/cover/'. $book->cover )}}" alt="" style="width: 150px">
            @else
                <img src="{{ asset('image/cover_not_available.png') }}" alt="" style="width:150px">
            @endif
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="categorys[]" id="categorys" class="form-control select-multiple" multiple>
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="currentCategory" class="form-label">Current Category</label>
                <ul>
                    @foreach ($book->category as $category)
                        <li>{{ $category->name }}</li>
                    @endforeach
                </ul>
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

