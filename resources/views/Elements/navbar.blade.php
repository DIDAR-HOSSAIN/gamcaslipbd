
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Welcome Gamca Slip Service</title>
    <link rel="stylesheet" href="{{asset('Lib/css/style.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="/"><img class="img-fluid" alt="GAMCA" src="{{asset('Images/logo.jpg')}}" style="width:60px; height:60px;" ></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">


{{--        <li><a href="/"><img class="img-fluid" alt="GAMCA" src="{{asset('Images/logo.jpg')}}" style="width:60px; height:60px;" ></a></li>--}}
        <li><a href="/" class="active">Home</a></li>
        <li><a href="{{URL::to('/services')}}" target="_blank">Services</a></li>
        <li><a href="{{URL::to('/about_us')}}" target="_blank">About Us</a></li>
        <li><a href="{{URL::to('/contact_us')}}" target="_blank">Contact Us</a></li>
        <li><a href="{{URL::to('publicmsgs/create')}}" target="_blank">Message</a></li>

    </ul>


    {{--            passenger part search--}}

{{--    <form class="form-inline my-2 my-lg-0" action="/search" method="get">--}}
{{--        @csrf--}}
{{--        --}}{{--                <div class="input-group downlib">--}}
{{--        <input type="search" placeholder="মোবাইল নম্বর দিয়ে স্লিপ ডাউনলোড করুন " name="search" class="form-control ">--}}
{{--        <span class="input-prepend">--}}
{{--                    <button type="submit" class=" btn btn-primary ">Search</button>--}}

{{--                </span>--}}
{{--    </form>--}}

    {{--        end search--}}


        <div class="flex-center position-ref full-height">
{{--            <div class="form-inline my-2 my-lg-0">--}}

        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>


        @if (Route::has('login'))
            <div class="top-right links">
                @auth
{{--                    <a href="{{ url('/home') }}">HOME</a>--}}
                @else
                    <a class="float-md-left" href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
    </div>


</nav>

<img class="img-fluid header_img" alt="header_img" src="{{asset('Images/header_img.jpg')}}">








<script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>

<script src ="{{ asset('js/jquery-3.4.1.min.js') }}" ></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
