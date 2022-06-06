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
        <header class="header-area header2">
            <div class="container">
                <div class="classy-nav-container breakpoint-off">
                    <nav class="classy-navbar navbar2" id="radixNav">
                        <a class="nav-brand mr-5" href="/">
                            <img src="{{asset('storage/img/logo.png')}}" alt />
                        </a>
                    </nav>
                </div>
            </div>
        </header>
        <div class="radix-contact-us-area section-padding-120">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Contact Side Info-->
                    <div class="col-12 col-lg-5 col-xl-4">
                        <div class="contact-side-info mb-80">
                            <h5>Complete Registration</h5>
                            {{-- <h5>Phone: (+880) 145 2635896</h5> --}}
                            <h4 class="my-4">Create your password to complete registration</h4>
                            <p class="mb-0">You will use this password alongside your email <strong>({{$email}})</strong> to login</p>
                        </div>
                    </div>
                    <!-- Contact Form-->
                    <div class="col-12 col-lg-7">
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <div class="register-form mb-80">
                            <form action="{{route('applicant.complete')}}" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{$token}}">
                                <div class="form-group">
                                    <label class="label-psswd" for="registerPassword">
                                        <span class="hide">HIDE</span>
                                        <span class="show">SHOW</span>
                                    </label>
                                    <input name="password" class="input-psswd form-control rounded-0" autocomplete="new-password" id="registerPassword" type="password"
                                        placeholder="Choose Password" psswd-shown="false" required>
                                </div>

                                <div class="form-group">
                                    <input name="password_confirmation" class="input-psswd form-control rounded-0" autocomplete="new-password" id="confirmPassword"
                                        type="password" placeholder="Confirm Password" psswd-shown="false" required>
                                </div>
                                <button class="btn radix-btn white-btn w-100" type="submit">Complete Registration</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <small-footer></small-footer>
        <loaded-view></loaded-view>
    </div>
    <script src="{{ asset('js/ukz.app.js?id='.time()) }}"></script>
</body>

</html>