<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Rental Buku | Login</title>
</head>
<body>
    <div class="container flex-column" style="display: flex; justify-content: center; align-items: center;">
      @if (session('status'))
        <div class="alert alert-danger">
            {{session('message')}}
        </div>
      @endif
        <div class="card" style="margin-top: 15rem; width: 20rem; ">
            <div class="card-header text-bg-primary ">
              Login Admin
            </div>
            <div class="card-body">
                <form method="POST" action="login">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Username</label>
                      <input type="text" class="form-control" name="username" id="username" @required(true)>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label" >Password</label>
                      <input type="password" class="form-control" name="password" id="exampleInputPassword1" @required(true)>
                    </div class="mt-2">
                    <button type="submit" class="btn btn-primary" name="authenticating">Submit</button>
                    <div class="signIn mt-3">
                       don't have account? <a href="register" style="text-decoration: none">Sign In</a>
                    </div>
                  </form>
            </div>
          </div>
    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>