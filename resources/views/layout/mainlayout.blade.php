<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset ('css/style.css') }}">
    <title>Rental Buku | @yield('title')</title>
</head>

<body>
        
    <div class="main d-flex flex-column justify-content-between">
        {{-- NAVBAR --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Rental Buku</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
          </nav>

          {{-- CONTENT  --}}
        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarSupportedContent">
                    {{-- {{ Auth::user()->role_id }} --}}
                        @if (Auth::user())
                            @if (Auth::user()->role_id  == 1)
                                <a href="/dasboard" @if ( request()->route()->uri == 'dasboard') class='active'
                                    @endif>Dasboard</a>
                                <a href="/books" @if ( request()->route()->uri == 'books' ||  request()->route()->uri == 'book_add' ||
                                    request()->route()->uri == 'book/{slug}' ||  request()->route()->uri == 'book_deleted/{slug}' || 
                                    request()->route()->uri == 'book/{slug}') class='active'
                                    @endif>Books</a>
                                <a href="/category" @if ( request()->route()->uri == 'category' ||  request()->route()->uri == 'category_add' ||
                                    request()->route()->uri == 'category_delete/{slug}' ||  request()->route()->uri == 'category_deleted/{slug}' || 
                                    request()->route()->uri == 'category_edit/{slug}' ) class='active'
                                    @endif>Categorys</a>
                                <a href="/user" @if ( request()->route()->uri == 'user' || request()->route()->uri == 'registered_users' || request()->route()->uri == 'user_detail/{slug}'
                                    ||  request()->route()->uri == 'user_ban/{slug}') class='active'
                                    @endif>Users</a>
                                <a href="/rent_logs" @if ( request()->route()->uri == 'rent_logs') class='active'
                                    @endif>Rent Logs</a>
                                <a href="/logout" @if ( request()->route()->uri == 'logout') class='active'
                            @endif>Logout</a>
                            @else
                            <a href="/profile" @if ( request()->route()->uri == 'profile') class='active'
                                @endif>Profile</a>
                            <a href="/logout" @if ( request()->route()->uri == 'logout') class='active'
                                @endif>Logout</a>
                            @endif
                            @else
                            <a href="/login">Login</a>
                        @endif
                </div>
                <div class="content p-5 col-lg-10">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>
</html>