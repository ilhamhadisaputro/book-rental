<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Rental Buku | Register</title>
</head>
<body>
        <div class="container flex-column" style="display: flex; justify-content: center; align-items: center;">
            <div class="card" style="margin-top: 5rem; width: 20rem; ">
                @if ($errors->any())
                <div class="alert alert-danger ">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('status'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
          @endif
                <div class="card-header text-bg-primary ">
                  Login Admin
                </div>
                <div class="card-body">
                    <form method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Username</label>
                          <input type="text" class="form-control" name="username" id="username" >
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label" >Password</label>
                          <input type="password" class="form-control" name="password" id="exampleInputPassword1" @required(true)>
                        </div class="mt-2">
                        <label for="exampleInputEmail1" class="form-label">Address</label>
                        <div class="mb-3">
                            <textarea name="address" id="address" cols="" rows="" class="form-control" @required(true)></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Phone</label>
                            <input type="number" class="form-control" name="phone" id="phone">
                          </div>
                        <button type="submit" class="btn btn-primary" name="authenticating">Register</button>
                        <div class="signIn mt-3">
                            have account? <a href="login" style="text-decoration: none">Login</a>
                        </div>
                      </form>
                </div>
              </div>
        
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>