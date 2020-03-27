<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('homepage/img/fav.png')}}">
    <title>Contacts List System | LOGIN</title>

    <link href="{{ asset('admin_dashboard/dist/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_dashboard/style.css') }}" rel="stylesheet">

</head>

<body>
    <div class="main-wrapper">
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url('') no-repeat center center;">
            <div class="auth-box">
                <div id="loginform">

                    <div class="logo mt-4">
                        <span class="db">
                            <h3>Contacts List System</h3>
                        </span>
                        <h4 class="font-medium m-t-20">SIGN IN</h4>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <form method="POST" action="/login" class="form-horizontal m-t-20" id="loginform">
                                @csrf

                                @error('email')
                                    <div class="alert alert-danger">
                                        <i class="ti-user"></i>
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                                            <span aria-hidden="true">&times;</span> 
                                        </button>
                                    </div>
                                @enderror

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-email"></i>
                                        </span>
                                    </div>
                                    <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Email Address" value="{{ old('email')}}" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2">
                                            <i class="mdi mdi-key"></i>
                                        </span>
                                    </div>
                                    <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                                </div>
                                <!--  <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Remember me</label>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="text-center">
                                    <div class="row">
                                        <div class="col-md-12 p-b-10">
                                            <button class="btn btn-block btn-lg btn-info" type="submit" id="login-button">
                                                Sign In
                                            </button>
                                        </div>
                                    </div>
                                </div>                          
                                
                                <div class="form-group m-b-0 m-t-10">
                                    <div class="col-sm-12 text-center">
                                        <a href="javascript:void(0)" id="to-recover" class="text-dark">
                                            <i class="fa fa-lock m-r-5"></i> Forgot password?
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin_dashboard/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>