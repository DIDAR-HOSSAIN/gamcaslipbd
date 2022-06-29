<!doctype html>
<html lang="en">

<head>
    <title>Oculux | Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Oculux Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
    <meta name="author" content="GetBootstrap, design by: puffintheme.com">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/vivify.min.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/css/site.min.css')}}">

</head>
<body class="theme-cyan font-montserrat">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <div class="bar4"></div>
        <div class="bar5"></div>
    </div>
</div>

<div class="pattern">
    <span class="red"></span>
    <span class="indigo"></span>
    <span class="blue"></span>
    <span class="green"></span>
    <span class="orange"></span>
</div>

<div class="auth-main particles_js">
    <div class="auth_div vivify popIn">
        <div class="auth_brand">
            <a class="navbar-brand" href="javascript:void(0);"><img src="../assets/images/icon.svg" width="30" height="30" class="d-inline-block align-top mr-2" alt="">Oculux</a>
        </div>
        <div class="card">
            <div class="body">
                <p class="lead"> {{__('Login to your account')}} </p>

                <form class="form-auth-small m-t-20" method="post" action="{{route('login')}}">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="control-label sr-only"> {{__('Email')}} </label>
                        <input id="email" type="email" class="form-control round @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" required autocomplete="email" autofocus>
                        @error('email') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="control-label sr-only"> {{__('Password')}} </label>
                        <input id="password" type="password" class="form-control round @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                    </div>

                    <div class="form-group clearfix">
                        <label class="fancy-checkbox element-left">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span> {{__('Remember me')}}</span>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-round btn-block"> {{__('LOGIN')}} </button>
                    <div class="bottom">

                        <span class="helper-text m-b-10"><i class="fa fa-lock"></i>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"> {{__('Forgot password?')}} </a>
                            @endif
                        </span>

                        <span>Don't have an account? <a href="page-register.html">Register</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>
<!-- END WRAPPER -->

<script src="{{asset('dashboard/js/libscripts.bundle.js')}}"></script>
<script src="{{asset('dashboard/js/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('dashboard/js/mainscripts.bundle.js')}}"></script>
</body>
</html>