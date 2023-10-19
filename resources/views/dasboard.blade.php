@extends('layout.mainlayout')
@section('title', 'Dasboard')
@section('content')

<h1>welocme, {{ Auth::user()->username }}</h1>

    <div class="row my-5">
        <div class="col-lg-4">
            <div class="card-data books">
                <div class="row">
                    <div class="col-6"><i class="bi bi-journal-bookmark"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">Books</div>
                        <div class="card-count">{{ $book_count }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card-data categorys">
                <div class="row">
                    <div class="col-6"><i class="bi bi-bookmark-check"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">Categorys</div>
                        <div class="card-count">{{ $category_count }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card-data users">
                <div class="row">
                    <div class="col-6"><i class="bi bi-people"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">Users</div>
                        <div class="card-count">{{ $user_count }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- TABLE RENT LOGS --}}
    <div class="mt-5">
        <h2>#Rent Logs</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>User</th>
                    <th>Book title</th>
                    <th>Rent Date</th>
                    <th>return Date</th>
                    <th>Actual Return Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td colspan="7">No data</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
    