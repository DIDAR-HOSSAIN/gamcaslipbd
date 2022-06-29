
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>WelCome Gamca</title>
    <link rel="stylesheet" href="{{asset('Lib/css/style.css')}}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">
{{--        <img alt="Responsive image" src="{{asset('Images/logo.jpg')}}" alt="GAMCA" class="img-fluid">--}}
        <img class="img-fluid header-img" alt="GAMCA" src="{{asset('Images/logo.jpg')}}" style="width:60px; height:60px;" >

    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{URL::to('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="{{route('general-slips.create')}}">GAMCA Services</a>--}}
{{--            </li>--}}

            <li class="nav-item">
                <a class="nav-link" href="{{URL::to('/services')}}">GAMCA Services</a>
            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/about_us')}}">About Us</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/contact_us')}}">Contact Us</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/message')}}">Message</a>
                            </li>

                        </ul>


{{--            <li class="nav-item dropdown">--}}
{{--                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                    Dropdown--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                    <a class="dropdown-item" href="#">Action</a>--}}
{{--                    <a class="dropdown-item" href="#">Another action</a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link disabled" href="#">Disabled</a>--}}
{{--            </li>--}}
{{--        </ul>--}}

{{--        start search--}}

{{--        <form class="form-inline my-2 my-lg-0">--}}
{{--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
{{--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
{{--        </form>--}}

{{--            passenger part search--}}

            <form class="form-inline my-2 my-lg-0" action="/search" method="get">
                @csrf
{{--                <div class="input-group downlib">--}}
                    <input type="search" placeholder="মোবাইল নম্বর দিয়ে স্লিপ ডাউনলোড করুন " name="search" class="form-control ">
                    <span class="input-prepend">
                    <button type="submit" class=" btn btn-primary ">Search</button>

                </span>
            </form>

        {{--        end search--}}


        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Logout</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</nav>

{{--header image--}}
<img class="img-fluid header-img" alt="header_img" src="{{asset('Images/header_img.jpg')}}" >
{{--end header image--}}



{{--<div class="nav">--}}
{{--    <nav class="navbar navbar-expand-lg navbar-info bg-dark textcolor horizontal">--}}
{{--        <a class="navbar-brand" img src="{{URL::to('Images/4NS.jpg')}}" href="{{URL::to('/')}}">4nsenterprise</a>--}}
{{--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}

{{--        <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--            <ul class="navbar-nav mr-auto">--}}
{{--                <li class="nav-item active">--}}
{{--                    <a class="nav-link" href="{{URL::to('/')}}">Home <span class="sr-only">(current)</span></a>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{route('general-slips.index')}}">GAMCA Services</a>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#">Offers</a>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#">About Us</a>--}}
{{--                </li> <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#">Contact Us</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--        <div class="flex-center position-ref full-height">--}}
{{--            @if (Route::has('login'))--}}
{{--                <div class="top-right links">--}}
{{--                    @auth--}}
{{--                        <a href="{{ url('/home') }}">Home</a>--}}
{{--                    @else--}}
{{--                        <a href="{{ route('login') }}">Login</a>--}}

{{--                        @if (Route::has('register'))--}}
{{--                            <a href="{{ route('register') }}">Register</a>--}}
{{--                        @endif--}}
{{--                    @endauth--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}

{{--    </nav>--}}
{{--</div>--}}

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="{{asset('Lib/js/min.js')}}"></script>
<script src="{{asset('Lib/popper.min.js')}}"></script>
<script src="{{asset('Lib/js/bootstrap.min.js')}}"></script>


</body>
</html>

