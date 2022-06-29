<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('Lib/css/bootstrap.min.css')}}">

    <title>Welcome Gamca</title>
    <link rel="stylesheet" href="{{asset('Lib/css/style.css')}}">
</head>
<body>

@include('Elements.navbar')

@yield('content')

@include('Elements.footer')


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

{{--<script--}}
{{--    src="https://code.jquery.com/jquery-3.4.1.js"--}}
{{--    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="--}}
{{--    crossorigin="anonymous"></script>--}}

{{--<script src ="{{ asset('Lib/js/jQuery-for-ajax') }}" ></script>--}}

{{--<script src="{{asset('Lib/js/selectFilter.min.js')}}"></script>--}}
<script src="{{asset('js/sumon-jquery-3.4.1.js')}}"></script>
{{--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="{{asset('js/bootstrap.min.js')}}" ></script>\

@yield('script')

</body>
</html>
