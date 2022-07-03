<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="UKZ Chema is a benevolent UK based community organisation formed to help Zimbabweans who live in the UK to cover funeral expenses.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page') - {{ setting('site.title') }}</title>
    <link rel="shortcut icon" href="{{asset('storage/settings/May2020/oRWDPZmmvriKw5nuB6Bs.png')}}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/libs/theme.css?v=ogf') }}">
    <link href="{{ asset('css/app.css?v=0.'.time()) }}" rel="stylesheet">
    <style>
        .login-btn-area > .white-btn{
            display: none;
        }
    </style>
    <style style="text/css">
        .marquee {
            height: 50px;
            overflow: hidden;
            position: relative;
        }

        .marquee p {
            position: absolute;
            width: 100%;
            height: 100%;
            margin: 0;
            line-height: 50px;
            text-align: center;
            -moz-transform: translateX(100%);
            -webkit-transform: translateX(100%);
            transform: translateX(100%);
            -moz-animation: scroll-left 2s linear infinite;
            -webkit-animation: scroll-left 2s linear infinite;
            animation: scroll-left 40s linear infinite;
        }

        @-moz-keyframes scroll-left {
            0% {
                -moz-transform: translateX(100%);
            }
            100% {
                -moz-transform: translateX(-100%);
            }
        }

        @-webkit-keyframes scroll-left {
            0% {
                -webkit-transform: translateX(100%);
            }
            100% {
                -webkit-transform: translateX(-100%);
            }
        }

        @keyframes scroll-left {
            0% {
                -moz-transform: translateX(100%);
                -webkit-transform: translateX(100%);
                transform: translateX(100%);
            }
            100% {
                -moz-transform: translateX(-100%);
                -webkit-transform: translateX(-100%);
                transform: translateX(-100%);
            }
        }
    </style>
</head>
<body>
    <div class="preloader" id="preloader">
      <div class="spinner-grow text-light" role="status"><span class="sr-only">Loading...</span></div>
    </div>
    <div id="ukz-app">
        @guest
            <guest-nav
                :about_us="'{{route('about.us')}}'"
                :contact_us="'{{route('contact.us')}}'"
                :constitution="'{{route('constitution')}}'"
                :login="'{{route('login')}}'"></guest-nav>
        @endguest

        @yield('content')
        <cookie-view></cookie-view>
        <small-footer
            :about_us="'{{route('about.us')}}'"
            :contact_us="'{{route('contact.us')}}'"
            :constitution="'{{route('constitution')}}'"
            :login="'{{route('login')}}'"
        ></small-footer>
        <loaded-view></loaded-view>
    </div>
    <script src="{{ asset('js/ukz.app.js?v=0.'.time()) }}"></script>
</body>
</html>
