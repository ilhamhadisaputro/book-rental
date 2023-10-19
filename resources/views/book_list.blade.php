@extends('layout.mainlayout')
@section('title', 'Dasboard')
@section('content')

<style>
    .selector {
    user-drag: none;
    -webkit-user-drag: none;
    user-select: none;
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
}
</style>

<div>
    <h1> Books List </h1>
</div>

<div class="my-5">
    <div class="row">
        @foreach ($books as $item)
        <div class="col-lg-3 col-md-4 mb-3 col-sm-6" style="width: 200px">
            <div class="card h-100">
                <div class="card-body">
                @if ($item->cover == true)
                <img src="{{ asset('storage/cover/'.$item->cover) }}" class="selector card-img-top" alt="...">
                @elseif ($item->cover == false)
                    <img src="{{ asset('image/cover_not_available.png') }}" class="selector card-img-top" alt="...">
                @endif
                  <h5 class="card-title">{{ $item->book_code }}</h5>
                  <p class="card-text">{{ $item->title }}</p>
                  {{-- Pakai ternari oprator --}}
                  <p class="card-text text-end fw-bold {{ $item->status == 'in stock' ? 'text-success' : 'text-danger' }}">
                    {{ $item->status }}
                </p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
    