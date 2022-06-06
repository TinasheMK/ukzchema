<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Apply - {{ setting('site.title') }}</title>
    <link rel="stylesheet" href="{{ asset('css/libs/theme.css?v=ogf') }}">
    <link href="{{ asset('css/app.css?id='.time()) }}" rel="stylesheet">
</head>

<body>
    <div class="preloader" id="preloader">
        <div class="spinner-grow text-light" role="status"><span class="sr-only">Loading...</span></div>
    </div>
    <div id="ukz-app">
        <div class="container">
            <div class="logo-area text-center py-5">
                <a href="/">
                    <img src="{{asset('storage/img/logo.png')}}" style="height: 45px" alt="">
                </a>
            </div>
        </div>
        <div class="container">
            <div class="border-top"></div>
        </div>
        <div class="radix-coming-soon-area text-center section-padding-120">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 col-lg-7">
                        <h4 class="text-success">Successful</h4>
                    <p>We have received your application form and we are reviewing it.
                        This process may take upto 48 hours.
                        We will send you an email to: <br> <strong>{{$applicant->email}}</strong></p>
                    <p>Contact <a href="mailto:applicants@ukzchema.co.uk?subject=Change Email Request&body=Requesting to change my email from {{$applicant->email}} to: <ENTER YOUR EMAIL HERE>" target="_blank">support</a> to change your email address</p>
                        <a class="btn radix-btn mt-4"
                            href="/">Explore the site</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="border-top"></div>
        </div>
        <small-footer
            :about_us="'{{route('about.us')}}'"
            :contact_us="'{{route('contact.us')}}'"
            :constitution="'{{route('constitution')}}'"
            :login="'{{route('login')}}'"
        ></small-footer>
        <loaded-view></loaded-view>
    </div>
    <script src="{{ asset('js/ukz.app.js?id='.time()) }}"></script>
</body>

</html>
