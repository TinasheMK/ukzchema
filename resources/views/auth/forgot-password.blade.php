@extends('master')

@section('page')
Forgot Password
@endsection

@section('content')
<div class="register-area section-padding-120-70">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <!-- Register Thumbnail-->
            <div class="d-none d-lg-block col-12 col-lg-6">
                <div class="register-thumbnail mb-50"><img src="{{asset('storage/bg/login.png')}}" alt=""></div>
            </div>
            <!-- Register Card-->
            <div class="col-12 col-lg-6">
                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (ses('message'))
                    <div class="alert alert-success" role="alert">{{ses('message')}}</div>
                @endif
                <div class="card register-card bg-gray p-1 p-sm-4 mb-50">
                    <div class="card-body">
                        <h4>Enter your email</h4>
                        <div class="register-form mt-3 mb-2">
                            <form action="{{route('forgot.password')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input name="email" class="form-control rounded-0" type="email"
                                        placeholder="Email Address" required>
                                </div>
                                <button class="btn radix-btn white-btn w-100" type="submit">
                                    Get Reset Link
                                </button>
                            </form>
                            <div class="login-meta-data d-flex align-items-center justify-content-between">
                                <a class="forgot-password mt-3" href="{{route('login')}}">Remembered?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection