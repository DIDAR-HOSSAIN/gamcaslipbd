<!doctype html>
<html lang="en">

<head>
    <title> GAMCA SLIP SERVICE</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/vivify.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/c3.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/chartist.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/chartist-plugin-tooltip.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/css/site.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/mypos.css')}}">
</head>

<body class="theme-cyan font-montserrat light_version">

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

{{--<!-- Theme Setting -->--}}
{{--<div class="themesetting">--}}
{{--    <a href="javascript:void(0);" class="theme_btn"><i class="icon-magic-wand"></i></a>--}}
{{--    <div class="card theme_color">--}}
{{--        <div class="header">--}}
{{--            <h2>Theme Color</h2>--}}
{{--        </div>--}}
{{--        <ul class="choose-skin list-unstyled mb-0">--}}
{{--            <li data-theme="green"><div class="green"></div></li>--}}
{{--            <li data-theme="orange"><div class="orange"></div></li>--}}
{{--            <li data-theme="blush"><div class="blush"></div></li>--}}
{{--            <li data-theme="cyan" class="active"><div class="cyan"></div></li>--}}
{{--            <li data-theme="indigo"><div class="indigo"></div></li>--}}
{{--            <li data-theme="red"><div class="red"></div></li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    <div class="card font_setting">--}}
{{--        <div class="header">--}}
{{--            <h2>Font Settings</h2>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <div class="fancy-radio mb-2">--}}
{{--                <label><input name="font" value="font-krub" type="radio"><span><i></i>Krub Google font</span></label>--}}
{{--            </div>--}}
{{--            <div class="fancy-radio mb-2">--}}
{{--                <label><input name="font" value="font-montserrat" type="radio" checked><span><i></i>Montserrat Google font</span></label>--}}
{{--            </div>--}}
{{--            <div class="fancy-radio">--}}
{{--                <label><input name="font" value="font-roboto" type="radio"><span><i></i>Robot Google font</span></label>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="card setting_switch">--}}
{{--        <div class="header">--}}
{{--            <h2>Settings</h2>--}}
{{--        </div>--}}
{{--        <ul class="list-group">--}}
{{--            <li class="list-group-item">--}}
{{--                Light Version--}}
{{--                <div class="float-right">--}}
{{--                    <label class="switch">--}}
{{--                        <input type="checkbox" class="lv-btn" checked>--}}
{{--                        <span class="slider round"></span>--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="list-group-item">--}}
{{--                RTL Version--}}
{{--                <div class="float-right">--}}
{{--                    <label class="switch">--}}
{{--                        <input type="checkbox" class="rtl-btn">--}}
{{--                        <span class="slider round"></span>--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="list-group-item">--}}
{{--                Horizontal Henu--}}
{{--                <div class="float-right">--}}
{{--                    <label class="switch">--}}
{{--                        <input type="checkbox" class="hmenu-btn" >--}}
{{--                        <span class="slider round"></span>--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="list-group-item">--}}
{{--                Mini Sidebar--}}
{{--                <div class="float-right">--}}
{{--                    <label class="switch">--}}
{{--                        <input type="checkbox" class="mini-sidebar-btn">--}}
{{--                        <span class="slider round"></span>--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    <div class="card">--}}
{{--        <div class="form-group">--}}
{{--            <label class="d-block">Traffic this Month <span class="float-right">77%</span></label>--}}
{{--            <div class="progress progress-xxs">--}}
{{--                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label class="d-block">Server Load <span class="float-right">50%</span></label>--}}
{{--            <div class="progress progress-xxs">--}}
{{--                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<!-- Overlay For Sidebars -->--}}
{{--<div class="overlay"></div>--}}
