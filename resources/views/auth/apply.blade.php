<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Apply - {{ setting('site.title') }}</title>
    <link rel="stylesheet" href="{{ asset('css/libs/theme.css?v=ogf') }}">
    <link href="{{ asset('css/app.css?v=0.'.time()) }}" rel="stylesheet">
</head>

<body>
    <div class="preloader" id="preloader">
        <div class="spinner-grow text-light" role="status"><span class="sr-only">Loading...</span></div>
    </div>
    <div id="ukz-app">
        <header class="header-area header2">
            <div class="container">
                <div class="classy-nav-container breakpoint-off">
                    <nav class="classy-navbar navbar2 justify-content-between" id="radixNav">
                        <a class="nav-brand mr-5" href="/">
                            <img src="{{asset('storage/img/logo.png')}}" alt />
                        </a>
                        <div class="login-btn-area">
                            <a class="btn radix-btn white-btn btn-sm" href="{{route('login')}}">Login</a>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <div class="breadcrumb--area white-bg-breadcrumb">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <h2 class="breadcrumb-title">Join Now</h2>
                        <p class="text-center">By continuing you are agreeing that, you have read and understood the <a href="{{route('constitution')}}">UKZ Chema Association's Constitution</a> and you are ready to become a member</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <application-form :max_nominees="{{setting('member.max_nominees', 4)}}"></application-form>
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