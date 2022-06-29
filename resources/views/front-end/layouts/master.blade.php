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

    <link rel="stylesheet" href="{{asset('frontend/popupslip/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/popupslip/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/popupslip/css/vivify.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/popupslip/css/c3.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/popupslip/css/chartist.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/popupslip/css/chartist-plugin-tooltip.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('frontend/popupslip/css/site.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/popupslip/css/mypos.css')}}">
</head>
<body>

@include('Elements.navbar')

@yield('content')

@include('Elements.footer')

@yield('scripts')


<!-- Javascript -->
<script src="{{asset('frontend/popupslip/js/jquery-min.js')}}"></script>
<script src="{{asset('frontend/popupslip/js/libscripts.bundle.js')}}"></script>
<script src="{{asset('frontend/popupslip/js/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('frontend/popupslip/js/flotscripts.bundle.js')}}"></script>
<script src="{{asset('frontend/popupslip/js/c3.bundle.js')}}"></script>
<script src="{{asset('frontend/popupslip/js/knob.bundle.js')}}"></script>
<script src="{{asset('frontend/popupslip/js/mainscripts.bundle.js')}}"></script>
<script src="{{asset('frontend/popupslip/js/index11.js')}}"></script>



</body>
</html>
