<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Easy Inventory | Log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('backend_assets/dist/css/adminlte.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background-image: url('/backend_assets/dist/img/login_bg5.jpg');background-repeat: no-repeat; background-attachment: fixed; background-position: center;">
    <div class="login-box" id="app">        
        <div class="card">
            <div class="card-header text-center">
                <h4 class="text-center"><b>Admin</b> Easy Inventory</h4>
                <span>Live and Easy System</span>
            </div>
            <div class="card-body login-card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="email" type="email" placeholder="User Id" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="admin@email.com" required autofocus>
                        <div class="input-group-append input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="11111111" required>
                        <div class="input-group-append input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>    

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-outline-primary btn-block btn-flat">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
               {{--  User ID: <b>admin@email.com</b> <br>
                Password: <b>11111111</b> --}}

                <a href="{{ route('admin.documentation') }}" title="documentation">Documentation</a>
            </div>
        </div>
    </div>

    

    <script src="{{ asset('backend_assets/plugins/jquery/jquery.min.js')}}"></script>
    {{-- <script src="{{ asset('backend_assets')}}"></script> --}}
</body>
</html>
